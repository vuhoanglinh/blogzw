<!--sidebar start-->

<aside>
  <div id="sidebar"  class="nav-collapse "> 
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <li class="sub-menu"> <a href="javascript:;" 
<?php   
if(!empty($muc_cha) && $muc_cha == 'bai_viet') 
{
echo 'class="active"';
}
?>> <i class="icon-pencil"></i> <span>Bài Viết</span> </a>
        <ul class="sub">
          <li  <?php if(!empty($muc_con) && $muc_con == 'them_bai_viet'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/them_bai_viet')?>">Thêm Bài Viết</a></li>
          <li <?php if(!empty($muc_con) && $muc_con == 'danh_sach_bai_viet'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/danh_sach_bai_viet')?>">Danh Sách Bài Viết</a></li>
        </ul>
      </li>
      <li class="sub-menu"> <a href="javascript:;" <?php if(!empty($muc_cha) && $muc_cha == 'loai_bai_viet'){echo 'class="active"';}?>> <i class="icon-book"></i> <span>Loại Bài Viết</span> </a>
        <ul class="sub">
          <li <?php if(!empty($muc_con) && $muc_con == 'them_loai_bai_viet'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/them_loai_bai_viet')?>">Thêm Loại</a></li>
          <li <?php if(!empty($muc_con) && $muc_con == 'danh_sach_loai_bai_viet'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/danh_sach_loai_bai_viet')?>">Danh Sách Loại</a></li>
        </ul>
      </li>
      <li class="sub-menu"> <a href="javascript:;" 
<?php   
if(!empty($muc_cha) && $muc_cha == 'binh_luan') 
{
echo 'class="active"';
}
?>> <i class="icon-pencil"></i> <span>Danh sách bình luận</span> </a>
        <ul class="sub">
          <li  <?php if(!empty($muc_con) && $muc_con == 'danh_sach_binh_luan'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/danh_sach_binh_luan')?>">Danh sách bình luận</a></li>
        </ul>
      </li>
      <li class="sub-menu"> <a href="javascript:;" 
      <?php   
if(!empty($muc_cha) && $muc_cha == 'quan_tri') 
{
echo 'class="active"';
}
?>> <i class="icon-user"></i> <span>Quản Trị</span> </a>
        <ul class="sub">
          <li <?php if(!empty($muc_con) && $muc_con == 'them_quan_tri'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/them_quan_tri')?>">Thêm Quản Trị</a></li>
          <li <?php if(!empty($muc_con) && $muc_con == 'danh_sach_quan_tri'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/danh_sach_quan_tri')?>">Danh Sách Quản Trị</a></li>
        </ul>
      </li>
      <li class="sub-menu"> <a href="javascript:;" 
      <?php   
if(!empty($muc_cha) && $muc_cha == 'cau_hinh') 
{
echo 'class="active"';
}
?>> <i class="icon-cogs"></i> <span>Cấu Hình</span> </a>
        <ul class="sub">
          <li <?php if(!empty($muc_con) && $muc_con == 'banner'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/banner')?>"> Banner</a></li>
          <li <?php if(!empty($muc_con) && $muc_con == 'slider'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/slider')?>"> Slider</a></li>
          <li <?php if(!empty($muc_con) && $muc_con == 'seo'){echo 'class="active"';}?>><a  href="<?php echo site_url('admin/seo')?>"> SEO</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end--> 
  </div>
</aside>
<!--sidebar end-->

</div>
