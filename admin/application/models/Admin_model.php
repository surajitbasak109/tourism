<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Admin_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Admin_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	public function checkLogin($post)
	{
		// Check for valid user
		$query = $this->db->get_where('admin', ['email' => $post['email']]);
		$count = $query->num_rows();
		if ($count > 0) {
			$userInfo = $query->row();
			if (!password_verify($post['password'], $userInfo->password)) {
				error_log('Unsuccessfull login attempt(' . $post['email'] . ')');
				return false;
			} else {
				$this->updateLoginTime($userInfo->id);
				unset($userInfo->password);
				return $userInfo;
			}
		} else {
			error_log('Unsuccessfull login attempt(' . $post['email'] . ')');
			return false;
		}
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------

	public function updateLoginTime($id)
	{
		// Check for valid user
		$this->db->update('admin', ['last_login' => date('Y-m-d H:i:s')], ['id' => $id]);
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------


}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
