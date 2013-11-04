<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller
{
	public function index()
	{
            $this->set_language();

            $data['users'] = $this->gallery_data();
            $data['countries'] = $this->country_data();

            $this->load->helper('gallery');
	    $this->load->template('gallery', $data);
	}

        private function gallery_data()
        {
            $this->load->database();

            $where = $having = null;
            if (isset($_POST['search']) && !empty($_POST['search'])) $where = " WHERE u.name LIKE '%" . $_POST['search'] . "%' OR u.email_address LIKE '%" . $_POST['search'] . "%'";

            if(isset($_POST['country']) && !empty($_POST['country']) && $_POST['country'] !== 'All countries')
            {
                $having = " HAVING country = '" . $_POST['country'] . "' ";
            }

            $query = "SELECT u.*,
                      (SELECT d.country FROM domains d WHERE SUBSTR(u.email_address, LOCATE('@', u.email_address)+1) = d.domain) AS country
                      FROM users u " . $where . " " . $having .
                      " ORDER BY last_used DESC";

            return $this->db->query($query)->result_array();
        }

        private function country_data()
        {
            $this->load->database();

            $query = "SELECT distinct country FROM domains ORDER BY country ASC";

            return $this->db->query($query)->result_array();
        }
}
