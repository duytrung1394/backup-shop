@extends('layout.mater')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">
					{{$typeP->name}}
				</h6>
				<!--  -->
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="">Trang chủ</a> / <span>Danh mục sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none" id='np'>
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($typeProduct as $type)

							<li 
							@if($type->id == $typeP->id)
								class='is-active' 
							@endif
							>
							<a href="loai-san-pham/{{$type->id}}/{{str_slug($type->name)}}.hml">{{$type->name}}</a></li>
							@endforeach
													
						</ul>
					

					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							@if(count($new_product)==0)
								Không có sản phẩm mới
							@else
							<div class="row">
								@foreach($new_product as $np)
								<div class="col-sm-4">
									
									<div class="single-item">
										@if($np->promotion_price > 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="san-pham/{{$np->id}}/{{str_slug($np->name)}}.hml"><img src="upload/product/{{$np->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$np->name}}</p>
											<p class="single-item-price">
												@if($np->promotion_price > 0)
												<span class="flash-del">{{number_format($np->unit_price)}}</span>
												<span class="flash-sale">{{number_format($np->promotion_price)}}</span>
												<span style="font-size: 0.9em"> vnđ</span>
												@else 
												<span>{{number_format($np->unit_price)}}</span>
												<span style="font-size: 0.9em"> vnđ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$np->id}}/{{str_slug($np->name)}}.hml">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$new_product->fragment('np')->links()}}</div>
							@endif
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list" id="pd">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($product as $pd)
								<div class="col-sm-4">
									<div class="single-item">
										@if($pd->promotion_price > 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="san-pham/{{$pd->id}}/{{str_slug($pd->hml)}}.hml"><img src="upload/product/{{$pd->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pd->name}}</p>
											<p class="single-item-price">
												@if($pd->promotion_price > 0)
												<span class="flash-del">{{number_format($pd->unit_price)}}</span>
												<span class="flash-sale">{{number_format($pd->promotion_price)}}</span>
												<span style="font-size: 0.9em"> vnđ</span>
												@else 
												<span>{{number_format($pd->unit_price)}}</span>
												<span style="font-size: 0.9em"> vnđ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$pd->id}}/{{str_slug($pd->id)}}.hml">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">{{$product->fragment('pd')->links()}}</div>
						</div> <!-- .beta-products-list -->

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('title') 
	{{$typeP->name}}
@endsection