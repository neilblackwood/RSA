<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'name VARCHAR(100) NOT NULL',
                'email_address VARCHAR(100) NOT NULL',
                'last_used BIGINT NOT NULL',
                'language_id VARCHAR(50)',
                'head_pic VARCHAR(200)',
                'body_id TINYINT',
                'legs_id TINYINT',
                'full_pic VARCHAR(200)'
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('id', TRUE);

             $this->dbforge->create_table('users');

             $indexes = "ALTER TABLE `users`
                         ADD UNIQUE INDEX `email_address_UNIQUE` (`email_address` ASC)";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}