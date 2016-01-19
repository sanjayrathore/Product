    
    <div id="page-wrapper">
    	<div class="row">
			<div class="col-lg-10">
    			<h3 class="page-header">User Profile</h3>
    		</div>
    		<div class="col-md-2">
                <a href="<?php echo site_url("admin/user/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<h4>Name: </h4>
			</div>
			<div class="col-lg-3">
				<h4><?php echo $result['name'];?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<h4>UserType: </h4>
			</div>
			<div class="col-lg-3">
				<h4><?php echo $result['user_type'];?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<h4>Email: </h4>
			</div>
			<div class="col-lg-3">
				<h4><?php echo $result['email'];?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<h4>UserName: </h4>
			</div>
			<div class="col-lg-3">
				<h4><?php echo $result['username'];?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1 col-lg-offset-1">
				<a href="<?php echo site_url('admin/user/edit_user/'.$result['id']);?>"><h4><span class="glyphicon glyphicon-pencil"></h4></a>
				
			</div>
			
			
		</div>		
	</div>
</div>

   