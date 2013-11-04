<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_languages extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO languages(title)
                      VALUES
                      ('English'),('Spanish'),('French'),('Portuguese'),('Russian') ;";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE languages;");
	}
}