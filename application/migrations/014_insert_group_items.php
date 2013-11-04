<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_group_items extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO group_items(group_id, part_id)
                      VALUES
                      (1,1),
                      (1,2),
                      (1,3),

                      (2,4),
                      (2,5),
                      (2,6),
                      (2,7),

                      (3,8),
                      (3,9),
                      (3,10),
                      (3,11);";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE group_items;");
	}
}