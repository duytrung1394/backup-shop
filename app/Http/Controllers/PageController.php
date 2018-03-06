<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\TypeProduct;
use App\Cart;
use Session;
class PageController extends Controller
{
   function __construct()
	{	//truyyền viewshare . loai san pham tới kahcs mọi trang trong page
		
		$typeProduct = TypeProduct::all();
		view()->share(['typeProduct'=>$typeProduct]);
	}
	public function getTrangChu()
	{	
		$slide = Slide::all();
		// return view('pages.index',['slide'=>$slide]);
		// Hoặc
		$new_product = Product::where('new',1)->paginate(4, ['*'],'np');
		$product =	Product::paginate(12,['*'],'p');
		return view('pages.index',compact('slide','new_product','product'));
	}
	public function getTypeProduct($id)
	{
		//LẤY SAN PHẨM MỚI CỦA TỪNG LOẠI SẢNH PHẨM
		// $new_product = Product::whereRaw('id_type = '.$id.' and new = 1')->paginate(3)->toArray();
		//hoac
		$new_product = 	TypeProduct::find($id)->product()->where('new',1)->paginate(3);

		//lay danh sach san pham co type = id
		$product = 	TypeProduct::find($id)->product()->paginate(9);
		//$typeP 	 = 	TypeProduct::where('id',$id)->select('id','name')->get()->toArray();// 2 lop oject: froach đê in ra tên
		$typeP 	 = 	TypeProduct::find($id); //1 lop obj : $typeP->name
		
		return view('pages.product_type',compact('new_product','typeP','product'));
	}
	public function getDetail($id)
	{
		$product = Product::find($id);
		$promo_product = Product::where('promotion_price','>',0)->take(4)->get();

		$new_product = 	Product::where('new',1)->take(4)->get();
		$id_type = $product->id_type;
		//lay san pham khac loai
		$diff_product = Product::whereRaw('id_type = '.$id_type.' and id <> '.$id)->take(3)->get();
		
		return view('pages.product',compact('product','promo_product','new_product','diff_product'));
	}

	public function getAddtoCart(Request $req, $id)
	{
		//tim san pham co id
		$product = Product::find($id);
		//kiem tra san pham ton tai trong gio hang chua
        $oldCart = Session('cart')?Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        //goi phuong thuc them gio hang
        $cart->add($product, $id);
        // gán cart cao session
        $req->session()->put('cart',$cart);
        Session::put('cart',$cart);
    
    
        return redirect()->back();
	}
	public function getDeleteItemCart($id)
	{	//Kiem tra xem co sana pham trong card khong
	 	$oldCart = Session('cart')?Session::get('cart'):null;
	
	 	$cart = new Cart($oldCart);
	 	$cart->removeItem($id);
	 	
	 	if(count($cart->items) > 0)
	 	{
	 		//put gio hang vao gio hang moi
	 		Session::put('cart',$cart);
	 	}else
	 	{	
	 		// nếu xóa hết giỏ hàng thì xóa session cart
	 		Session::forget('cart');
	 	}
	 	
	 	return redirect()->back();
	}
	public function getShoppingCart()
	{
		return view('pages.shopping_cart');
	}

	public function postXyliCart(Request $request)
	{
		//lay request tu ajax truyen sang
		$soluong = $request->slm;
		$id= $request->id;
		// lấy session cart
		// Kiem tra xem co sana pham trong card khong
		$oldCart = Session('cart')?Session::get('cart'):null;
	 	$cart = new Cart($oldCart);
	 	//gọi hàm changeQty
	 	$product = Product::find($id);
	 	$cart->changeQty($product,$id,$soluong);
	 	// thêm nó lại vào session;
	 	Session::put('cart',$cart);
	}

	//dung ajax đê thêm giỏ hàng với số lượng tùy chọn
	public function postAjaxAddCart(Request $request)
	{
		
		$id = $request->id;
		$qty = $request->qty;
		//Tìm sản phẩm có id
		$product = Product::find($id);
		//kiem tra tồn tại session cart chưa, lấy oldCart
		$oldCart = Session('cart')?Session('cart'):null;
		//khỏi tạo cart
		$cart= new Cart($oldCart);
		//gọi phương thức add 3 tham số
		$cart->add($product,$id,$qty);
		// lưu cart mơi vào session
		Session::put('cart',$cart);
	}
}
	