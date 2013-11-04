<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_groups extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO groups(title)
                      VALUES
                      ('BE PART OF CREATING A SAFE SECURE WORLD'),
                      ('BE PART OF HELPING COMMUNITIES TO THRIVE'),
                      ('BE PART OF SHAPING A SUSTAINABLE FUTURE');";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE groups;");
	}
}