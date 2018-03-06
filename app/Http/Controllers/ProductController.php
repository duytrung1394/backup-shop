<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use DateTime;
use App\TypeProduct;
class ProductController extends Controller
{
    public function getListProduct()
    {
    	$products = Product::all();

    	return view('admin.product.list_product',compact('products'));
    }
   	public function getAddProduct()
   	{
   		$type_product = TypeProduct::select('id','name')->get();
   		
   		return view('admin.product.add_product',compact('type_product'));
   	}

    public function postAddProduct(Request $request)
    {
      $this->validate($request,
        [
          "txtName" => "unique:products,name"
        ],
        [
          "txtName.unique" => "Tên sản phẩm bị trùng"
        ]
      );

        $product = new Product;
        $product->name        = $request->txtName;
        $product->id_type     = $request->txtType;
        $product->recap       = $request->txtRecap;
        $product->description = $request->txtDescription;
        $product->unit_price  = $request->txtUnitPrice;
        $product->promotion_price = $request->txtPromotion;
        $product->unit        = $request->txtUnit;
        $product->new         = $request->New;
        $product->created_at  = new DateTime();
        if($request->hasFile('image'))
        {
          $file = $request->file('image');
          $allowed = array('image/jpeg','image/png','image/jpg');
          if(in_array($file->getClientMimeType(),$allowed))
          {
            $ext = $file->getClientOriginalExtension();
            $renamed = uniqid("_anh",true).".".$ext;
            $file->move('upload/product/',$renamed);
           
            $product->image       = $renamed;

            $product->save();
            return redirect('admin/san-pham/them')->with('messages','Thêm thành công');
          
          }else
          {
            return redirect('admin/san-pham/them')->with('loi','Bạn hãy chọn file ảnh có định dạng jpg, png, jpeg');
          }
        }else{
            return redirect('admin/san-pham/them')->with('loi','Bạn chưa chọn hình sản phẩm');

        }
        
    }

    public function getEditProduct($id)
    {
      $product  = Product::find($id);
      $id_type =  $product->id_type;
      $type_product = TypeProduct::all();

      return view("admin.product.edit_product",compact("id_type","product","type_product"));
    }

    public function postEditProduct(Request $request, $id)
    {
      $product = Product::find($id);

      $product->name = $request->txtName;
      $product->recap = $request->txtRecap;
      $product->description = $request->txtDescription;
      $product->id_type = $request->txtType;
      $product->unit_price = $request->txtUnitPrice;
      $product->promotion_price = $request->txtPromotion;
      $product->unit= $request->txtUnit;
      $product->new = $request->New;
      $product->updated_at = new DateTime();

      if($request->hasFile('image'))
      {
        $file = $request->file('image');
        $allowed = array("image/jpg","image/png","image/jpeg");

        if(in_array($file->getClientMimeType(),$allowed))
        {
          $ext = $file->getClientOriginalExtension();
          $renamed = uniqid("_anh",true).".".$ext;
          if(!$file->move('upload/product/',$renamed))
          {
            return redirect("admin/san-pham/sua/".$id)->with("loi","Không thể upload");
          }
          else{
            $product->image= $renamed;
            $product->save();
            return redirect("admin/san-pham/sua/".$id)->with("messages","Sửa thành công");
          
          }
        }
      }
        else{
           $product->save();
            return redirect("admin/san-pham/sua/".$id)->with("messages","Sửa thành công");
     }
   }
   public function getDeleteProduct($id)
   {
    $product = Product::find($id);
    $product->delete();
    return redirect('admin/san-pham/danh-sach')->with("messages","Xóa thành công");
   }
}
