<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class MY_Controller extends MX_Controller {



	public $assets_ = array(

		'login' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'login1' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'register' => array(

			'css' => array(),

			'js' => array(),

		),

		'home' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'create_payroll' => array(
			'css' => array('style.css'),
			'js' => array('script.js'),
		),

		'pdf_page' => array(
			'css' => array('style.css'),
			'js' => array('script.js'),
		),

		'profile' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'home1' => array(

			'css' => array(),

			'js' => array(),

		),		

		'ceo_dashboard' => array(

			'css' => array(),

			'js' => array(),

		),	

		'ceo_sales' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),	



		// Maintenance account

		'maintenance_dashboard' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'maintenance_sales' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		),

		'maintenance_clients' => array(

			'css' => array('style.css'),

			'js' => array('script.js'),

		)

	);



	public function __construct(){

		$route = $this->router->fetch_class();

		// if($route == 'login'){

		// 	if($this->session->has_userdata('logged_in')){

		// 		redirect(base_url());

		// 	}

		// } else {

		// 	if(!$this->session->has_userdata('logged_in')){

		// 		redirect(base_url('login'));

		// 	}

		// }

	}



	public function load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/head',$data);

      	$this->load->view('includes/navigation',$data);

      	$this->load->view($page,$data);

		  (!empty($data['modals']) && $data['modals'] == true)? $this->load->view('modals',$data) : '' ;

      	$this->load->view('includes/footer',$data);

    }



	public function maintenance_load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/maintenance_head',$data);

      	$this->load->view($page,$data);

      	$this->load->view('includes/maintenance_footer',$data);

    }



	public function login_load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/login_head',$data);

      	$this->load->view($page,$data);

      	$this->load->view('includes/login_footer',$data);

    }



	public function non_home_load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/head',$data);

      	$this->load->view($page,$data);

      	$this->load->view('includes/footer',$data);

    }



	public function home_load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/home_head',$data);

      	$this->load->view($page,$data);

      	$this->load->view('includes/home_footer',$data);

    }



	public function ceo_load_page($page, $data = array()){

		$data['__assets__'] = $this->assets_;

      	$this->load->view('includes/ceo_head',$data);

      	$this->load->view($page,$data);

      	$this->load->view('includes/ceo_footer',$data);

    }



	public function load_wp_page($page,$data = array()){

		$data['isCIPage'] = true;

		$data['base_url'] = base_url();

		$this->load->view('../../../wp-load.php');

		$this->load->view('../../../wp-content/themes/themefolder/includes/head',$data);

		$this->load->view('../../../wp-content/themes/themefolder/includes/header');

		$this->load->view('../../../wp-content/themes/themefolder/includes/nav');

		$this->load->view('../../../wp-content/themes/themefolder/includes/banner',$data);

		$this->load->view('includes/wp-head',$data);

		$this->load->view($page,$data);

		$this->load->view('includes/wp-footer',$data);

		$this->load->view('../../../wp-content/themes/themefolder/includes/footer',$data);

	}



	protected function generate_num($strength = 4) {

        $permitted_chars = '0123456789';

        $input_length = strlen($permitted_chars);

        $random_string = '';

        for ($i = 0; $i < $strength; $i++) {

            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];

            $random_string .= $random_character;

        }

        return $random_string;

	}



	protected function generate_code($strength = 20) {

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted_chars);

        $random_string = '';

        for ($i = 0; $i < $strength; $i++) {

            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];

            $random_string .= $random_character;

        }

        return strtolower($random_string);

	}



	public function set_rules_from_post($data, $unrequired_fields=array()){

		$email = '';

		$uname = '';

		if (isset($_POST['email_address'])) {

			if (isset($_POST['orig_email_address'])) {

				$email = ($_POST['orig_email_address'] != $_POST['email_address'])?'|is_unique[ecl_users.email_address]':'';

			}else{

				$email = '|is_unique[ecl_users.email_address]';

			}

		}

		if (isset($_POST['username'])) {

			if (isset($_POST['orig_username'])) {

				$uname = ($_POST['orig_username'] != $_POST['username'])?'|is_unique[ecl_users.username]':'';

			}else{

				$uname = '|is_unique[ecl_users.username]';

			}

		}

		foreach ($data as $key => $value) {

			if(!empty($unrequired_fields) && in_array($key, $unrequired_fields)) continue;

			$this->form_validation->set_rules($key, ucfirst(str_replace('_', ' ', $key)), 'trim|required', array('required' => '{field} is required'));

			if($key == 'username'){

				$rule = $this->form_validation->set_rules($key, 'Username', 'trim|required'.$uname, array('is_unique' => 'The Username already exists.'));

				$rule;

			}

			if($key == 'email_address'){

				$rule = $this->form_validation->set_rules($key, 'Email Address', 'trim|required|valid_email'.$email, array('valid_email' => 'Please provide a valid {field}','is_unique' => 'The Email Address already exists.'));

				$rule;

			}

			if ($key == 'confirm_password') {

				$rule = $this->form_validation->set_rules($key, 'Password Confirmation', 'trim|required|matches[password]');

				$rule;

			}

		}

	}





	protected function sendmail($to_email='prospteam@gmail.com',$from_name='SiteEmail',$subject='Email Notification',$message='',$use_html_template=false,$cc=""){

		  $config = Array(

              	'protocol' 	  => 'smtp',

                'smtp_host'   => 'secure.emailsrvr.com',

                'smtp_port'   => 587,

                'smtp_user'   => 'onlineform6@proweaver.net',

                'smtp_pass'   => '#@pPzT1mGw@F0',

  				'mailtype' 	  => 'html',

  		        'charset'     => 'iso-8859-1',

  		        'wordwrap' 	  => TRUE,

  		        'set_newline' => "\r\n"

          );



		$this->load->library('email');

		$this->email->initialize($config);

		$this->email->set_mailtype("html");

 		$this->email->set_newline("\r\n");

 		$this->email->to($to_email);

		!empty($cc)? $this->email->cc($cc): "";

 		$this->email->from('noreply@eaglecarlimo.com',$from_name);

 		$this->email->subject($subject);

		$this->email->message($message);

		if ($use_html_template) {

			$messageData['title']   =$subject;

			$messageData['content'] =$message;

			$message = $this->load->view('mail_template',$messageData,true);

	 		$this->email->message($message);

		}else{

	 		$this->email->message($message);

		}

		if($this->email->send()){

			return true;

		}else{

			return false;

		}

	}



	// public function send_email($parameter = array()) {	

	// 	$parameter['comp_name'] = 'TEST';

	// 	$parameter['mail_type'] = 1; // 1 - html, 2 - txt

	// 	$parameter['dev_mode'] = 1;

	// 	$parameter['to'] = (is_array($parameter['to'])) ? implode(',', $parameter['to']) : $parameter['to'];

	// 	$parameter['cc'] = (is_array($parameter['cc'])) ? implode(',', $parameter['cc']) : $parameter['cc'];

	// 	$ch = curl_init();

	// 	$mode =  'send_email';

	// 	$url = "http://proweaveremail.com/email/" . $mode;

	// 	curl_setopt($ch, CURLOPT_URL, $url);

	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// 	curl_setopt($ch, CURLINFO_HEADER_OUT, true);

	// 	curl_setopt($ch, CURLOPT_POST, true);

	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);

	// 	$response = json_decode(curl_exec($ch), true);

	// 	$info = curl_getinfo($ch);

	// 	curl_close($ch);

	// 	if ($response['response'] == 'sent') {

	// 		return true;

	// 	}else{

	// 		return false;

	// 	}		

	// }



	public function dataTables($table, $select, $column_order = array(), $where = array(), $join = array()){

		$limit = $this->input->post('length');

		$offset = $this->input->post('start');

		$search = $this->input->post('search');

		$order = $this->input->post('order');

		$draw = $this->input->post('draw');

		// $select = "id, fk_staff_id, fk_user_id, certificate_type, file_name, date_created";

		// $column_order = array(

		// 		'id', 'certificate_type', 'file_name', 'date_created', 'fk_staff_id', 'fk_user_id'

		// );



		// $join = array();

		// $fk_user_id = $_POST['fk_user_id'];

		// $where = array(

		// 		'fk_user_id' => $fk_user_id,

		// 		'is_deleted' => 0

		// );

		// $where = "fk_user_id = '$fk_user_id'";

		// $where = "";



		$list = datatables($table, $column_order, $select, $where, $join, $limit, $offset ,$search, $order);

		$new_array = array();

		foreach ($list['data'] as $key => $value) {

				$new_array[] = $value;

		}

		$output = array(

				"draw" => $draw,

				"recordsTotal" => $list['count_all'],

				"recordsFiltered" => $list['count'],

				"data" => $new_array,

		);

		return $output;

	}



}

