<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_domains extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'domain VARCHAR(100) NOT NULL',
                'country VARCHAR(100) NOT NULL',
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('id', TRUE);

             $this->dbforge->create_table('domains');

             $indexes = "ALTER TABLE `domains`
                         ADD UNIQUE INDEX `domain_UNIQUE` (`domain` ASC)";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('domains');
	}
}