<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choose extends MY_Controller
{
	public function index()
	{
            if(!isset($_COOKIE['RSAname'])||!isset($_COOKIE['RSAlanguage']))
            {
                header("Location:/");
                exit();
            }

            $this->set_language();
            $data['groups'] = $this->groups();

            $this->load->helper('choose');
	    $this->load->template('choose', $data);
	}

        private function groups()
        {
            $sql = "SELECT g.id AS group_id, g.title AS `group`, p.id AS part_id, p.title AS part
                    FROM group_items gi
                    INNER JOIN groups g ON gi.group_id = g.id
                    INNER JOIN parts p ON gi.part_id = p.id";

           $this->load->database();

           $result = $this->db->query($sql)->result_array();

           $groups = array();
           foreach ($result as $index=>$value)
           {
               $groups[$value['group_id']]['title'] = $value['group'];
               $groups[$value['group_id']]['parts'][$value['part_id']] = $value['part'];
           }

           return $groups;
        }
}
