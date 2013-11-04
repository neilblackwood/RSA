<?php

class MY_Controller extends CI_Controller
{
    public function set_language()
    {
        $lang = isset($_COOKIE['RSAlanguage']) ? $_COOKIE['RSAlanguage'] : "english";

        $this->load->helper('language');
        $this->lang->load('texts', $lang);
    }

}