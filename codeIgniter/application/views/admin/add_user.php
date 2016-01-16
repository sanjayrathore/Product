
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">User Registration Form</h1>
            </div>
            <div class="col-md-2">
                <a href="<?php echo site_url("admin/home/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Input
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-2">
                                <form role="form" id="reg_form" method="POST" action="<?php echo site_url("admin/home/add_userprocess");?>">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"class="form-control"/>
                                        <div class="error"><?php echo form_error('name'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="usertype">UserType</label>
                                        <input type="text" name="usertype" id="usertype" class="form-control"/>
                                        <div class="error"><?php echo form_error('usertype'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"/>
                                        <div class="error"><?php echo form_error('email'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"/>
                                        <div class="error"><?php echo form_error('password'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">UserName</label>
                                        <input type="text" name="username" id="username" class="form-control"/>
                                        <div class="error"><?php echo form_error('username'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-info">Submit</button>
                                        <button type="button" id="reg_reset" class="btn btn-lg btn-info">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>       
</div>