<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="validation-error">', '</div>');
	}

	public function index()
	{

		$data = $this->session->userdata();
		if (!empty($data['admin_logged_in'])) redirect(base_url('/main'));

		// Set Title
		$data['title'] = "Sign In";

		// Set validation rules
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		// Check for form validation
		if ($this->form_validation->run() == FALSE) {
			// Show Login page
			$this->load->view('login/index', $data);
		} else {
			$post = $this->input->post();
			$clean = $this->security->xss_clean($post);
			$userInfo = $this->admin_model->checkLogin($clean);

			if (!$userInfo) {
				$this->session->set_flashdata('error_msg', 'Error: Email/Password is incorrect');
				redirect(base_url('/login'));
			} else {
				$this->session->set_userdata('admin_logged_in', true);
				foreach ($userInfo as $key => $val) {
					$this->session->set_userdata($key, $val);
				}

				redirect(base_url('/login/checkLoginUser'));
			}
		}
	}

	public function checkLoginUser()
	{
		$data = $this->session->userdata();
		if (empty($data)) redirect(base_url('/login'));

		$this->load->library('user_agent');
		$browser = $this->agent->browser();
		$os = $this->agent->platform();
		$getip = $this->input->ip_address();

		// Site title has been hard coded in config.php
		$stLe = $this->config->item('site_title');

		$now = new DateTime();
		$dTod = $now->format('Y-m-d');
		$dTim = $now->format('H:i:s');

		$this->load->helper('cookie');
		$keyid = rand(1, 9000);
		$scSh = sha1($keyid);
		$neMSC = md5($data['email']);
		$setLogin = array(
			'name'     => $neMSC,
			'value'    => $scSh,
			'expire'   => strtotime("+2 year"),
		);
		$getAccess = get_cookie($neMSC);

		if (!$getAccess && $setLogin["name"] == $neMSC) {
			$this->load->library('email');
			$this->input->set_cookie($setLogin, TRUE);
			redirect(base_url() . 'main/');
		} else {
			$this->input->set_cookie($setLogin, TRUE);
			redirect(base_url() . 'main/');
		}
	}

	public function genPass($password)
	{
		echo password_hash($password, PASSWORD_BCRYPT);
	}
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
