<?php
if(isset($_REQUEST['id']) && isset($_REQUEST['email'])){
	$id = $_REQUEST['id'];
	$email = $_REQUEST['email'];
		
}
?>
<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset Password</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" onsubmit="return validateForm()" action="pages/ResetPasswordCode.php" method="post">
                            <fieldset>
                            		<input type="hidden" name="id" value="<?php echo $id ?> "/>
                            		<input type="hidden" name="email" value="<?php echo $email ?>"/>
                                <div class="form-group">
                                    <input class="form-control" placeholder="new password" name="psw"  id="psw" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm password" name="cpsw" id="cpsw" type="password" value="">
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit">Update</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>