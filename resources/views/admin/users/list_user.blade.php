@extends('admin.layout.mater')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>@if($user->level == 2)Admin @else Người dùng @endif</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=""> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection