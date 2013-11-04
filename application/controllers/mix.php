<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mix extends MY_Controller
{
	public function index()
	{
            if(!isset($_COOKIE['RSApicture']))
            {
                header("Location:/photo");
                exit();
            }

            $this->set_language();
            $data['pics'] = $this->pics();

            $this->load->template('mix', $data);
	}

        private function pics()
        {
            $params = explode("-",$_COOKIE['RSAchoice']);
            $group_id = $params[0];
            $part_id = $params[1];

            $sql = "SELECT i.id, i.file, i.body_part
                    FROM images i
                    INNER JOIN image_groups ig ON i.id = ig.image_id
                    INNER JOIN group_items gi ON ig.group_item_id = gi.group_item_id AND group_id=" . $group_id . " AND part_id=" . $part_id;

           $this->load->database();

           $data = $this->db->query($sql)->result_array();

           $result['body'] = array();
           $result['legs'] = array();

           if(isset($_COOKIE['RSAbody'])) $result['body'][] = $_COOKIE['RSAbody'];
           if(isset($_COOKIE['RSAlegs'])) $result['legs'][] = $_COOKIE['RSAlegs'];

           foreach ($data as $index=>$property)
           {
               if( isset($_COOKIE['RSAbody']) && $property['file'] == $_COOKIE['RSAbody'] || isset($_COOKIE['RSAlegs']) && $property['file'] == $_COOKIE['RSAlegs'] ) continue;

               if ($property['body_part'] == 'trunk') $result['body'][] = "/assets/img/" . strtolower($_COOKIE['RSAlanguage']) . "/" . strtolower($property['file']);
               elseif($property['body_part'] == 'legs') $result['legs'][] = "/assets/img/english/" . strtolower($property['file']);
           }

           if(!isset($_COOKIE['RSAbody']))
           {
                shuffle($result['body']);
                shuffle($result['legs']);
           }

           return $result;
        }
}
