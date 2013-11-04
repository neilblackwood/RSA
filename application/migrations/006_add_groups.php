<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_groups extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'title VARCHAR(100) NOT NULL',
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('id', TRUE);

             $this->dbforge->create_table('groups');

             $indexes = "ALTER TABLE `groups`
                         ADD UNIQUE INDEX `groups_title_UNIQUE` (`title` ASC)";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('groups');
	}
}