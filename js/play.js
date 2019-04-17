function play(id){
	$.ajax({
			url: "pages/SongPlay.php?Song_id="+id,
			cache: false,
			dataType:'json',
			success: function(html){
				var file = html.file.substr(3);
				ChangeSrc('admin/'+file);
				/*$('#EditCat').val(html.type_name);
				$('#EditId').val(html.type_id);
				$("#CatModel").modal();*/
			}
		});
}
function ChangeSrc(src){
	var audio = $('#audio-player');
	$('#mp3').attr("src",src);
	audio[0].pause();
	audio[0].load();
	audio[0].oncanplaythrough = audio[0].play();
	
}
function Fav(sid,uid){
	
	$.ajax({
			url: "pages/FavAlbum.php?Song_id="+sid+"&User_id="+uid,
			cache: false,
			success: function(html){
				alert(html);
			}
		});
}
function UnFav(id){
	$.ajax({
			url: "pages/FavAlbum.php?Fav_id="+id,
			cache: false,
			success: function(html){
				alert(html);
				AjaxPages('pages/FavAlbumList.php?FavAlbumList');
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
function isNumber(evt) {
	var iKeyCode = (evt.which) ? evt.which : evt.keyCode
	if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)){
		alert('Enter Number Only.')
		return false;
	}else{
		return true;	
	}
}
function lettersOnly(evt) {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
		((evt.which) ? evt.which : 0));
	if (charCode > 31 && (charCode < 65 || charCode > 90) &&
		(charCode < 97 || charCode > 122)) {
		alert("Enter letters only.");
		return false;
	}
	return true;
}
function AjaxPages(url){
    $.ajax({
        url:url,
        success: function(data) {
            $('#mainpage').html(data);
            
         }
        });
}
function searching(chr){
	AjaxPages("pages/Search.php?Search="+chr);
}