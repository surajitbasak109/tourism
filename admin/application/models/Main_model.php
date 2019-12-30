<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Main_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Surajit Basak <surajitbasak109@gmail.com>
 * @param     ...
 * @return    ...
 *
 */

class Main_model extends CI_Model
{

	// ------------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getMenus
	 *
	 * @return void
	 */
	public function getMenus()
	{
		$query = $this->db
			->order_by('sequence')
			->get('menus');
		$result = $query->result();
		foreach ($result as $row) {
			$query = $this->db
				->order_by('sequence')
				->get_where('submenus', [
					'menu_id' => $row->id
				]);
			$result2 = $query->result();
			$row->child = $result2;
		}

		return $result;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getMaxPackNo
	 *
	 * @return void
	 */
	public function getMaxPackNo()
	{
		// alternative way to get auto increment id
		// SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "travel" AND TABLE_NAME = "tbl_package";
		$query = $this->db->select_max('id', 'maxid')
			->get('package');
		$result = $query->row();
		$maxid = is_null($result->maxid) ? 0 : $result->maxid;
		$maxid++;
		return $maxid;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getItineraries
	 *
	 * @return void
	 */
	public function getItineraries()
	{
		$query = $this->db->get('itinerary');
		return $query->result();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getTags
	 *
	 * @return void
	 */
	public function getTags()
	{
		$query = $this->db->get('tag');
		return $query->result();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------


	/**
	 * insert_package
	 *
	 * @param  mixed $post
	 *
	 * @return void
	 */
	public function insert_package($post)
	{
		// print_r($post);
		// exit;
		$query = $this->db->insert('package', $post);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * update_package
	 *
	 * @param  mixed $post
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function update_package($post, $id)
	{
		// echo $id . "<br>";
		// print_r($post);
		// exit;
		$query = $this->db->update('package', $post, ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getPackages
	 *
	 * @return void
	 */
	public function getPackages()
	{
		$query = $this->db->order_by('created_at')
			->get('package');
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getPackages
	 *
	 * @return void
	 */
	public function getPackage($id)
	{
		$query = $this->db->get_where('package', ['id' => $id]);
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * getEnquiries
	 *
	 * @return void
	 */
	public function getEnquiries()
	{
		$query = $this->db->order_by('created_at')
			->get('enquiry');
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * cancel_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function cancel_enquiry(int $id)
	{
		$query = $this->db->update('enquiry', ['status' => 'Inactive'], ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * activate_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function activate_enquiry(int $id)
	{
		$query = $this->db->update('enquiry', ['status' => 'Active'], ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * activate_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function del_enquiry(int $id)
	{
		$query = $this->db->delete('enquiry', ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * cancel_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function cancel_package(int $id)
	{
		$query = $this->db->update('package', ['status' => 'Inactive'], ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * activate_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function activate_package(int $id)
	{
		$query = $this->db->update('package', ['status' => 'Active'], ['id' => $id]);
		return $query;
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	/**
	 * activate_enquiry
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function del_package(int $id)
	{
		$query = $this->db->delete('package', ['id' => $id]);
		if ($this->db->error()['code'] == 1451) {
			$this->session->set_flashdata('error_msg', 'You cannot delete this package.');
			redirect(base_url('/main/'), 'refresh');
		} else {
			return $query;
		}
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
}

/* End of file Main_model.php */
/* Location: ./application/models/Main_model.php */
