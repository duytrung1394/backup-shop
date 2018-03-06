@extends('admin.layout.mater')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        @if(session('messages'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('messages')}}
                        </div>
                        
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                               
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($type_product) > 0)
                                @foreach($type_product as $type)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                  
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class='btn-xoa' href="admin/loai-san-pham/xoa/{{$type->id}}" > Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loai-san-pham/sua/{{$type->id}}">Sửa</a></td>
                                </tr>
                                @endforeach
                            @else 
                                <tr class="odd gradeX">
                                <td colspan="4">Chưa có loại sản phẩm nào</td> 
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
    </div>
            <!-- /.container-fluid -->
</div>
@endsection

