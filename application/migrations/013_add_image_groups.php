<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_image_groups extends CI_Migration
{
	public function up()
	{
             $fields = array(
                'image_group_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
                'image_id TINYINT UNSIGNED NOT NULL',
                'group_item_id TINYINT UNSIGNED NOT NULL',
              );

             $this->dbforge->add_field($fields);
             $this->dbforge->add_key('image_group_id', TRUE);

             $this->dbforge->create_table('image_groups');

             $indexes = "ALTER TABLE `image_groups`

                         ADD CONSTRAINT `image_groups_image_id_idx`
                         FOREIGN KEY (`image_id` )
                         REFERENCES `images` (`id` )
                         ON UPDATE CASCADE,

                         ADD CONSTRAINT `image_groups_group_item_id_idx`
                         FOREIGN KEY (`group_item_id` )
                         REFERENCES `group_items` (`group_item_id` )
                         ON UPDATE CASCADE";

             $this->db->query($indexes);

	}

	public function down()
	{
		$this->dbforge->drop_table('image_groups');
	}
}