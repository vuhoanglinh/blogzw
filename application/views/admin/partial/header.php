
<header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo">Flat<span>lab</span></a>
            <!--logo end-->
            
               
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Tìm kiếm">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                            <?php echo  '<img src="'.base_url().'assets/upload/user/'.$_SESSION['admin_info']['hinh_dai_dien'].'" style="width:40px"  />'; ?>
                            &nbsp;&nbsp;<span class="username"><?php echo $_SESSION['admin_info']['ten']?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            
							<li><a href="<?php echo site_url('admin/cap_nhat_thong_tin_quan_tri?id_quan_tri='.$_SESSION['admin_info']['id']);?>"><i class="icon-cog"></i> Thiết Lập</a></li>
                            
                            <li><a href="<?php echo site_url('admin/dang_xuat'); ?>"><i class="icon-key"></i> Đăng Xuất</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
		
