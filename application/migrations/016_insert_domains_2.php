<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_domains_2 extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO domains(domain,country)
                      VALUES
                      ('givenlondon.com','UK'),
                      ('gmail.com','UK');";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE domains;");
	}
}