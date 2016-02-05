<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Product Edit Form</h1>
            </div>
            <div class="col-md-2">
                <a href="<?php echo site_url("admin/user/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <form role="form" id="pro_editform" method="POST" action="<?php echo site_url("admin/product/edit_process_product");?>"  enctype="multipart/form-data">
                                    <input type="hidden" name ="image_name" value="<?php echo $result['image_name'];?>">
                                    <input type="hidden" name ="id" value="<?php echo $result['id'];?>">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"class="form-control" value="<?php echo $result['title'];?>"/>
                                        <div class="error"><?php echo form_error('title'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price"class="form-control" value="<?php echo $result['price'];?>"/>
                                        <div class="error"><?php echo form_error('price'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" rows="4" name="description" id="description" ><?php echo $result['description'];?></textarea>
                                        </div>
                                        <div class="error"><?php echo form_error('description'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagefile">Image File </label>
                                        <input type="file" name="editimagefile" id="imagefile" />

                                        <div class="error"><?php echo form_error('imagefile'); ?></div>
                                    </div>
                                    <div class="form-group">
                                      <label for="pro_categoriesid">Select product Categories:</label>
                                      <select class="form-control" id="pro_categoriesid" name="pro_categoriesid">
                                      <option value="<?php echo $result['product_categoriesid'];?>"><?php echo $result['title'];?></option>
                                        <?php 
                                            $id = $result['product_categoriesid'];
                                            foreach ($results as $row)
                                            {
                                                 if ( $id !=  $row->id) 
                                                 {
                                                    
                                                
                                        ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                      </select>
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