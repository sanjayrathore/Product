
    

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
                                    
                                    <span name="enab_dis" id="dis_<?php echo $row->id;?>">
                                        
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
                                    
                                    <span  name = "enab_dis" id="en_<?php echo $row->id;?>">
                                    
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
    <!--  <?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>  -->