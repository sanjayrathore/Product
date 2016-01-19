
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">User List</h1>
            </div>
            <div class="col-md-2">
                <a href="<?php echo site_url("admin/user/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </div>
            
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <form class="form-inline">
                            User Information
    
                            <label class="lable-search"> 
                                <input type="text" name ="search" id="search" class="form-control" placeholder="search">
                                <button  type=" submit" class="btn btn-ms btn-info">search</button> 
                            </label>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper" id="table-div">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	