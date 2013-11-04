<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_parts extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO parts(title)
                      VALUES
                      ('Be part of helping people learn about how to stay safe on the roads'),
                      ('Be part of making roads safer at night for millions'),
                      ('Be part of helping people protect their homes and businesses'),

                      ('Be part of raising the achievements and aspirations of young people'),
                      ('Be part of championing the next generations of enterpreneurs'),
                      ('Be part of supporting important causes by volunteering my time'),
                      ('Be part of supporting important causes by fundraising for charities'),

                      ('Be part of a new way of working to save energy and resources'),
                      ('Be part of developing new products and services for a sustainable future'),
                      ('Be part of helping our customers respond to environmental changes'),
                      ('Be part of our new green champions network');";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE parts;");
	}
}