
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
                        User Information 
                    </div>
                     <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
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
                                                        <a href="javascript:void(0)" class="disable_button" id="<?php echo $row->id;?>">
                                                            <span id="en_<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>assets/images/enable.png" ></span>
                                                            <span name="enab_dis" id="dis_<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>assets/images/disable.png" ></span>
                                                        
                                                         </a>
                                                        <a href="<?php echo site_url('admin/user/edit_user/'.$row->id);?>"  ><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="javascript:void(0)" id="<?php echo $row->id;?>" class="deleteuser" ><i class="glyphicon glyphicon-trash"></i></a>
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
                                                        <a href="javascript:void(0)" class="disable_button" id="<?php echo $row->id;?>"><span  name = "enab_dis" id="en_<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>assets/images/enable.png" ></span><span id="dis_<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>assets/images/disable.png" ></span></a>
                                                        <a href="<?php echo site_url('admin/user/edit_user/'.$row->id);?>"  ><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="javascript:void(0)" id="<?php echo $row->id;?>" class="deleteuser" ><i class="glyphicon glyphicon-trash"></i></a>
                                                    </td>
                                                </tr> 
                                    <?php     
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	