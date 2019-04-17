<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
   
}

    $artist_id =  $_REQUEST['ArtistAlbum'];
    $sql = "select * from album_master where find_in_set($artist_id,artist_name)";
    $res = mysql_query($sql); 
   
?>
<div class="browse col-lg-12">
	<!-- New song -->
	<div class="tittle-head two">
		<h3 class="tittle">Artist</h3>
	<div class="clearfix"> </div>
</div>
<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
				<div class="browse-inner">
                    <?php while($row = mysql_fetch_row($res)){ ?>
				    <div class="col-md-3 artist-grid">
					    <a  onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['0']; ?>')"><img src="<?php echo 'admin/'.substr($row['6'],3);?>" title="allbum-name"></a>
						    <a onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['0']; ?>')"><i class="glyphicon glyphicon-play-circle"></i></a>
						        <a class="art"><?php echo $row['2']; ?></a>
                    </div>
                    <?php } ?>
                </div>
        </div>
</div>	