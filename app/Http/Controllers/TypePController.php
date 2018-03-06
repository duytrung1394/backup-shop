<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\TypeProduct;
class TypePController extends Controller
{
    public function getListType()
    {	
    	//lấy ra danh sách các loại sản phẩm;
    	$type_product = TypeProduct::select('id','name')->get();
    	//truyền sang view
    	return view('admin.type_product.list_type',compact('type_product'));
    }

    public function getAddType()
    {
    	return view('admin.type_product.add_type');
    }
    public function postAddType(Request $request)
    {
        $this->validate($request,
            [
                'txtTypeName' => 'unique:type_products,name'    //unique ten bang trong csdl , ten cot
            ],
            [
                'txtTypeName.unique' => 'Tên loại sản phẩm bị trùng'
            ]
        );

    	$type = new TypeProduct();
        $type->name = $request->txtTypeName;
        $type->description = $request->txtMota;
        $type->save();
        return redirect('admin/loai-san-pham/them')->with('messages','Thêm thành Công');   
    }
    
    public function getDeleteType($id)
    {
        $type = TypeProduct::find($id);
        $type->delete();
        return redirect('admin/loai-san-pham/danh-sach')->with('messages','Xóa thành công');
    }

    public function getEditType($id)
    {
        $type = TypeProduct::find($id);
        return view('admin.type_product.edit_type',compact('type'));
    }

    public function postEditType(Request $request,$id)
    {
        $this->validate($request,
            [
                'txtTypeName' => 'unique:type_products,name'
            ],
            [
                'txtTypeName.unique' => 'Tên loại sản phẩm bị trùng'
            ]   
        );
        $type = TypeProduct::find($id);
        $type->name = $request->txtTypeName;
        $type->description = $request->txtMota;
        $type->save();
        return redirect('admin/loai-san-pham/sua/'.$id)->with('messages','Sửa thành công');
    }
}
