@extends('admin.layout.mater')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Có lỗi</strong> 
                                @foreach($errors->all() as $err)
                                {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(session('messages'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Thành Công</strong> {{session('messages')}}
                            </div>
                           
                        @endif
                        <form action="admin/loai-san-pham/sua/{{$type->id}}" method="POST">
                            
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="txtTypeName" id='typename' value="{{$type->name}}" placeholder="Hãy điền vào tên loại" />
                                <div class="alert alert-danger" style="display: none">                                 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" id="mota" name='txtMota' rows="5">{{$type->description}}</textarea>
                                 <div class="alert alert-danger" style="display: none">                                 
                                </div>
                            </div>
                            <button type="submit" id='submit-type' class="btn btn-default">Sửa</button>
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
