<?php
namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id,$qty= 1){
		//khởi biến sản phẩm vừa thêm vào mặc định số lượng bằng 0
		$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		
		if($this->items){
			//nếu sản phẩm vừa thêm vào đã tồn tại , sản phẩm mặc định lấy giá trị của items(oldCart) đã có voi id 
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		//số lượng bằng số lượng đã có + $qty, nếu sản phẩm mới thì 'qty'=>0, ngược lại = $qty đã có trong session(oldCart)

		$giohang['qty'] += $qty;
		if($item->promotion_price > 0)
		{
			$giohang['price'] = $item->promotion_price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->unit_price * $giohang['qty'];
		}
		
		$this->items[$id] = $giohang;
		$this->totalQty   += $qty;
		$this->totalPrice += $giohang['price'] ;
	}
	//doi so luong item
	public function changeQty($item,$id,$qty)
	{	//lấy tổng số lượng trừ đi số lượng cũ của item đã chọn thay đổi 
		//tổng giá tiền trừ đi số tiền cũ của item đã chọn
		$this->totalQty -= $this->items[$id]['qty'];
		//nếu là sản phẩm khuyến mãi
		if($item->promotion_price >0){
			$this->totalPrice -= $item->promotion_price * $this->items[$id]['qty'];
		}else{
			$this->totalPrice -= $item->unit_price  * $this->items[$id]['qty'];
		}
		//gắn số lượng mới vào item
		$this->items[$id]['qty'] = $qty;
		//lấy số lượng cổng với số lượng của item đã thay đổi
		$this->totalQty +=  $qty;
		// $this->totalPrice += $this->items[$id]['item']['unit_price'] *$qty;
		if($item->promotion_price >0){
			$this->totalPrice += $item->promotion_price * $qty;
		}else{
			$this->totalPrice += $item->unit_price  * $qty;
		}
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
