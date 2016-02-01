<div class="container login-content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Change Password</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" id="change_password" action="<?php echo site_url("admin/user/change_password_process");?>"  name="">
                            <fieldset>
                                <div class="form-group">
                                	<input type="hidden" name="id" value="<?php echo $results['id'];?>">
                                    <input class="form-control" placeholder="NewPassword" name="newpassword" type="text" autofocus>
                                    <div class="error"><?php echo form_error('newpassword'); ?><?php echo $this->session->flashdata('newpassword'); ?></div>
                                </div>
                                <div class="form-group">
                                   
                                    <input class="form-control" placeholder="ConfirmPassword" name="confirmpassword" type="text" autofocus>
                                    <div class="error"><?php echo form_error('confirmpassword'); ?><?php echo $this->session->flashdata('confirmpassword'); ?></div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-info btn-block" >Submit</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>