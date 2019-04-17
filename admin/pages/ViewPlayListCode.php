<?php
include('../conn.php');
if(isset($_REQUEST['delete_id'])){
   $id = $_REQUEST['delete_id'];
   $sql = "delete from playlist where id = $id";
   mysql_query($sql);
   ?>
    <script>
            alert('PlayList deleted ');
            window.location.href="../index.php?ViewPlayList";
    </script>

<?php } ?>