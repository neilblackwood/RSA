<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends MY_Controller
{
	public function index()
	{
            if(!isset($_COOKIE['RSAchoice']))
            {
                header("Location:/choose");
                exit();
            }

            // preload photos from previous page's selection
            $data['preload_images'] = $this->photos();

            $this->set_language();
	    $this->load->template('photo', $data);
	}

        private function photos()
        {
            $params = explode("-",$_COOKIE['RSAchoice']);
            $group_id = $params[0];
            $part_id = $params[1];

            $sql = "SELECT i.id, i.file, i.body_part
                    FROM images i
                    INNER JOIN image_groups ig ON i.id = ig.image_id
                    INNER JOIN group_items gi ON ig.group_item_id = gi.group_item_id AND group_id=" . $group_id . " AND part_id=" . $part_id;

           $this->load->database();

           return $this->db->query($sql)->result_array();
        }
}
