<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}
	
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			
			
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			
			$buttons = array('view profile' => 'profile','view preferences'=>'preferences');
			
			$data['buttons'] = $buttons;
			$this->load->view('header');
			$this->load->view('topmenu');
			$this->load->view('headerbar',$data);
			$this->load->view('welcome', $data);
			$this->load->view('footer');
			
		}
		
		
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */