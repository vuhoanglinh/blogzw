<?php
session_start();
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('General');
	}
	public function index(){
		/*PAGINATION*/
		 // pagination		
		 $per_page = LIST_LIMIT;
		 //$total_books = $this->Pagination_model->getTotal($table_name);		
		 $total_books = $this->General->getItemsNoneActiveRecord('SELECT count(*) as count_bv FROM bai_viet, quan_tri WHERE bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao');
		 $this->load->library('pagination');
		 $config['total_rows'] = $total_books['0']['count_bv'];
		 $config['per_page'] = $per_page;
		 $config['next_link'] = '';
		 $config['prev_link'] = '';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['num_links']	= 5;
		 $config['cur_tag_open'] = '<li class="active"><a>';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['page_query_string'] = TRUE;
		 $config['base_url'] = base_url().'home?';
		 $config['uri_segment']	= 3; 
		 # Khởi tạo phân trang 
		 $this->pagination->initialize($config); 
		 # Tạo link phân trang 
		 $data['pagination'] = $this->pagination->create_links();		
		 //$offset = ($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);		
		 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
		 //$limit = array('num_record' => $per_page, 'start' => $offset);		 
		/*End PAGINATION*/
		
		$ds_bv = $this->General->getItemsNoneActiveRecord('select bai_viet.id, bai_viet.hinh_dai_dien, bai_viet.page_url, bai_viet.tieu_de, quan_tri.ten, bai_viet.noi_dung, bai_viet.ngay_tao, bai_viet.trang_thai, bai_viet.xoa, bai_viet.luot_xem, bai_viet.id_binh_luan from bai_viet, quan_tri where bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao LIMIT '.$offset.','. $per_page);
		$data['max_page'] = ceil($total_books['0']['count_bv']/$per_page);
		$data['curr_page'] = ceil( $offset/$per_page) + 1;
		$data['danh_sach'] = $ds_bv;
		
		foreach($data['danh_sach'] as $key => $item){
			$count = $this->General->getItemsNoneActiveRecord('SELECT count(*) as sl FROM binh_luan WHERE trang_thai = 1 && id_bai_viet = '.$item['id']);
			$data['danh_sach'][$key]['count_comment'] = $count['0']['sl'];
		}
			
		
		$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
		$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha = 0 && trang_thai = 1');
			$data['ds_loai'] = array();
			foreach($ds_loai_cha as $value){
				$child_temp = array();
				$total_post = 0;
				foreach($ds_loai as $child){
					if($child['ma_loai_cha'] == $value['id']){
						$child_temp[] = $child;
						$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where trang_thai = 1 && id_loai='.$child['id']);
						$total_post = $total_post + $total['0']['total'];
					}
				} 
				$data['ds_loai'][ $value['id'] ]['detail'] = $value;
				$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
				$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where id_loai='.$value['id']);
				$total_post = $total_post + $total['0']['total'];
				$data['ds_loai'][ $value['id'] ]['total_post'] = $total_post;
			}
		//General
		$data['cau_hinh'] = $this->General->getItemsNoneActiveRecord('select * from cau_hinh');
		$data['slider'] = $this->General->getItemsNoneActiveRecord('select * from slider where trang_thai = 1 order by ngay_tao ASC');
		$data['page_title'] = "Home | Blog ZoomWorld";
		$this->load->view('home/index',$data);		
	}
	
	public function blog($alias = '', $id_blog){
		if(isset($id_blog) && $id_blog !=""){
			$ds_bv = $this->General->getItemsNoneActiveRecord('select bai_viet.page_url, bai_viet.id_nguoi_tao, bai_viet.id, bai_viet.id_loai, bai_viet.hinh_dai_dien, bai_viet.tieu_de, quan_tri.ten, bai_viet.noi_dung, bai_viet.ngay_tao, bai_viet.trang_thai, bai_viet.xoa, bai_viet.luot_xem, bai_viet.id_binh_luan from bai_viet, quan_tri where bai_viet.id = '.$id_blog.' && bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao order by ngay_tao DESC');
			if(count($ds_bv) == 1){
				$data['bai_viet'] = $ds_bv;
			
				$data['related'] = $this->General->getItemsNoneActiveRecord('select * from bai_viet where id_loai = '.$ds_bv['0']['id_loai'].' and id != '.$id_blog.' order by rand() limit 0,4');
				$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
				$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha = 0 && trang_thai = 1');
				$data['ds_loai'] = array();
				foreach($ds_loai_cha as $value){
					$child_temp = array();
					$total_post = 0;
					foreach($ds_loai as $child){
						if($child['ma_loai_cha'] == $value['id']){
							$child_temp[] = $child;
							$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where trang_thai = 1 && id_loai='.$child['id']);
							$total_post = $total_post + $total['0']['total'];
						}
					} 
					$data['ds_loai'][ $value['id'] ]['detail'] = $value;
					$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
					$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where id_loai='.$value['id']);
					$total_post = $total_post + $total['0']['total'];
					$data['ds_loai'][ $value['id'] ]['total_post'] = $total_post;
				}
				$data['cau_hinh'] = $this->General->getItemsNoneActiveRecord("Select * from cau_hinh");
				
				//load comment
				$data['ds_comment'] = $this->General->getItemsNoneActiveRecord('SELECT * FROM binh_luan WHERE id_bai_viet = '.$ds_bv['0']['id'].' && trang_thai = 1 order by ngay_tao DESC');
				$data['count_cmt'] = count($data['ds_comment']);
				$data['cau_hinh'] = $this->General->getItemsNoneActiveRecord('select * from cau_hinh');
				$data['page_title'] = $ds_bv['0']['tieu_de']." | Blog ZoomWorld";
				$data['author'] = $this->General->getItemsNoneActiveRecord('select * from quan_tri where id = '.$ds_bv['0']['id_nguoi_tao']);
				
				$this->load->view('home/blog_detail', $data);
			}else{
				$_SESSION['error'] = "Bài viết không tồn tại";
				header("Location: ".site_url());
				exit;
			}								
		}else{			
			$_SESSION['error'] = "Bài viết không tồn tại";
			header("Location: ".site_url());
			exit;
		}
	}
	public function loai($alias = '', $id_loai){ 	
		if(isset($id_loai) && $id_loai !=""){
			/*PAGINATION*/
			 // pagination		
			 $per_page = LIST_LIMIT;
			 //$total_books = $this->Pagination_model->getTotal($table_name);		
			 $total_books = $this->General->getItemsNoneActiveRecord('SELECT count(*) as count_bv FROM bai_viet, quan_tri WHERE bai_viet.id_loai = '.$id_loai.' && bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao');
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['count_bv'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 $config['base_url'] = base_url().'loai/'.$alias.'-'.$id_loai.'?';
			 $config['uri_segment']	= 3; 
			 # Khởi tạo phân trang 
			 $this->pagination->initialize($config); 
			 # Tạo link phân trang 
			 $data['pagination'] = $this->pagination->create_links();		
			 //$offset = ($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);		
			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 //$limit = array('num_record' => $per_page, 'start' => $offset);		 
			/*End PAGINATION*/
			
			$ds_bv = $this->General->getItemsNoneActiveRecord('SELECT bai_viet.page_url,  bai_viet.hinh_dai_dien, bai_viet.id, bai_viet.tieu_de, quan_tri.ten, bai_viet.noi_dung, bai_viet.ngay_tao, bai_viet.trang_thai, bai_viet.xoa, bai_viet.luot_xem, bai_viet.id_binh_luan FROM bai_viet, quan_tri WHERE bai_viet.id_loai = '.$id_loai.' && bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao order by ngay_tao DESC LIMIT '.$offset.','.$per_page);			
			$data['danh_sach'] = $ds_bv;
			
			$data['max_page'] = ceil($total_books['0']['count_bv']/$per_page);
			$data['curr_page'] =  ( $offset/$per_page) + 1;
			
			foreach($data['danh_sach'] as $key => $item){
				$count = $this->General->getItemsNoneActiveRecord('SELECT count(*) as sl FROM binh_luan WHERE trang_thai = 1 && id_bai_viet = '.$item['id']);
				$data['danh_sach'][$key]['count_comment'] = $count['0']['sl'];
			}
			
			
			$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
			$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha = 0 && trang_thai = 1');
				$data['ds_loai'] = array();
				foreach($ds_loai_cha as $value){
					$child_temp = array();
					$total_post = 0;
					foreach($ds_loai as $child){
						if($child['ma_loai_cha'] == $value['id']){
							$child_temp[] = $child;
							$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where trang_thai = 1 && id_loai='.$child['id']);
							$total_post = $total_post + $total['0']['total'];
						}
					} 
					$data['ds_loai'][ $value['id'] ]['detail'] = $value;
					$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
					$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where id_loai='.$value['id']);
					$total_post = $total_post + $total['0']['total'];
					$data['ds_loai'][ $value['id'] ]['total_post'] = $total_post;
				}
			$data['cau_hinh'] = $this->General->getItemsNoneActiveRecord('select * from cau_hinh');
			$data['slider'] = $this->General->getItemsNoneActiveRecord('select * from slider where trang_thai = 1 order by ngay_tao ASC');	
			$ten_loai = $this->General->getItemsNoneActiveRecord('select ten_loai from loai where id ='.$id_loai);
			$data['page_title'] = $ten_loai['0']['ten_loai']." | Blog ZoomWorld";
			$this->load->view('home/index',$data);
		}else{
			header("Location: ".site_url());
			exit;
		}
		
	}
	
		public function search(){
		if(!empty($_GET['tu_khoa'])){
			/*PAGINATION*/
			 // pagination		
			 $per_page = LIST_LIMIT;
			 //$total_books = $this->Pagination_model->getTotal($table_name);		
			 $total_books = $this->General->getItemsNoneActiveRecord('SELECT count(*) as count_bv FROM bai_viet, quan_tri WHERE bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao && tieu_de like "%'.$_GET['tu_khoa'].'%"');
			 $this->load->library('pagination');
			 $config['total_rows'] = $total_books['0']['count_bv'];
			 $config['per_page'] = $per_page;
			 $config['next_link'] = '';
			 $config['prev_link'] = '';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['num_links']	= 5;
			 $config['cur_tag_open'] = '<li class="active"><a>';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['page_query_string'] = TRUE;
			 $config['base_url'] = base_url().'search?tu_khoa='.$_GET['tu_khoa'];
			 $config['uri_segment']	= 3; 
			 # Khởi tạo phân trang 
			 $this->pagination->initialize($config); 
			 # Tạo link phân trang 
			 $data['pagination'] = $this->pagination->create_links();		
			 //$offset = ($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);		
			 $offset = ($this->input->get('per_page')=='') ? 0 : $this->input->get('per_page');
			 //$limit = array('num_record' => $per_page, 'start' => $offset);		 
			/*End PAGINATION*/
			
			$ds_bv = $this->General->getItemsNoneActiveRecord('select bai_viet.id, bai_viet.hinh_dai_dien, bai_viet.page_url, bai_viet.tieu_de, quan_tri.ten, bai_viet.noi_dung, bai_viet.ngay_tao, bai_viet.trang_thai, bai_viet.xoa, bai_viet.luot_xem, bai_viet.id_binh_luan from bai_viet, quan_tri where bai_viet.xoa = 0 && bai_viet.trang_thai = 1 && quan_tri.id = bai_viet.id_nguoi_tao && tieu_de like "%'.$_GET['tu_khoa'].'%" LIMIT '.$offset.','. $per_page);
			if(count($ds_bv) == 0){
				$_SESSION['error'] = 'Không có bài viết nào với từ khóa "'.$_GET['tu_khoa'].'"';		
				header('Location: '.site_url());
				exit;
			}
			
			$data['max_page'] = ceil($total_books['0']['count_bv']/$per_page);
			$data['curr_page'] = ceil( $offset/$per_page) + 1;
			$data['danh_sach'] = $ds_bv;
			
			foreach($data['danh_sach'] as $key => $item){
				$count = $this->General->getItemsNoneActiveRecord('SELECT count(*) as sl FROM binh_luan WHERE trang_thai = 1 && id_bai_viet = '.$item['id']);
				$data['danh_sach'][$key]['count_comment'] = $count['0']['sl'];
			}
				
			
			$ds_loai = $this->General->getItemsNoneActiveRecord('select * from loai');
			$ds_loai_cha = $this->General->getItemsNoneActiveRecord('select * from loai where ma_loai_cha = 0 && trang_thai = 1');
				$data['ds_loai'] = array();
				foreach($ds_loai_cha as $value){
					$child_temp = array();
					$total_post = 0;
					foreach($ds_loai as $child){
						if($child['ma_loai_cha'] == $value['id']){
							$child_temp[] = $child;
							$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where trang_thai = 1 && id_loai='.$child['id']);
							$total_post = $total_post + $total['0']['total'];
						}
					} 
					$data['ds_loai'][ $value['id'] ]['detail'] = $value;
					$data['ds_loai'][ $value['id'] ]['child'] = $child_temp;
					$total = $this->General->getItemsNoneActiveRecord('select count(*) as total from bai_viet where id_loai='.$value['id']);
					$total_post = $total_post + $total['0']['total'];
					$data['ds_loai'][ $value['id'] ]['total_post'] = $total_post;
				}
			//General
			$data['cau_hinh'] = $this->General->getItemsNoneActiveRecord('select * from cau_hinh');
			$data['slider'] = $this->General->getItemsNoneActiveRecord('select * from slider where trang_thai = 1 order by ngay_tao ASC');
			$data['page_title'] = "Home | Blog ZoomWorld";
			$this->load->view('home/index',$data);		
		} else {			
			header('Location: '.site_url());
			exit;
		}
	}
	
	
	
	//Đăng comment
	function leave_comment(){		
		if($this->input->post()){
			$data = $this->input->post();
			$ref_url = site_url();
			if($data['url_ref'] != ''){		
				$ref_url = $data['url_ref'];
			}
			if($data['id_bai_viet'] == ''){				
				header("Location: ".$ref_url);
				exit;
			}
			if($data['ten'] == ''){
				$_SESSION['error'] = "Vui lòng nhập tên";
				header("Location: ".$ref_url);
				exit;
			}
			if($data['email'] == ''){
				$_SESSION['error'] = "Vui lòng nhập email";
				header("Location: ".$ref_url);
				exit;
			}
			if($data['comment'] == ''){
				$_SESSION['error'] = "Vui lòng nhập nội dung bình luận";
				header("Location: ".$ref_url);
				exit;
			}
			/*echo "<pre>";
			print_r($data);			
			exit;*/			
			$data_insert = array(
				'id_bai_viet' => $data['id_bai_viet'],
				'ten' => $data['ten'],
				'email' => $data['email'], 
				'website' => $data['website'],
				'title' => $data['title'],
				'noi_dung' => $data['comment'],
				'ngay_tao' => time()
			);
			$result = $this->General->insertItem('binh_luan', $data_insert);
			//nhớ đá về trang bài viết - ko phải trang chính
			if($result){
				$_SESSION['success'] = "Bình luận của bạn đã được gửi. Bình luận sẽ được duyệt trước khi hiển thị";
				header("Location: ".$ref_url);
				exit;
			}else{
				$_SESSION['error'] = "Đăng bình luận thất bại";
				header("Location: ".$ref_url);
				exit;
			}
		}else{	
			$_SESSION['error'] = "Vui lòng điền đầy đủ thông tin";		
			header("Location: ".site_url());
			exit;
		}
	}
}
?>