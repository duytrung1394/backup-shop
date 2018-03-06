@extends('layout.mater')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Shopping Cart</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Đơn Giá</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
					@if(Session::has('cart'))
						@foreach($product_cart as $product)
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="upload/product/{{$product['item']['image']}}" alt="" width="120">
									<div class="media-body">
										<p class="font-large table-title">{{$product['item']['name']}}</p>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">
									@if($product['item']['promotion_price']>0)
									{{number_format($product['item']['promotion_price'])}}
									@else
									{{number_format($product['item']['unit_price'])}}
									@endif
								</span>
							</td>
						
							<td class="product-quantity">

								<select name="product-qty" class="product-qty" data-productid="{{$product['item']['id']}}">
									@for($i = 1; $i < 30 ; $i ++)
										@if($i == $product['qty'])
											<option value="{{$i}}" selected="selected">{{$i}}</option>
										@else
											<option value="{{$i}}">{{$i}}</option>
										@endif
									@endfor
								</select>

							</td>

							<td class="product-subtotal">
								<?php 
									if($product['item']['promotion_price']>0)
										$total = $product['item']['promotion_price']* $product['qty'];
									else $total = $product['item']['unit_price']* $product['qty'];
								?>
								<span class="amount">{{number_format($total)}}</span>
							</td>

							<td class="product-remove">
								<a href="{{route('xoagiohang',$product['item']['id'])}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
						@else
							<tr>
								<td colspan="6">Chưa chọn sản phẩm nào</td>
							</tr>
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" class="actions">
								<a href=""><button type="submit" class="beta-btn primary" name="update_cart">Tiếp tục mua hàng <i class="fa fa-chevron-left"></i></button></a>
							</td>
							<td colspan="2"></td>
							<td colspan='2'>
								<button type="submit" class="beta-btn primary" name="proceed">Tiến hành thanh toán <i class="fa fa-chevron-right"></i></button>
							</td>
						</tr>
					</tfoot>

					
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">
				@if(Session::has('cart'))
				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Tổng cộng</h5></div>
					<div class="cart-totals-row"><span>Tổng tiền:</span> <span>{{number_format(session('cart')->totalPrice)}}</span><span> vnđ</span></div>
				</div>
				@endif
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function($){
			// Để có thể dùng ajax cho nhiều thẻ select ta phải gọi class
			$('.product-qty').change(function () {
				//lay gia tri o select
				slm = $(this).val();
				id = $(this).attr('data-productid');
				
				$.ajax({
					url: "ajax/xulycart",
					type: "post",
					data: "slm="+slm+"&id="+id,
					async:true,
					success:function(kq){
						window.location.reload();
					}
				})
			});
		});
		
	</script>
@endsection
