<div class="container login-content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Unique code</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" id="unique_code" action="<?php echo site_url("admin/user/check_unique_code");?>"  name="">
                            <fieldset>
                                <div class="form-group">
                                	<input type="hidden" name="id" value="<?php echo $results['id'];?>">
                                    <input class="form-control" placeholder="Uniquecode" name="uniquecode" type="text" autofocus>
                                    <div class="error"><?php echo form_error('uniquecode'); ?><?php echo $this->session->flashdata('uniquecode'); ?></div>
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-info btn-block" >Submit</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>