<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Main
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

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="validation-error">', '</div>');
	}

	public function index()
	{
		$data = $this->session->userdata();
		if (empty($data['admin_logged_in'])) redirect(base_url('/login'));

		$data['site_title'] = $this->config->item('site_title');
		$data['title'] = "Admin Dashboard";

		$menuItems = $this->main_model->getMenus();
		$data['menus'] = $menuItems;

		$packages = $this->main_model->getPackages();
		$data['packages'] = $packages;

		$this->load->view('main/index', $data);
	}

	public function packageentry()
	{
		$data = $this->session->userdata();
		if (empty($data['admin_logged_in'])) redirect(base_url('/login'));

		$data['site_title'] = $this->config->item('site_title');
		$data['title'] = "Package Entry";

		$menuItems = $this->main_model->getMenus();
		$data['menus'] = $menuItems;

		$autoid = $this->main_model->getMaxPackNo();
		$data['packid'] = $autoid;

		$itineraries = $this->main_model->getItineraries();
		$data['itineraries'] = $itineraries;

		$tags = $this->main_model->getTags();
		$data['tags'] = $tags;

		// package code validation not used as because it will come from autoid
		$this->form_validation->set_rules('title', 'Package title', 'trim|required');
		$this->form_validation->set_rules('description', 'Package description', 'trim|required');
		$this->form_validation->set_rules('rate_per', 'Rate per person', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('nights', 'Nights stay', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('days', 'Days stay', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('min_pax', 'Minimum package', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('tag', 'Package tag', 'trim|required');
		$this->form_validation->set_rules('status', 'Package status', 'trim|required');
		$this->form_validation->set_rules('imgPath', 'Package image', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/package-entry', $data);
		} else {
			$post = $this->input->post();
			$clean = $this->security->xss_clean($post);

			$imageInp = $_FILES['imageInp'];
			$imgname = $imageInp['name'];
			$tmp = explode(".", $imgname);
			$imgext = end($tmp);

			$config['file_name'] = time() . '.' . $imgext;
			$config['upload_path']   = FCPATH . '../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = 0;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('imageInp')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error_msg', $error['error']);

				redirect(base_url('/main/packageentry'), 'refresh');
			} else {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];

				$clean['image'] = $file_name;
				$clean['pack_code'] = 'TAN-' . $autoid;
				unset($clean['imgPath']);

				$inserted = $this->main_model->insert_package($clean);

				if ($inserted) {
					$this->session->set_flashdata('success_msg', 'Package details has been saved.');
					redirect(base_url('main/packageentry'), 'refresh');
				}

				// $data = array('upload_data' => $this->upload->data());

				// $this->load->view('upload_success', $data);
			}
		}
	}

	public function editpackage($id)
	{
		$data = $this->session->userdata();
		if (empty($data['admin_logged_in'])) redirect(base_url('/login'));

		$data['site_title'] = $this->config->item('site_title');
		$data['title'] = "Package Entry";

		$menuItems = $this->main_model->getMenus();
		$data['menus'] = $menuItems;

		$autoid = $id;
		$data['packid'] = $autoid;

		$itineraries = $this->main_model->getItineraries();
		$data['itineraries'] = $itineraries;

		$tags = $this->main_model->getTags();
		$data['tags'] = $tags;

		$data['id'] = $id;

		$editpack = $this->main_model->getPackage($id);
		if ($editpack) {
			$data['editpack'] = $editpack;
		} else {
			$this->session->set_flashdata('error_msg', 'Package not found');
			redirect(base_url('/main/'), 'refresh');
		}

		// package code validation not used as because it will come from autoid
		$this->form_validation->set_rules('title', 'Package title', 'trim|required');
		$this->form_validation->set_rules('description', 'Package description', 'trim|required');
		$this->form_validation->set_rules('rate_per', 'Rate per person', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('nights', 'Nights stay', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('days', 'Days stay', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('min_pax', 'Minimum package', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('tag', 'Package tag', 'trim|required');
		$this->form_validation->set_rules('status', 'Package status', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/package-edit', $data);
		} else {
			$post = $this->input->post();
			$clean = $this->security->xss_clean($post);
			if (!empty($_FILES['imageInp']['name'])) {
				$imageInp = $_FILES['imageInp'];
				$imgname = $imageInp['name'];
				$tmp = explode(".", $imgname);
				$imgext = end($tmp);

				$config['file_name'] = time() . '.' . $imgext;
				$config['upload_path']   = FCPATH . '../uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = 0;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('imageInp')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_msg', $error['error']);

					redirect(base_url('/main/editpackage/' . $id), 'refresh');
				} else {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

					$clean['image'] = $file_name;
					$clean['pack_code'] = 'TAN-' . $autoid;
					unset($clean['imgPath']);

					$updated = $this->main_model->update_package($clean, $id);

					if ($updated) {
						$this->session->set_flashdata('success_msg', 'Package details has been updated.');
						redirect(base_url('/main/'), 'refresh');
					}
				}
			} else {
				$clean['pack_code'] = 'TAN-' . $autoid;
				unset($clean['imgPath']);

				$updated = $this->main_model->update_package($clean, $id);
				if ($updated) {
					$this->session->set_flashdata('success_msg', 'Package details has been updated.');
					redirect(base_url('/main/'), 'refresh');
				}
			}
		}
	}

	public function enquiry()
	{
		$data = $this->session->userdata();
		if (empty($data['admin_logged_in'])) redirect(base_url('/login'));
		$data['site_title'] = $this->config->item('site_title');
		$data['title'] = "All Enquiry";
		$menuItems = $this->main_model->getMenus();
		$data['menus'] = $menuItems;

		$enquiries = $this->main_model->getEnquiries();
		$data['enquiries'] = $enquiries;

		$this->load->view('main/enquiry', $data);
	}

	public function cancelenquiry($id)
	{
		$cancelled = $this->main_model->cancel_enquiry($id);
		$this->session->set_flashdata('success_msg', 'Enquiry has been cancelled.');
		redirect(base_url('/main/enquiry'), 'refresh');
	}

	public function activateenquiry($id)
	{
		$activated = $this->main_model->activate_enquiry($id);
		$this->session->set_flashdata('success_msg', 'Enquiry has been activated.');
		redirect(base_url('/main/enquiry'), 'refresh');
	}

	public function delenquiry($id)
	{
		$deleted = $this->main_model->del_enquiry($id);
		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Enquiry has been deleted.');
		}
		redirect(base_url('/main/enquiry'), 'refresh');
	}

	public function canpackage($id)
	{
		$cancelled = $this->main_model->cancel_package($id);
		$this->session->set_flashdata('success_msg', 'Package has been cancelled.');
		redirect(base_url('/main/'), 'refresh');
	}

	public function actpackage($id)
	{
		$activated = $this->main_model->activate_package($id);
		$this->session->set_flashdata('success_msg', 'Package has been activated.');
		redirect(base_url('/main/'), 'refresh');
	}

	public function delpackage($id)
	{
		$deleted = $this->main_model->del_package($id);
		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Package has been deleted.');
		}
		redirect(base_url('/main/'), 'refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/');
	}
}


/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
