@extends('admin.layout.mater')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình</th>
                                <th>Loại sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Đơn vị</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(count($products)>0)
                        		@foreach($products as $product)
	                            <tr class="odd gradeX" align="center">
	                                <td>{{$product->id}}</td>
	                                <td>{{$product->name}}</td>
	                                <td><img src="upload/product/{{$product->image}}" style="width: 120px;height: 80px;border-radius:3px"></td>
	                                <td>{{$product->type_product->name}}</td>
	                                <td>{{number_format($product->unit_price)}} vnđ</td>
	                                <td>{{number_format($product->promotion_price)}} vnđ</td>
	                                <td>{{$product->unit}}</td>
	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/san-pham/xoa/{{$product->id}}" class='btn-xoa'> Xóa</a></td>
	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/san-pham/sua/{{$product->id}}">Sửa</a></td>
	                            </tr>
	                           	@endforeach	
	                        @else 
	                        	Chưa có sản phẩm nào
	                        @endif

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
