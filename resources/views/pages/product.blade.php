@extends('layout.mater')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$product->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="upload/product/{{$product->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body" id='detail-product'>
								<p class="single-item-title">{{$product->name}}</p>
								<p class="single-item-price">
									<span>$34.55</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<!-- <div class="space20">&nbsp;</div> -->

							<div class="single-item-desc">
								<p>{{$product->descriptison}}</p>
							</div>
							<!-- <div class="space5">&nbsp;</div> -->

							<p style="margin-bottom: 12px">Số lượng:</p>
							<div class="single-item-options">
								<!-- Note cách để hiện thị option trong select -->
								<select class="wc-select" id="quanlity" name="quanlity">
									<!-- <option>Qty</option> -->
									@for($i=1; $i<=30;$i++)
										<option value='{{$i}}'>{{$i}}</option>
									@endfor
								</select>
								<a class="add-to-cart" id="add-cart" href="javascript:void(0)" data-pdid="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							@foreach($diff_product as $diff_p)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="san-pham/{{$diff_p->id}}/{{str_slug($diff_p->name)}}.hml"><img src="upload/product/{{$diff_p->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										@if($diff_p->promotion_price > 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<p class="single-item-title">{{$diff_p->name}}</p>
										<p class="single-item-price">
											@if($diff_p->promotion_price > 0 )
											<span class='flash-del'>{{number_format($diff_p->unit_price)}}</span>
											<span class="beta-sales-price" style="font-size: 1.3em">{{number_format($diff_p->promotion_price)}}</span>
											@else 
												<span class="beta-sales-price" style="font-size: 1.3em">{{number_format($diff_p->unit_price)}}</span>
											@endif
												<span>vnđ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="san-pham/{{$diff_p->id}}/{{str_slug($diff_p->name)}}.hml">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mại</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($promo_product as $promo)
								<div class="media beta-sales-item">
									<a class="pull-left" href="san-pham/{{$promo->id}}/{{str_slug($promo->name)}}.hml">
										<img src="upload/product/{{$promo->image}}" alt="" width="120px" height="120px"> </a>
									<div class="media-body">
										<a href="san-pham/{{$promo->id}}/{{str_slug($promo->name)}}.hml">{{$promo->name}}</a>
										<span class='flash-del'>{{number_format($promo->unit_price)}}</span>
										<span class="beta-sales-price" style="font-size: 1.3em">{{number_format($promo->promotion_price)}}</span>
										<span>  vnđ</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $new_p)
								<div class="media beta-sales-item">
									<a class="pull-left" href="san-pham/{{$new_p->id}}/{{str_slug($new_p->name)}}.hml"><img src="upload/product/{{$new_p->image}}" alt=""></a>
									<div class="media-body">
										<a href="san-pham/{{$new_p->id}}/{{str_slug($new_p->name)}}.hml">{{$new_p->name}}</a>
										@if($new_p->promotion_price > 0 )
											<span class='flash-del'>{{number_format($new_p->unit_price)}}</span>
											<span class="beta-sales-price" style="font-size: 1.3em">{{number_format($new_p->promotion_price)}}</span>
										@else 
											<span class="beta-sales-price" style="font-size: 1.3em">{{number_format($new_p->unit_price)}}</span>
										@endif
											<span>vnđ</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('title') 
	{{$product->name}}
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function($){
			$("#add-cart").click(function (){
				var id = $(this).attr('data-pdid');
				var qty = $('#quanlity').val();
				
				$.ajax({
					url: "ajax/xulycartqty",
					type: 'post',
					data: "id="+id+"&qty="+qty,
					async: true,
					success:function(kq)
					{	
						alert('Bạn đã thêm sản phẩm vào giỏ hàng nhấp vào giỏ hàng để hiện thị chi tiết');
						window.location.reload();
					}
				});
			});
			
		});
	</script>
@endsection

