@extends('layout.mater')
@section('content')

<div class="container" style="margin-top:20px;">
	<div class="rev-slider" >
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	    <?php $counter = 1; ?>
	    	<?php foreach($slide as $sl)
	    	{
	    	?>
			      <div class="item <?php if($counter==1) echo 'active';?>">
			        <img src="upload/slide/{{$sl->image}}" alt="Los Angeles" style="width:100%;height: 500px">
			      </div>
			     <?php $counter ++;?>
	    	<?php 
	   		 }
	    	?>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>

	<!--slider-->
	</div>

		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list" id="np">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<!-- Đổ newproduct ra trang chủ -->
								@foreach($new_product as $np)
								<div class="col-sm-3">
									<div class="single-item">
										@if($np->promotion_price > 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="san-pham/{{$np->id}}/{{str_slug($np->name)}}.hml"><img src="upload/product/{{$np->image}}" alt=""  width="260px" height="210"></a>
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
											<a class="add-to-cart pull-left" href="add-to-cart/{{$np->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$np->id}}/{{str_slug($np->name)}}.hml">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div class="row">{!!$new_product->appends(['p' => $product->currentPage()])->fragment('np')->links()!!} </div>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list" id='tp'>
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product)}} Sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($product as $pd)
								<div class="col-sm-3" style="margin-bottom: 12px;">
									<div class="single-item">
										@if($pd->promotion_price >0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="upload/product/{{$pd->image}}" alt="" width="260px" height="210" ></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pd->name}}</p>
											<p class="single-item-price">
												@if($pd->promotion_price > 0 )
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
											<a class="add-to-cart pull-left" href="add-to-cart/{{$pd->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$pd->id}}/{{str_slug($pd->name)}}.hml">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div class='row'>{!!$product->appends(['np'=> $new_product->currentPage()])->fragment('tp')->links()!!}</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('title') 
	Cửa hàng máy ảnh
@endsection