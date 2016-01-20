
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

                        <div class="row">
                            <div class="col-lg-8">
                                User Information
                            </div>
                            <div class="col-lg-4">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                
                                            <input type="text"
                                                    id="search"
                                                    data-url="<?php echo site_url("admin/user/search_user");?>"
                                                    class="form-control" 
                                                    placeholder="search" />
                                            <div class="input-group-addon">
                                                <span class=" glyphicon glyphicon-search "></span>
                                        
                                            </div>
                                        </div>  
                                    </div>
                                </form>      
                            </div> 
                        </div>
                    </div>  
                </div>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper" id="table-div">
                           
                </div>
            </div>
        </div>
    </div>
</div>
   

	