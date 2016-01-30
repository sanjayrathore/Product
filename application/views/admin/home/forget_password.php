<div class="container login-content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Forget Password</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo site_url("admin/user/forget_password_process");?>"  name="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="text" autofocus>
                                    <div class="error"><?php echo form_error('email'); ?><?php echo $this->session->flashdata('email'); ?></div>
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-info btn-block" >Submit</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>