@extends('admin.layout.mater')    
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       @if(count($errors)>0)                            
                       <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                @endforeach
                            </div>
                        @endif
                        <!-- printer flash session messages -->
                        @if(session('messages'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('messages')}}
                        </div>
                        @endif
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUserName" id="name" placeholder="Please Enter Username" />
                                <div class="alert alert-danger" style="display: none"></div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" id="pass" placeholder="Please Enter Password" />
                                <div class="alert alert-danger" style="display: none"></div>
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" id="repass" placeholder="Please Enter RePassword" />
                                <div class="alert alert-danger" style="display: none"></div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" id="email" placeholder="Please Enter Email" />
                                <div class="alert alert-danger" style="display: none"></div>
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" type="radio">Member
                                </label>
                            </div>
                            {{csrf_field()}}
                            <button type="submit" id="sb-add-user" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $("#sb-add-user").click(function()
            {
                var name = $("#name").val();
                var pass = $("#pass").val();
                var repass = $("#repass").val();
                var email = $("#email").val();
                var error = false;
                if(name == "")
                {
                    $("#name").next(".alert").html('Bạn chưa nhập tên');
                    $("#name").next(".alert").fadeIn();
                    error = true;
                }   
                if(pass == "")
                {
                    $("#pass").next(".alert").html("Bạn chưa nhập mật khẩu");
                    $("#pass").next(".alert").fadeIn();
                    error = true;
                   
                }else if(repass != pass)
                {
                    $("#repass").next(".alert").html('Mật khẩu không trùng khớp');
                    $("#repass").next(".alert").fadeIn();
                    error = true;
                }
                if(email == "")
                {
                    $("#email").next(".alert").html("Bạn chưa nhập email");
                    $("#email").next(".alert").fadeIn();
                    error = true;
                } 
                if(error == true)
                {
                    return false;
                }
            });

        });
    </script>
@endsection