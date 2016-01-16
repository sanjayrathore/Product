
    
    <div class="container login-content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Login</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo site_url("admin/home/admin_login");?>" id="admin_loginform" name="admin_loginform">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="" autofocus>
                                    <div class="error"><?php echo form_error('username'); ?><?php echo $this->session->flashdata('username'); ?></div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <div class="error"><?php echo form_error('password'); ?><?php echo $this->session->flashdata('password'); ?></div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-info btn-block" >Login</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>