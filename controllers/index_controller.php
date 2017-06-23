<?php
class Index_Controller extends Controller{

	public function __construct() {
		parent::__construct();
		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',isset($_SESSION['nama'])?$_SESSION['nama']:'');
		$header->Assign('tabmenu','beranda');
		$this->Assign('header',$header->Render('header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('footer',false));

		$side_banner = !isset($_SESSION['id'])?['login-seleksi','login-member']:['members_list'];
		$module_sidebanner = new Module($side_banner);
		$this->Assign('side_banner',$module_sidebanner->Render());
		$module_left = new Module(['karir-side','links-side']);
		$this->Assign('module_left',$module_left->Render());
		$module_right = new Module(['populer','forum-side']);
		$this->Assign('module_right',$module_right->Render());
		$module_banner = new Module(['banner']);
		$this->Assign('module_banner',$module_banner->Render());
		$module_main = new Module(['artikel-terbaru']);
		$this->Assign('module_main',$module_main->Render());
	}

	public function index() {
		$this->Load_View('index');
	}

	public function about($data) {
		$this->Load_View('about');
		$this->Assign('heading','Tentang ' . APP_NAME);
		$this->Assign('content',' Donec id ....');
	}

}