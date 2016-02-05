
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
            <div class="panel-body" id="panel-body">
                <div class="dataTable_wrapper" id="usertable-div">
                 <table class="table table-striped table-bordered table-hover" id="userlisttable">
        <thead>
            <tr>
                <th><a href="javascript:void(0)" id="nameId" >Name</a></th>
                <th><a href="javascript:void(0)" id="emailId" >Email</a></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 

                foreach ($results as $row)
                {   
                    if ($row->is_enabled == 1)
                    {

                    
            ?>
                        <tr id="tr_<?php echo $row->id ;?>" class="odd gradeX">
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->email?></td>
                            <td>
                                <a href="javascript:void(0)" class="disable_button" data-id="<?php echo $row->id;?>" data-url="<?php echo site_url('admin/user/disable_user');?>">
                                    
                                    <span id="en_<?php echo $row->id;?>">
                                        
                                        <img src="<?php echo base_url(); ?>assets/images/enable.png" >
                                    
                                    </span>
                                    
                                    <span class="enab_dis" id="dis_<?php echo $row->id;?>">
                                        
                                        <img src="<?php echo base_url(); ?>assets/images/disable.png" >

                                    </span>
                                
                                </a>
                                
                                <a href="<?php echo site_url('admin/user/edit_user/'.$row->id);?>"  ><i class="glyphicon glyphicon-pencil"></i></a>
                                
                                <a href="javascript:void(0)" data-url="<?php echo site_url('admin/user/delete_user');?>" data-id="<?php echo $row->id;?>" class="deleteuser" ><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                            
                        </tr>            
            <?php
                    }
                    else
                    {
            ?>          <tr id="tr_<?php echo $row->id ;?>" class="odd gradeX disable-color">
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->email?></td>
                            <td>
                                <a href="javascript:void(0)" class="disable_button" data-id="<?php echo $row->id;?>" data-url="<?php echo site_url('admin/user/disable_user');?>">
                                    
                                    <span  class = "enab_dis" id="en_<?php echo $row->id;?>">
                                    
                                        <img src="<?php echo base_url(); ?>assets/images/enable.png" >
                                    
                                    </span>
                                    
                                    <span id="dis_<?php echo $row->id;?>">
                                    
                                        <img src="<?php echo base_url(); ?>assets/images/disable.png" >
                                    
                                    </span>
                                </a>
                                <a href="<?php echo site_url('admin/user/edit_user/'.$row->id);?>"  ><i class="glyphicon glyphicon-pencil"></i></a>
                                
                                <a href="javascript:void(0)" data-url="<?php echo site_url('admin/user/delete_user');?>" data-id="<?php echo $row->id;?>" class="deleteuser" ><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr> 
            <?php     
                    }
                }
            ?>
        </tbody>

     </table> 
  <?php echo $this->ajax_pagination->create_links(); ?>
            </div>

        </div>
    </div>
</div>
   

	