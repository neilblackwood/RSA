<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_images extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'file VARCHAR(100) NOT NULL',
                'body_part ENUM("trunk","legs") NOT NULL',
                'message VARCHAR(100) NULL',
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('id', TRUE);

             $this->dbforge->create_table('images');

             $indexes = "ALTER TABLE `images`
                         ADD UNIQUE INDEX `images_file_UNIQUE` (`file` ASC)";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('images');
	}
}