
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">User List</h1>
            </div>
            <div class="col-md-2">
                <a href="<?php echo site_url("admin/home/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                    ?>
                                    <tr id="<?php echo $row->id;?>" class="odd gradeX">
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->email?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/home/edit_user/'.$row->id);?>"  ><span class="glyphicon glyphicon-pencil"></a>
                                            <a href="javascript:void(0)" id="<?php echo $row->id;?>" class="deleteuser" ><span class="glyphicon glyphicon-trash"></a>
                                        </td>
                                        
                                    </tr>            
                                    <?
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
    
	