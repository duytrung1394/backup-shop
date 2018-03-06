$(document).ready(function(){
	$('.btn-xoa').click(function(){
		
		var c = confirm('Bạn muốn xóa dòng dữ liệu này?');
		if(c == false)
		{
			return false;
		}
	
	});
	//submit type_product


    $('#submit-type').click(function(){
        var n = $('#typename').val();
        var m = $('#mota').val();
        error= false;
        if(n=='')
        {
            $('#typename').next('.alert').html('Bạn chưa nhập ten');
            $('#typename').next('.alert').fadeIn();
            error =  true;
        }
        if(m=='')
        {
            $('#mota').next('.alert').html('Bạn chưa nhập mô tả');
            $('#mota').next('.alert').fadeIn();
            error =  true;
        }
        if(error == true)
        {
            return false;
        }

    });
    $('#typename').keyup(function (){
         $('#typename').next('.alert').fadeOut();
    });
     $('#mota').keyup(function (){
         $('#mota').next('.alert').fadeOut();
    });

    $('#submit-product').click(function () {
        var p = $('#product').val();
        var r = $('#recap').val();
        var d = CKEDITOR.instances.description.getData();
        var u = $('#unitprice').val();
        var o = $('#promotion').val();
        var i = $('#unit').val();
        var error = false;

        if(p == "")
        {
            $('#product').next('.alert').html('Bạn phải nhập tên');
            $('#product').next('.alert').fadeIn();
            error = true;
        }
        if(d == "")
        {
            $('#loi').html("Bạn cần nhập Mô tả");
            $('#loi').fadeIn();
            error =true;
        }
        
         if(/^[0-9]{4,11}$/g.test(u) == false)
        {  
            $('#unitprice').next('.alert').html('Bạn cần nhập đơn giá');
            $('#unitprice').next('.alert').fadeIn();
            error = true;
        }
        if(o == ""){
            error = false;
        }else if(/^[0-9]{4,20}$/g.test(o) ==false){
            console.log('xx');
            $('#promotion').next('.alert').html('Bạn nhập lại giá khuyến mãi');
            $('#promotion').next('.alert').fadeIn();
            error = true;
        }
        if(i == "")
        {
            $('#unit').next('.alert').html('Bạn cần nhập đơn vị tính');
            $('#unit').next('.alert').fadeIn();
            error = true;
        }
        if(error == true)
        {
            
            return false;
        }
        
    });

   
    $('#product').keyup(function (){
         $(this).next('.alert').fadeOut();
    }); 

    $('#unitprice').keyup(function (){
         $(this).next('.alert').fadeOut();
    }); 

    $('#unit').keyup(function (){
         $(this).next('.alert').fadeOut();
    });
    
    $("#name").keyup(function (){
        $(this).next(".alert").fadeOut();
    });
    $("#pass").keyup(function (){
        $(this).next(".alert").fadeOut();
    });
    $("#email").keyup(function (){
        $(this).next(".alert").fadeOut();
    });
    $("#repass").keyup(function (){
        $(this).next(".alert").fadeOut();
    });
});
