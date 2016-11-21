<?php
	session_start();
	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('General');
		}
		public function index(){
			if(isset($_SESSION['admin_confirm'])&& $_SESSION['admin_confirm']== '1' && isset($_SESSION['admin_info']) && $_SESSION['admin_info'] != NULL){
				header("Location: ".site_url("admin/danh_sach_bai_viet"));
			}else{
				header("Location: ".site_url('admin/dang_nhap'));
			}
		}
		public function dang_nhap(){
			$this->load->view("admin/dang_nhap");
		}
		public function submit_dang_nhap(){
			if($this->input->post()){
				$data = $this->input->post();
				if(!isset($data['username']) && $data['username']!=""){
					$_SESSION['error'] ="Vui Lòng Nhập Tên Truy Cập";
					header("Location: ".site_url('admin/dang_nhap'));
					exit;
				}
				if(!isset($data['password']) && $data['password']!=""){
					$_SESSION['error'] ="Vui Lòng Nhập Mật Khẩu";
					header("Location: ".site_url('admin/dang_nhap'));
					exit;
				}
				$result_count = $this->General->getItemsNoneActiveRecord("select * from quan_tri where username= '".$data['username']."' and password= '".md5($data['password'])."'");
				if(count($result_count) == 0 ){
					$_SESSION['error'] ="Tài Khoản Hoặc Mật Khẩu Không Chính Xác. Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/dang_nhap'));
					exit;
				}
				if($result_count['0']['trang_thai'] == 0){
					$_SESSION['error'] ="Tài khoản đã bị khóa. Vui lòng liên hệ với quản trị website";
					header("Location: ".site_url('admin/dang_nhap'));
					exit;
				}
				$result_info = $this->General->getItemsNoneActiveRecord("select * from quan_tri where username= '".$data['username']."' and password= '".md5($data['password'])."'");
				$_SESSION['admin_confirm'] = "1";
				$_SESSION['admin_info'] = $result_info['0'];
				
				$_SESSION['success'] = 'Ðăng nhập thành công';
				header('Location: '.site_url('admin/danh_sach_bai_viet'));
			}else{
				$_SESSION['error'] ="Vui Lòng Điền Đầy Đủ Thông Tin";
				header("Location: ".site_url('admin/dang_nhap'));
				exit;
			}
		}
		public function dang_xuat(){
			unset($_SESSION['admin_confirm']);
			unset($_SESSION['admin_info']);
			$_SESSION['success'] ="Đăng Xuất Thành Công";
			header("Location: ".site_url('admin'));
		}
		public function dang_ky(){
			$this->load->view("admin/dang_ky");
		}
		public function them_bai_viet(){
			$data['page_title'] = "Thêm Bài Viết";

			$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
			$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha=0');
			$data['ds_loai'] = array();
			foreach($ds_loai_cha as $value){
				$child_temp = array();		
				$count_child = 0;
				foreach($ds_loai as $child){
					if($child['ma_loai_cha'] == $value['id']){
						$child_temp[] = $child;
						$count_child = $count_child + 1; 
					}
				} 
				$data['ds_loai'][ $value['id'] ]['detail'] = $value;
				$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
				$data['ds_loai'][ $value['id'] ]['count_child'] = $count_child;
			}
			
			$data['muc_cha'] = 'bai_viet';
			$data['muc_con'] = 'them_bai_viet';
			
			$this->load->view("admin/them_bai_viet", $data);
		}
		public function submit_them_bai_viet(){
			if($this->input->post()){							
				$data = $this->input->post();
				
				if(!isset($data['tieu_de']) && $data['tieu_de']!=""){
					$_SESSION['error'] ="Vui Lòng Nhập Tiêu Đề";
					header("Location: ".site_url('admin/dang_nhap'));
					exit;
				}
				$data['id_nguoi_tao'] = $_SESSION['admin_info']['id'];
				if (isset($_FILES['hinh_dai_dien']))
				{
					if (isset($_FILES['hinh_dai_dien']))
					{	
						$ext_array = explode(".",$_FILES['hinh_dai_dien']['name']);

						$permit_arr = array('png','jpg','gif');
						if(in_array($ext_array[count($ext_array) - 1], $permit_arr)){															
							if ($_FILES['hinh_dai_dien']['error'] == 0){														
								$name = time().$data['id_nguoi_tao'].".".$ext_array[count($ext_array) - 1];
								$result = move_uploaded_file($_FILES['hinh_dai_dien']['tmp_name'], './assets/upload/blog/'.$name);															
								if($result){
									$data['hinh_dai_dien'] = $name;	
								}								
							}
						}
					}					
				}
						
				$data['ngay_tao'] = time();				

				$result = $this->General->insertItem('bai_viet',$data);

				$insert_id = $this->db->insert_id();

				$data_update = array();
				$data_update['page_url'] = mb_strtolower(url_title(removesign($data['tieu_de']))).'-'.$insert_id;
				$this->General->updateItem('bai_viet',$data_update, array('id' => $insert_id));
				if($result){
					$_SESSION['success'] ="Thêm Bài Viết Thành Công";
					header("Location: ".site_url('admin/them_bai_viet'));
					exit;
				}else{
					$_SESSION['error'] = "Thêm Bài Viết Không Thành Công";
					header("Location: ".site_url('admin/them_bai_viet'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Thêm Bài Viết Không Thành Công";
				header("Location: ".site_url('admin/them_bai_viet'));
				exit;
			}
		}
		public function cap_nhat_bai_viet(){			
			$id_bv = $_GET['id_bv'];
			if(isset($id_bv) && $id_bv != ''){
				$data['page_title'] = "Cập Nhật Bài Viết";
				$ds_bv= $this->General->getItemsNoneActiveRecord("select * from bai_viet where id= ".$id_bv);
				
				if(count($ds_bv)== 1){
					$data['ds_bv'] = $ds_bv['0'];
					$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
					$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha=0');
					$data['ds_loai'] = array();
					foreach($ds_loai_cha as $value){
						$child_temp = array();		
						$count_child = 0;
						foreach($ds_loai as $child){
							if($child['ma_loai_cha'] == $value['id']){
								$child_temp[] = $child;
								$count_child = $count_child + 1; 
							}
						} 
						$data['ds_loai'][ $value['id'] ]['detail'] = $value;
						$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
						$data['ds_loai'][ $value['id'] ]['count_child'] = $count_child;
					} 
					
					$this->load->view("admin/cap_nhat_bai_viet",$data);
				}else{
					$_SESSION['error'] ="Không Tồn Tại Bài Viết Nào";
					header("Location: ".site_url('admin/danh_sach_bai_viet'));
				}
			}else{
				$_SESSION['error'] ="Mã Bài Viết".$ds_bv['id']."Không Tồn Tại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}
		}
		public function cap_nhat_trang_thai_bai_viet(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				
				$sql = 'update bai_viet set trang_thai = 1 - trang_thai where id = '.$id;
				
				$result = $this->General->updateNoneActiveRecord($sql);
				if($result){
					$_SESSION['success'] = "Cập nhật thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}else{
					$_SESSION['error'] = "Cập nhật không thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}			
		}
		public function cap_nhat_trang_thai_xoa_bai_viet(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				
				$sql = 'update bai_viet set xoa = 1 - xoa where id = '.$id;
				
				$result = $this->General->updateNoneActiveRecord($sql);
				if($result){
					$_SESSION['success'] = "Cập nhật thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}else{
					$_SESSION['error'] = "Cập nhật không thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}			
		}
		public function submit_cap_nhat_bai_viet(){
			if($this->input->post()){
				$data = $this->input->post();
				
				if($data['id'] == ""){
					$_SESSION['error'] = "ID Bài Viết Không Tồn Tại, Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/cap_nhat_bai_viet?id_bv=').$data['id']);
					exit;
				}
				
				if($data['tieu_de'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Tiêu Đề";
					header("Location: ".site_url('admin/cap_nhat_bai_viet?id_bv=').$data['id']);
					exit;
				}
				
				$data_update = array(
					"id_loai" => $data['id_loai'],
					"tieu_de" =>$data['tieu_de'],
					"noi_dung" =>$data['noi_dung'],
					"ngay_sua" => time(),
					"trang_thai" => $data['trang_thai'],
					"xoa" => $data['xoa'],
					"luot_xem" => $data['luot_xem'],
				);
				
				$data['id_nguoi_tao'] = $_SESSION['admin_info']['id'];
				if (isset($_FILES['hinh_dai_dien']))
				{
					if (isset($_FILES['hinh_dai_dien']))
					{	
						$ext_array = explode(".",$_FILES['hinh_dai_dien']['name']);
						
						$permit_arr = array('png','jpg','gif');
						if(in_array($ext_array[count($ext_array) - 1], $permit_arr)){															
							if ($_FILES['hinh_dai_dien']['error'] == 0){														
								$name = time().$data['id_nguoi_tao'].".".$ext_array[count($ext_array) - 1];
								
								$result = move_uploaded_file($_FILES['hinh_dai_dien']['tmp_name'], './assets/upload/blog/'.$name);															
								if($result){
									$data_update['hinh_dai_dien'] = $name;	
								}								
							}
						}
					}					
				}

				$data_update['page_url'] = mb_strtolower(url_title(removesign($data['tieu_de']))).'-'.$data['id'];

				$result = $this->General->updateItem('bai_viet',$data_update,array("id" => $data['id']));
				if($result){ 
					$_SESSION['success'] ="Cập nhật Bài Viết Thành Công";
					header("Location: ".site_url('admin/cap_nhat_bai_viet?id_bv=').$data['id']);
					exit;
				}else{
					$_SESSION['error'] ="Cập nhật Bài Viết Thất Bại";
					header("Location: ".site_url('admin/cap_nhat_bai_viet?id_bv=').$data['id']);
					exit;
				}
				
			}else{
				$_SESSION['error'] = "Vui Lòng Nhập Đầy Đủ Thông Tin";
				header("Location: ".site_url('admin/cap_nhat_bai_viet?id_bv=').$data['id']);
				exit;
			}
		}
		public function danh_sach_bai_viet(){
			$data['page_title'] = "Danh Sách Bài Viết";
			
			$ten = "";

			 $per_page = LIST_LIMIT;
			 
			 $sql = '';
			 $sql_1 = '';
			 
			 if(isset($_GET['tieu_de']) && isset($_GET['trang_thai'])){
				 
				 $data_tim_kiem['tieu_de'] = $_GET['tieu_de'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];

				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql = "select count(*) as total_bai_viet from bai_viet where tieu_de like '%".$data_tim_kiem['tieu_de']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql = "select count(*) as total_bai_viet from bai_viet where tieu_de like '%".$data_tim_kiem['tieu_de']."%'";
				}
			 }
			 else
			 {
				 $sql = "select count(*) as total_bai_viet from bai_viet";
			 }
	
			 $total_books = $this->General->getItemsNoneActiveRecord($sql);
			 
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['total_bai_viet'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 if(isset($_GET['tieu_de']) && isset($_GET['trang_thai']))
			 {
			 	$config['base_url'] = base_url().'admin/danh_sach_bai_viet?tieu_de='.$_GET['tieu_de'].'&trang_thai='.$_GET['trang_thai'].'&';
			 }
			 else
			 {
				 $config['base_url'] = base_url().'admin/danh_sach_bai_viet?';
			 }
			 $config['uri_segment']	= 1; 

			 $this->pagination->initialize($config); 

			 $data['pagination'] = $this->pagination->create_links();
	
			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 $limit = array('num_record' => $per_page, 'start' => $offset);	
			 
				 
			if(isset($_GET['tieu_de']) && isset($_GET['trang_thai'])){
				 
				 $data_tim_kiem['tieu_de'] = $_GET['tieu_de'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_1 = "select * from bai_viet where tieu_de like '%".$data_tim_kiem['tieu_de']."%' and trang_thai = ".$data_tim_kiem['trang_thai']." order by ngay_tao DESC limit ".$offset.",".$per_page;
				}
				else
				{
					$sql_1 = "select * from bai_viet where tieu_de like '%".$data_tim_kiem['tieu_de']."%' order by ngay_tao DESC limit ".$offset.",".$per_page;
				}
				
				$data['tieu_de_tim_kiem'] = $data_tim_kiem['tieu_de'];
				$data['trang_thai_tim_kiem'] = $data_tim_kiem['trang_thai'];
			}
			else
			{
				$sql_1 = "select * from bai_viet order by ngay_tao DESC limit ".$offset.",".$per_page;
			}


			$danh_sach = $this->General->getItemsNoneActiveRecord($sql_1);
			$data['danh_sach']=$danh_sach;
			
			$danh_sach_loai = $this->General->getItemsNoneActiveRecord("select * from loai");
			$danh_sach_temp = array();
			foreach($danh_sach_loai as $value){
				$danh_sach_temp[ $value['id'] ] = $value['ten_loai'];
			}
			$data['danh_sach_loai'] = $danh_sach_temp;

			$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
			$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha=0');
			$data['ds_loai'] = array();
			foreach($ds_loai_cha as $value){
				$child_temp = array();		
				$count_child = 0;
				foreach($ds_loai as $child){
					if($child['ma_loai_cha'] == $value['id']){
						$child_temp[] = $child;
						$count_child = $count_child + 1; 
					}
				} 
				$data['ds_loai'][ $value['id'] ]['detail'] = $value;
				$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
				$data['ds_loai'][ $value['id'] ]['count_child'] = $count_child;
			} 
			
			$data['muc_cha'] = 'bai_viet';
			$data['muc_con'] = 'danh_sach_bai_viet';

			$this->load->view("admin/danh_sach_bai_viet",$data);
		}
		public function them_loai_bai_viet(){	
			$ds_loai = $this->General->getItemsNoneActiveRecord("select * from loai where ma_loai_cha='0'");
			$data['ds_loai'] = $ds_loai;
			$data['page_title'] = "Thêm Loại Bài Viết";
			
			$data['muc_cha'] = 'loai_bai_viet';
			$data['muc_con'] = 'them_loai_bai_viet';
			
			$this->load->view("admin/them_loai_bai_viet",$data);
		}
		public function submit_them_loai_bai_viet(){
			if(isset($_POST)){
				$data = $_POST;
				$data['ngay_tao'] = time();
				$result = $this->General->insertItem('loai',$data);
				$insert_id = $this->db->insert_id();
				$data = array();
				$data['page_url'] = mb_strtolower(url_title(removesign($data['ten_loai']))).'-'.$insert_id;
				$this->General->updateItem('loai',$data, array('id' => $insert_id));
				if($result){
					$_SESSION['success'] = "Thêm Loại Bài Viết Thành Công !";				
					header("location: ".site_url('admin/them_loai_bai_viet'));
				}else{
					$_SESSION['error'] = "Thêm Loại Bài Viết Không Thành Công";
					header("Location: ".site_url('admin/them_loai_bai_viet'));
				}				
			}else{
				$_SESSION['error'] = "Thêm Loại Bài Viết Không Thành Công";
				header("Location: ".site_url('admin/them_loai_bai_viet'));
			}
		}
		public function xoa_bai_viet(){
			if(isset($_GET['id']) && $_GET['id'] !=""){
				$id = $_GET['id'];
				$result = $this->General->updateItem('bai_viet', array('xoa' => '1'),array('id' => $id));
				if($result){
					$_SESSION['success'] = "Đã Xóa Bài Viết";
					header("Location: ".site_url('admin/danh_sach_bai_viet'));
					exit;
				}else{
					$_SESSION['error'] = "Xóa Bài Viết Không Thành Công";
					header("Location: ".site_url('admin/danh_sach_bai_viet'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Bài Viết Này Đã Bị Xóa Hoặc Không Tồn Tại, Vui Lòng Thử Lại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}			
		}
		public function cap_nhat_loai_bai_viet(){		
			if(isset($_GET['id_loai_bv']) && $_GET['id_loai_bv'] != ''){
				$id_loai_bv = $_GET['id_loai_bv'];
				$data['page_title'] = "Cập Nhật Loại Bài Viết";				
				$ds_loai= $this->General->getItemsNoneActiveRecord("select * from loai where id= ".$id_loai_bv);
				if(count($ds_loai)==1){					
					$data['loai_bv'] = $ds_loai['0'];
					
					$ds_loai_cha = $this->General->getItemsNoneActiveRecord("select * from loai where ma_loai_cha='0'");
					$data['ds_loai_cha'] = $ds_loai_cha;
						
					$this->load->view("admin/cap_nhat_loai_bai_viet",$data);
				}else{
					$_SESSION['error'] ="Mã Loại ".$_GET['id_loai_bv']." Không Tồn Tại";
					header("Location: ".site_url('admin/danh_sach_loai_bai_viet'));
				}
			}
		}
		public function submit_cap_nhat_loai_bai_viet(){
			if($this->input->post()){
				$data = $this->input->post();
				if($data['id'] == ""){
					$_SESSION['error'] = "ID Loại Không Tồn Tại, Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/cap_nhat_loai_bai_viet?id_loai_bv=').$data['id']);
					exit;
				}
				if($data['ten_loai'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Tên Loại";
					header("Location: ".site_url('admin/cap_nhat_loai_bai_viet?id_loai_bv=').$data['id']);
					exit;
				}
				
				$data_update = array(
					"ten_loai" =>$data['ten_loai'],
					"trang_thai" => $data['trang_thai'],
					"xoa" => $data['xoa']
				);
				$data_update['page_url'] = mb_strtolower(url_title(removesign($data['ten_loai']))).'-'.$data['id'];
				$result = $this->General->updateItem('loai',$data_update,array("id" => $data['id']));
				if($result){ 
					$_SESSION['success'] ="Cập nhật Loại Bài Viết Thành Công";
					header("Location: ".site_url('admin/cap_nhat_loai_bai_viet?id_loai_bv=').$data['id']);
					exit;
				}else{
					$_SESSION['error'] ="Cập nhật Loại Bài Viết Thất Bại";
					header("Location: ".site_url('admin/cap_nhat_loai_bai_viet?id_loai_bv=').$data['id']);
					exit;
				}
				
			}else{
				$_SESSION['error'] = "Vui Lòng Nhập Đầy Đủ Thông Tin";
				header("Location: ".site_url('admin/cap_nhat_loai_bai_viet?id_loai_bv=').$data['id']);
				exit;
			}
		}
		public function danh_sach_loai_bai_viet(){
			$id = "";
			$url_segment = "";
			$where = "";
			
			
			
			$where = trim($where,'&&');
			$url_segment = "?".trim($url_segment,'&');
			if($where != ""){
				$sql = "select * from loai where ".$where;
			}else{
				$sql = "select * from loai";
			}

			 $per_page = LIST_LIMIT;
			 
			 $sql_search = '';
			 $sql_search_1 = '';
			 
			 if(isset($_GET['ten_loai']) && isset($_GET['trang_thai'])){
				 
				 $data_tim_kiem['ten_loai'] = $_GET['ten_loai'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];

				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_search = "select count(*) as total_loai from loai where ten_loai like '%".$data_tim_kiem['ten_loai']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql_search = "select count(*) as total_loai from loai where ten_loai like '%".$data_tim_kiem['ten_loai']."%'";
				}
			 }
			 else
			 {
				 $sql_search = "select count(*) as total_loai from loai";
			 }
			 
			

			 $total_books = $this->General->getItemsNoneActiveRecord($sql_search);
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['total_loai'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 if(isset($_GET['ten_loai']) && isset($_GET['trang_thai']))
			 {
			 	$config['base_url'] = base_url().'admin/danh_sach_loai_bai_viet?ten_loai='.$_GET['ten_loai'].'&trang_thai='.$_GET['trang_thai'].'&';
			 }
			 else
			 {
				 $config['base_url'] = base_url().'admin/danh_sach_loai_bai_viet?';
			 }
			 $config['uri_segment']	= 3; 

			 $this->pagination->initialize($config); 

			 $data['pagination'] = $this->pagination->create_links();		

			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 $limit = array('num_record' => $per_page, 'start' => $offset);		 

			$danh_sach_loai = $this->General->getItemsNoneActiveRecord("select * from loai");
			$danh_sach_temp = array('0'=>'Không có');
			foreach($danh_sach_loai as $value){
				$danh_sach_temp[ $value['id'] ] = $value['ten_loai'];
			}
			$data['danh_sach_loai'] = $danh_sach_temp;
			
			if(isset($_GET['ten_loai']) && isset($_GET['trang_thai']))
			{
				 
				 $data_tim_kiem['ten_loai'] = $_GET['ten_loai'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				 
					if($data_tim_kiem['trang_thai'] != 2)
					{
						$sql_search_1 = " where ten_loai like '%".$data_tim_kiem['ten_loai']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
					}
					else
					{
						$sql_search_1 = " where ten_loai like '%".$data_tim_kiem['ten_loai']."%'";
					}
				
				$data['ten_loai_tim_kiem'] = $data_tim_kiem['ten_loai'];
				$data['trang_thai_tim_kiem'] = $data_tim_kiem['trang_thai'];
			 }
			 else
			 {
				 $sql_search_1 = "";
			 }

				
			$danh_sach = $this->General->getItemsNoneActiveRecord($sql.$sql_search_1." limit ".$offset.",".$per_page);
			$data['muc_cha'] = 'loai_bai_viet';
			$data['muc_con'] = 'danh_sach_loai_bai_viet';
			$data['danh_sach'] = $danh_sach;
			$data['page_title'] = "Danh Sách Loại Bài Viết";
			$this->load->view("admin/danh_sach_loai_bai_viet",$data);
		}
		public function xoa_loai_bai_viet(){
			if(isset($_GET['id']) && $_GET['id'] !=""){
				$id = $_GET['id'];
				$res_count_bai_viet = $this->General->getItemsNoneActiveRecord("select count(*) res_count from bai_viet where id_loai= '".$id."' and xoa= '0'");
				if($res_count_bai_viet['0']['res_count'] != 0){
					$_SESSION['error'] = "Đã Có Bài Viết Thuộc Loại Này, Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/danh_sach_loai_bai_viet'));
					exit;
				}
				
				$result = $this->General->updateItem('loai', array('xoa' => '1'),array('id' => $id));
				if($result){
					$_SESSION['success'] = "Đã Xóa Loại Bài Viết";
					header("Location: ".site_url('admin/danh_sach_loai_bai_viet'));
					exit;
				}else{
					$_SESSION['error'] = "Xóa Loại Bài Viết Không Thành Công";
					header("Location: ".site_url('admin/danh_sach_loai_bai_viet'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Bài Viết Này Đã Bị Xóa Hoặc Không Tồn Tại, Vui Lòng Thử Lại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}			
		}
		public function them_quan_tri(){
			$username_admin = $_SESSION['admin_info']['username'];
				
			if($username_admin != 'admin'){
				$_SESSION['error'] = "Chỉ Có Administrator Mới Có thể Sử Dụng Chức Năng Thêm Quản Trị Viên";
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
				exit;
			}
			$data['page_title'] = "Thêm Quản Trị";
			$data['muc_cha'] = 'quan_tri';
			$data['muc_con'] = 'them_quan_tri';
			$this->load->view("admin/them_quan_tri",$data);
		}
		public function submit_them_quan_tri(){
			$id_admin = $_SESSION['admin_info']['id'];
			$username_admin = $_SESSION['admin_info']['username'];
				
			
			if($this->input->post()){
				$data = $this->input->post();
								
				if($data['ten'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Họ Tên";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				if($data['username'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Tên Truy Cập";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				if($data['password'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Mật Khẩu";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				if($data['re_password'] == ""){
					$_SESSION['error'] = "Vui Lòng Nhập Xác Nhận Lại Mật Khẩu";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				if(strlen($data['password']) < 5){
					$_SESSION['error'] = "Vui Lòng Nhập Mật Khẩu Từ 5 Ký Tự Trở Lên";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				if($data['password'] != $data['re_password']){
					$_SESSION['error'] = "Xác Nhận Mật Khẩu Chưa Chính Xác";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				
				
				$result_count = $this->General->getItemsNoneActiveRecord("select count(*) as count_res from quan_tri where username= '".$data['username']."'");
				if($result_count['0']['count_res'] == 1){
					$_SESSION['error'] = "Tên Truy Cập Đã Tồn Tại. Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				
				if (isset($_FILES['hinh_dai_dien']))
				{
					if (isset($_FILES['hinh_dai_dien']))
					{	
						$ext_array = explode(".",$_FILES['hinh_dai_dien']['name']);

						$permit_arr = array('png','jpg','gif');
						if(in_array($ext_array[count($ext_array) - 1], $permit_arr)){															
							if ($_FILES['hinh_dai_dien']['error'] == 0){														
								$name = time().".".$ext_array[count($ext_array) - 1];
								$result = move_uploaded_file($_FILES['hinh_dai_dien']['tmp_name'], './assets/upload/user/'.$name);															
								if($result){
									$data['hinh_dai_dien'] = $name;	
								}								
							}
						}
					}					
				}
				unset($data['re_password']);
				$data['password'] = md5($data['password']);
				$data['ngay_tao'] = time();
				$result = $this->General->insertItem('quan_tri',$data);
				if($result){
					$_SESSION['success'] = 'Thêm Quản Trị Thành Công';
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}else{
					$_SESSION['error'] = 'Thêm Quản Trị Thất Bại';
					header("Location: ".site_url('admin/them_quan_tri'));
					exit;
				}
				
			}else{
				$_SESSION['error'] = "Vui Lòng Nhập Đầy Đủ Thông Tin";
				header("Location: ".site_url('admin/them_quan_tri'));
			}
			
		}
		public function cap_nhat_quan_tri(){
			$username_admin = $_SESSION['admin_info']['username'];
				
			if($username_admin != 'admin'){
				$_SESSION['error'] = "Chỉ Có Administrator Mới Có thể Sử Dụng Chức Năng Cập Nhật Quản Trị Viên";
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
				exit;
			}
		
			$data['page_title'] = "Cập Nhật Quản Trị";
			if(isset($_GET['id_quan_tri']) && $_GET['id_quan_tri'] !=""){
				$id = $_GET['id_quan_tri'];
				$result = $this->General->getItemsNoneActiveRecord('select * from quan_tri where id='.$id);
				if(count($result == 1)){
					$data['quan_tri'] = $result['0'];
					$this->load->view('admin/cap_nhat_quan_tri',$data);
				}else{
					$_SESSION['error'] = 'Quản trị không tồn tại';
					header("Location: ".site_url('admin/danh_sach_quan_tri'));
					exit;
				}
			}else{
				
				$_SESSION['error'] = 'Mã Quản Trị Không Tồn Tại';
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
				exit;
			}
		}
		public function submit_cap_nhat_quan_tri(){ 

			$username_admin = $_SESSION['admin_info']['username'];
				
			if($username_admin != 'admin'){
				$_SESSION['error'] = "Chỉ Có Administrator Mới Có thể Sử Dụng Chức Năng Thêm Quản Trị Viên";
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
				exit;
			}
	
			if($this->input->post()){
				$data = $this->input->post();
				$id = $data['id'];
				$trang_thai = $data['trang_thai'];
				if(!isset($id) && $id == ""){
					$_SESSION['error'] = 'Không Tồn Tại ID Quản Trị';
					header("Location: ".site_url('admin/cap_nhat_quan_tri?id_quan_tri=').$id);
					exit;
				}
				if(!isset($trang_thai) && $trang_thai == ""){
					$_SESSION['error'] = 'Vui Lòng Chọn Trạng Thái';
					header("Location: ".site_url('admin/cap_nhat_quan_tri?id_quan_tri=').$id);
					exit;
				}
				if(!isset($data['gioi_thieu']) && $data['gioi_thieu'] == ""){
					$_SESSION['error'] = 'Vui Lòng nhập giới thiệu';
					header("Location: ".site_url('admin/cap_nhat_quan_tri?id_quan_tri=').$id);
					exit;
				}
				$data_update = array(				
					"trang_thai" => $trang_thai,
					"gioi_thieu" => $data['gioi_thieu']
				);
				$result = $this->General->updateItem('quan_tri', $data_update,array("id" => $data['id']));
				if($result){
					$_SESSION['success'] = 'Cập Nhật Quản Trị Thành Công';
					header("Location: ".site_url('admin/cap_nhat_quan_tri?id_quan_tri=').$data['id']);
					exit;
				}else{
					$_SESSION['error'] = 'Cập Nhật Quản Trị Thất Bại';
					header("Location: ".site_url('admin/cap_nhat_quan_tri?id_quan_tri=').$data['id']);
					exit;
				}
				
			}else{
				$_SESSION['error'] = 'Lỗi, Không Tồn Tại Dữ Liệu';
				header("Location: ".site_url('admin/cap_nhat_quan_tri'));
				exit;
			}
		}
		public function danh_sach_quan_tri(){
			$data['page_title'] = "Danh Sách Quản Trị";
			
			$where ="";
			$ten = "";


			if($where != ""){
				$sql = "select * from quan_tri where ".$where;
			}else{
				$sql = "select * from quan_tri";
			}

			 $per_page = LIST_LIMIT;
			 $sql_search = '';
			 $sql_search_1 = '';
			 
			 if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			{
				 
				 $data_tim_kiem['ten'] = $_GET['ten'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_search = "select count(*) as total_quan_tri from quan_tri where ten like '%".$data_tim_kiem['ten']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql_search = "select count(*) as total_quan_tri from quan_tri where ten like '%".$data_tim_kiem['ten']."%'";
				}
			 }
			 else
			 {
				 $sql_search = "select count(*) as total_quan_tri from quan_tri";
			 }
				
			 $total_books = $this->General->getItemsNoneActiveRecord($sql_search);
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['total_quan_tri'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			 {
			 	$config['base_url'] = base_url().'admin/danh_sach_quan_tri?ten='.$_GET['ten'].'&trang_thai='.$_GET['trang_thai'].'&';
			 }
			 else
			 {
				 $config['base_url'] = base_url().'admin/danh_sach_quan_tri?';
			 }
			 $config['uri_segment']	= 3; 
			
			 $this->pagination->initialize($config); 
			
			 $data['pagination'] = $this->pagination->create_links();		
				
			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 $limit = array('num_record' => $per_page, 'start' => $offset);	
			 
			 if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			{
				 
				 $data_tim_kiem['ten'] = $_GET['ten'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_search_1 = " where ten like '%".$data_tim_kiem['ten']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql_search_1 = " where  ten like '%".$data_tim_kiem['ten']."%'";
				}
				
				$data['ten_tim_kiem'] = $data_tim_kiem['ten'];
				$data['trang_thai_tim_kiem'] = $data_tim_kiem['trang_thai'];
			 }
			 else
			 {
				 $sql_search_1 = "";
			 }	 

			$danh_sach = $this->General->getItemsNoneActiveRecord($sql.$sql_search_1." limit ".$offset.",".$per_page);
			$data['ds_quan_tri'] = $danh_sach;
			$data['muc_cha'] = 'quan_tri';
			$data['muc_con'] = 'danh_sach_quan_tri';
			$this->load->view("admin/danh_sach_quan_tri",$data);
		}
		public function cap_nhat_thong_tin_quan_tri(){
			$data['page_title'] = "Cập Nhật Thông Tin Quản Trị";
			$id = $_GET['id_quan_tri'];
			if(isset($id) && $id !=""){
				$result = $this->General->getItemsNoneActiveRecord("select * from quan_tri where id= '".$id."'");
				$data['admin_info'] = $result['0'];					
				
				$this->load->view("admin/cap_nhat_thong_tin_quan_tri",$data);
			}else{
				$_SESSION['error'] = 'Không Tồn Tại ID Quản Trị';
				header("Location: ".site_url('admin/dang_nhap'));
				exit;
			}
		}
		public function xoa_quan_tri(){
		
			$username_admin = $_SESSION['admin_info']['username'];
			
			if($username_admin != 'admin'){
				$_SESSION['error'] = "Chỉ Có Administrator Mới Có thể Sử Dụng Chức Năng Này";
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
				exit;
			}
			
			if(isset($_GET['id']) && $_GET['id'] !=""){
				$id = $_GET['id'];
				$kt_admin = $this->General->getItemsNoneActiveRecord('select * from quan_tri where id= '.$id);
				
				if($kt_admin['0']['username'] == $username_admin){
					$_SESSION['error'] = "Đây là Tài Khoản Bạn Đang Sử Dụng, Vui Lòng Thử Lại";
					header("Location: ".site_url('admin/danh_sach_quan_tri'));
					exit;
				}
			
				$result = $this->General->deleteItem('quan_tri',array('id' => $id));
				if($result){
					$_SESSION['success'] = "Đã Xóa Quản Trị";
					header("Location: ".site_url('admin/danh_sach_quan_tri'));
					exit;
				}else{
					$_SESSION['error'] = "Xóa Quản Trị Không Thành Công";
					header("Location: ".site_url('admin/danh_sach_quan_tri'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Quản Trị Viên Này Đã Bị Xóa Hoặc Không Tồn Tại, Vui Lòng Thử Lại";
				header("Location: ".site_url('admin/danh_sach_quan_tri'));
			}			
		}
		public function submit_cap_nhat_thong_tin_quan_tri(){
			$data = $this->input->post();

			if(!empty($data['id']))
			{	
				if (isset($_FILES['hinh_dai_dien']))
				{
					if (isset($_FILES['hinh_dai_dien']))
					{	
						$ext_array = explode(".",$_FILES['hinh_dai_dien']['name']);

						$permit_arr = array('png','jpg','gif');
						if(in_array($ext_array[count($ext_array) - 1], $permit_arr)){															
							if ($_FILES['hinh_dai_dien']['error'] == 0){														
								$name = time().".".$ext_array[count($ext_array) - 1];
								$result = move_uploaded_file($_FILES['hinh_dai_dien']['tmp_name'], './assets/upload/user/'.$name);															
								if($result){
									$data['hinh_dai_dien'] = $name;	
									$_SESSION['admin_info']['hinh_dai_dien'] = $data['hinh_dai_dien'];
								}								
							}
						}
					}					
				}
					
					
				if(!empty($data['password']))
				{
					if($data['password'] != $data['re_password'])
					{
						$_SESSION['error'] = 'Xác Nhận Lại Mật Khẩu Chưa Chính Xác';
						header("Location: ".site_url('admin/cap_nhat_thong_tin_quan_tri?id_quan_tri=').$data['id']);
						exit;
					}
					
					$data['password'] = md5($data['password']);
					unset($data['re_password']);
				}
				else
				{
					unset($data['re_password']);
					unset($data['password']);
				}

				if(empty($data['gioi_thieu'])){
					$_SESSION['error'] = 'Vui lòng điền giới thiệu quản trị';
					header("Location: ".site_url('admin/cap_nhat_thong_tin_quan_tri?id_quan_tri=').$data['id']);
					exit;
				}
				
				$result = $this->General->updateItem('quan_tri', $data, array('id' => $data['id']));
				$_SESSION['success'] = 'Cập nhật Thành Công';
				header("Location: ".site_url('admin/cap_nhat_thong_tin_quan_tri?id_quan_tri=').$data['id']);	
				exit;
			}
			else{
				$_SESSION['error'] = 'Không Tồn Tại ID Quản Trị';
				header("Location: ".site_url('admin/cap_nhat_thong_tin_quan_tri'));
				exit;
			}												
			$this->load->view("admin/cap_nhat_thong_tin_quan_tri");
		}
		
		public function banner(){
			
			$result = $this->General->getItemsNoneActiveRecord('select banner from cau_hinh where id = 1');
			$data['banner'] = $result[0]['banner'];
			$data['page_title'] = "Banner";
			$data['muc_cha'] = 'cau_hinh';
			$data['muc_con'] = 'banner';
			$this->load->view('admin/banner',$data);
		}
		
		public function slider(){
			$result = $this->General->getItemsNoneActiveRecord('select * from slider');
			
			$data['danh_sach'] = $result;
			$data['page_title'] = "Slider";
			$data['muc_cha'] = 'cau_hinh';
			$data['muc_con'] = 'slider';
			$this->load->view('admin/slider',$data);
		}
		public function seo(){
			$result = $this->General->getItemsNoneActiveRecord('select title,description,keywords,favicon,adsence,google_anlytics,appid from cau_hinh where id = 1');
			
			$data = $result[0];
			$data['page_title'] = "SEO";
			$data['muc_cha'] = 'cau_hinh';
			$data['muc_con'] = 'seo';
			$this->load->view('admin/seo',$data);
		}
		public function submit_seo(){
			
			if($this->input->post())
			{
			
				$data = $this->input->post();
				
				if (isset($_FILES['favicon']))
				{
					$ext_array = explode(".",$_FILES['favicon']['name']);

					$permit_arr = array('png','jpg','ico');
					if(in_array($ext_array[count($ext_array) - 1], $permit_arr))
					{															
						if ($_FILES['favicon']['error'] == 0)
						{														
							$name = "favicon.".$ext_array[count($ext_array) - 1];
							$result = move_uploaded_file($_FILES['favicon']['tmp_name'], './assets/upload/favicon/'.$name);															
							if($result)
							{
								$data['favicon'] = $name;
							}								
						}
					}
				}
				
				$result = $this->General->updateItem('cau_hinh', $data, array('id' => '1'));	
				if($result){
					$_SESSION['success'] = 'Cập nhật thành công';
					header("Location: ".site_url('admin/seo'));
					exit;
				}else{
					$_SESSION['error'] = 'Cập nhật không thành công';
					header("Location: ".site_url('admin/seo'));
					exit;
				}
			}
		}
		public function submit_banner(){
			
				if (isset($_FILES['file']))
				{
					$ext_array = explode(".",$_FILES['file']['name']);

					$permit_arr = array('png','jpg','gif');
					if(in_array($ext_array[count($ext_array) - 1], $permit_arr))
					{															
						if ($_FILES['file']['error'] == 0)
						{														
							$name = time().".".$ext_array[count($ext_array) - 1];
							$result = move_uploaded_file($_FILES['file']['tmp_name'], './assets/upload/banner/'.$name);															
							if($result)
							{
								$data['banner'] = $name;
								$result = $this->General->getItemsNoneActiveRecord('select banner from cau_hinh where id = 1');
								$data_old['banner'] = $result[0]['banner'];	
								if (!empty($data_old['banner']))
								{
									unlink('./assets/upload/banner/'.$data_old['banner']);
								}

								$result = $this->General->updateItem('cau_hinh', $data, array('id' => '1'));
								if($result){
									$_SESSION['success'] = 'Cập nhật thành công';
									header("Location: ".site_url('admin/banner'));
									exit;
								}else{
									$_SESSION['error'] = 'Cập nhật không thành công';
									header("Location: ".site_url('admin/banner'));
									exit;
								}
							}								
						}
					}
				}
		
		}
		public function slug($str){
			$str = strtolower(trim($str));
			$str = preg_replace('/[^a-z0-9-]/', '-', $str);
			$str = preg_replace('/-+/', "-", $str);
			return $str;
		}
		public function xoa_slider(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				$result = $this->General->deleteItem('slider',array('id' => $id));
				if($result){
					$_SESSION['success'] = "Xóa thành công";
					header("Location: ".site_url('admin/slider'));
					exit;
				}else{
					$_SESSION['error'] = "Xóa không thành công";
					header("Location: ".site_url('admin/slider'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/danh_sach_bai_viet'));
			}			
		}
		
		public function cap_nhat_trang_thai_slider(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				
				$sql = 'update slider set trang_thai = 1 - trang_thai where id = '.$id;
				
				$result = $this->General->updateNoneActiveRecord($sql);
				if($result){
					$_SESSION['success'] = "Cập nhật thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}else{
					$_SESSION['error'] = "Cập nhật không thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/slider'));
			}			
		}
		
		public function danh_sach_binh_luan(){
			$data['page_title'] = "Danh Sách Bình Luận";
			
			$where ="";
			$ten = "";
			
			if($where != ""){
				$sql = "select * from binh_luan where ".$where;
			}else{
				$sql = "select * from binh_luan";
			}
			
	
			 $per_page = LIST_LIMIT;
			 $sql_search = '';
			 $sql_search_1 = '';
			 
			if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			{
				 
				 $data_tim_kiem['ten'] = $_GET['ten'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_search = "select count(*) as total_quan_tri from binh_luan where ten like '%".$data_tim_kiem['ten']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql_search = "select count(*) as total_quan_tri from binh_luan where ten like '%".$data_tim_kiem['ten']."%'";
				}
			 }
			 else
			 {
				 $sql_search = "select count(*) as total_quan_tri from binh_luan";
			 }
				
			 $total_books = $this->General->getItemsNoneActiveRecord($sql_search);
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['total_quan_tri'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			 {
			 	$config['base_url'] = base_url().'admin/danh_sach_binh_luan?ten='.$_GET['ten'].'&trang_thai='.$_GET['trang_thai'].'&';
			 }
			 else
			 {
				 $config['base_url'] = base_url().'admin/danh_sach_binh_luan?';
			 }
			 $config['uri_segment']	= 3; 
			
			 $this->pagination->initialize($config); 
			
			 $data['pagination'] = $this->pagination->create_links();		
				
			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 $limit = array('num_record' => $per_page, 'start' => $offset);	
			 
			if(isset($_GET['ten']) && isset($_GET['trang_thai']))
			{
				 
				 $data_tim_kiem['ten'] = $_GET['ten'];
				 $data_tim_kiem['trang_thai'] = $_GET['trang_thai'];
				if($data_tim_kiem['trang_thai'] != 2)
				{
					$sql_search_1 = " where ten like '%".$data_tim_kiem['ten']."%' and trang_thai = ".$data_tim_kiem['trang_thai']."";
				}
				else
				{
					$sql_search_1 = " where  ten like '%".$data_tim_kiem['ten']."%'";
				}
				
				$data['ten_tim_kiem'] = $data_tim_kiem['ten'];
				$data['trang_thai_tim_kiem'] = $data_tim_kiem['trang_thai'];
			 }
			 else
			 {
				 $sql_search_1 = "";
			 }	 

			$danh_sach = $this->General->getItemsNoneActiveRecord($sql.$sql_search_1." limit ".$offset.",".$per_page);
			$data['danh_sach'] = $danh_sach;
			$data['muc_cha'] = 'binh_luan';
			$data['muc_con'] = 'danh_sach_binh_luan';
			$this->load->view("admin/danh_sach_binh_luan",$data);
		}
		
		public function cap_nhat_trang_thai_binh_luan(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				
				$sql = 'update binh_luan set trang_thai = 1 - trang_thai where id = '.$id;
				
				$result = $this->General->updateNoneActiveRecord($sql);
				if($result){
					$_SESSION['success'] = "Cập nhật thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}else{
					$_SESSION['error'] = "Cập nhật không thành công";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/danh_sach_binh_luan'));
			}			
		}
		
		public function xoa_binh_luan(){
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				$result = $this->General->deleteItem('binh_luan',array('id' => $id));
				if($result){
					$_SESSION['success'] = "Xóa thành công";
					header("Location: ".site_url('admin/danh_sach_binh_luan'));
					exit;
				}else{
					$_SESSION['error'] = "Xóa không thành công";
					header("Location: ".site_url('admin/danh_sach_binh_luan'));
					exit;
				}
			}else{
				$_SESSION['error'] = "Slider này đã bị xóa, vui lòng thử lại";
				header("Location: ".site_url('admin/danh_sach_binh_luan'));
			}			
		}
		
		public function submit_slider(){
			
				if (isset($_FILES['file']))
				{
					$ext_array = explode(".",$_FILES['file']['name']);

					$permit_arr = array('png','jpg','gif');
					if(in_array($ext_array[count($ext_array) - 1], $permit_arr))
					{															
						if ($_FILES['file']['error'] == 0)
						{														
							$name = time().".".$ext_array[count($ext_array) - 1];
							$result = move_uploaded_file($_FILES['file']['tmp_name'], './assets/upload/slider/'.$name);															
							if($result)
							{
								
								$data = $this->input->post();
								$data['image_name'] = $name;
								$data['ngay_tao'] = time();
								$data['trang_thai'] = 1;	
								
								
								
								$result = $this->General->insertItem('slider',$data);
								if($result){
									$_SESSION['success'] = 'Thêm thành công';
									header("Location: ".site_url('admin/slider'));
									exit;
								}else{
									$_SESSION['error'] = 'Thêm không thành công';
									header("Location: ".site_url('admin/slider'));
									exit;
								}
							}								
						}
					}
					else{
									$_SESSION['error'] = 'Thêm không thành công';
									header("Location: ".site_url('admin/slider'));
									exit;
								}
				}
		
		}
	}
	
?>