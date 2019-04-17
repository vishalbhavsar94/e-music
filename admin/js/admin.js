function CatEdit(id){

	$.ajax({
			url: "pages/AddCatagoryCode.php?GetEdit="+id,
			cache: false,
			dataType:'json',
			success: function(html){
				
				//alert(html.type_id);
				$('#EditCat').val(html.type_name);
				$('#EditId').val(html.type_id);
				$("#CatModel").modal();
			}
		});
	
}
function UserEdit(id){
	
	$.ajax({
			url: "pages/UsersCode.php?GetEdit="+id,
			cache: false,
			dataType:'json',
			success: function(html){
				
				//alert(html.type_id);
				$('#EditUser').val(html.username);
				$('#EditPass').val(html.password);
				$('#EditId').val(html.id);
				$("#UserModel").modal();
			}
		});
}function FrontUserEdit(id){
	
	$.ajax({
			url: "pages/FrontUsersCode.php?GetEdit="+id,
			cache: false,
			dataType:'json',
			success: function(html){
				
				//alert(html.type_id);
				$('#EditUser').val(html.name);
				$('#EditEmail').val(html.email_id);
				$('#EditPass').val(html.pass);
				$('#EditPhone').val(html.phone);
				$('#EditId').val(html.id);
				$("#FrontUserModel").modal();
			}
		});
}
function validateForm()
{
	var pass1 = $('#psw').val();
	var pass2 = $('#cpsw').val();
    
	if (pass1 != pass2) {
		alert("Password not match");
		return false;	
	}else{
		return true;
	}
}