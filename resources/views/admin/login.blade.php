<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Admin - Khoa Phạm</title>
    <base href="{{asset('')}}">                         <!--  phai gắn base href để có thể link đế href đúng đén folder public -->
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <link href='css/my.css' rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!!</strong><br>
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <!-- In Thông báo -->
                      
                    <div class="panel-body">
                        <form role="form" action="admin/login" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="txtEmail" id="email" type="email" autofocus>
                                    <div class="alert alert-danger" style="display:none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="txtPass" id="password" type="password" value="">
                                     <div class="alert alert-danger" style="display:none;">
                                    </div>
                                </div>
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               
                                {{session('loi')}}
                            </div>
                        @endif
                                <button type="submit" id="btn-login" class="btn btn-lg btn-primary btn-block">Đăng nhập</button>
                            </fieldset>
                             {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#btn-login").click(function (){
            var email   = $("#email").val();
            var pass    = $("#password").val();
            var error   = false;
            
            if(email == "")
            {
                $("#email").next(".alert").html("Bạn chưa nhập email");
                $("#email").next(".alert").fadeIn();
                error = true;
            }
            if(pass == "")
            {
                $("#password").next(".alert").html("Bạn chưa nhập password");
                $("#password").next(".alert").fadeIn();
                 error = true;
            }
            if(error == true)
            {
                return false;
            }
            });
            
            $("#email").keyup(function (){
                $(this).next(".alert").fadeOut();
            });
            $("#password").keyup(function (){
                $(this).next(".alert").fadeOut();
            });
        });
    </script>
</body>

</html>
