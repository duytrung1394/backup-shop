<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use DateTime;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getListUser()
    {
    	$users = User::all();
    	return view('admin.users.list_user',compact('users'));
    }

    public function getAddUser()
    {
    	return view('admin.users.add_user');
    }

    public function postAddUser(Request $request)
    {
    	$this->validate($request,
    		[
    			"txtEmail" => "email|unique:users,email"
    		],
    		[
    			"txtEmail.email" => "Bạn phải nhập đúng định dạng email", 
    			"txtEmail.unique" => "Email đã bị trùng"
    		]
    	);
    	$user = new User();
    	$user->full_name = $request->txtUserName;
    	$user->email = $request->txtEmail;
    	$user->password = bcrypt($request->txtPass);
    	$user->level = $request->rdoLevel;
    	$user->created_at = new DateTime();
    	$user->save();
    	return redirect("admin/user/them")->with("messages","Thêm thành công");
    }

    public function getAdminLogin()
    {   
        if(Auth::check() &&  Auth::user()->level== 2)
            {
                return redirect("admin/san-pham/danh-sach");
            }else{
                return view('admin.login');
            }
    	//get view login_admin
    	
    }

    public function postAdminLogin(Request $request)
    {

    	$this->validate($request,
    		[
    			"txtEmail" => "email"
    		],
    		[
    			"txtEmail.email" => "Bạn cần nhập email"
    		]
    	);
    	$email = $request->txtEmail;
    	$password = $request->txtPass;
    	if(Auth::attempt(['email'=>$email , 'password' =>$password]))
    	{
    		return redirect("admin/san-pham/danh-sach");
    	}else
    	{
    		return redirect("admin/login")->with("loi","Sai username hoac mat khau");
    	}
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect("admin/login");
    }

}
