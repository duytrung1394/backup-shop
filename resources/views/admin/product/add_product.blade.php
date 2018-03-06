@extends('admin.layout.mater')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    

                    <!-- /.col-lg-12 -->
                    <div class="col-lg-9" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Có lỗi</strong> 
                                @foreach($errors->all() as $err)
                                {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Thành Công</strong> {{session('loi')}}
                            </div>
                           
                        @endif
                        @if(session('messages'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Thành Công</strong> {{session('messages')}}
                            </div>
                        @endif
                        <form action="admin/san-pham/them" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type='text' class="form-control" name="txtName" id="product" placeholder="Điền tên sản phẩm" />
                                <div class="alert alert-danger" style="display: none"></div>
                            </div>
                             	<select class="form-control" name="txtType" id='type-product'>
                             		@foreach($type_product as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
                               		@endforeach
                                </select>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control" rows="3" name="txtRecap" id='recap'></textarea>
                                <div class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control ckeditor" rows="5" name="txtDescription" id='description' ></textarea>
                             
                                  <div class="alert alert-danger" id='loi' style="display:none"></div>
                            </div> 
                            
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="image" id='image'>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="txtUnitPrice" id='unitprice' placeholder="Điền vào đơn giá" />
                                <div class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input  class="form-control" name="txtPromotion" id='promotion' placeholder="Điền vào đơn giá" />
                                <div class="alert alert-danger" style="display:none"></div>
                            </div>
                           	<div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="txtUnit" placeholder="Đơn vị" id='unit'/>
                                 <div class="alert alert-danger" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <label>Mới</label>
                                <label class="radio-inline">
                                    <input name="New" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="New" value="0" type="radio">Không 
                                </label>
                            </div>
                            <button type="submit" id='submit-product' class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection