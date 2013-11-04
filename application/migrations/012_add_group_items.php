<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_group_items extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'group_item_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'group_id TINYINT UNSIGNED NOT NULL',
                'part_id TINYINT UNSIGNED NOT NULL',
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('group_item_id', TRUE);

             $this->dbforge->create_table('group_items');

             $indexes = "ALTER TABLE `group_items`

                         ADD CONSTRAINT `group_items_group_id_idx`
                         FOREIGN KEY (`group_id` )
                         REFERENCES `groups` (`id` )
                         ON UPDATE CASCADE,

                         ADD CONSTRAINT `group_items_item_id_idx`
                         FOREIGN KEY (`part_id` )
                         REFERENCES `parts` (`id` )
                         ON UPDATE CASCADE";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('group_items');
	}
}