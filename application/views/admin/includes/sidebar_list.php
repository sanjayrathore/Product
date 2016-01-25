<div id="wrapper" >
    <div class="navbar-default sidebar" role="navigation" style="margin-top: 0">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo site_url("admin/home/deshboard");?>">Deshboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i>Users</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url("admin/user/user_list");?>">User List</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("admin/user/add_user");?>">User Add</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i>Product Category</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url("admin/product_categories/product_categories_list");?>">Product Category List</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("admin/product_categories/add_pro_categories");?>">Product Category Add</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i>Product</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Product List</a>
                        </li>
                        <li>
                            <a href="#">Product Add</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>