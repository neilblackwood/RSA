<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_image_groups extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO image_groups(group_item_id, image_id)
                      VALUES

                      -- Safe Secure World
                      (1,(SELECT id FROM images WHERE file='cyclist3.jpg')),
                      (1,(SELECT id FROM images WHERE file='Fm3.jpg')),
                      (1,(SELECT id FROM images WHERE file='Police3.jpg')),
                      (1,(SELECT id FROM images WHERE file='rs1.jpg')),
                      (1,(SELECT id FROM images WHERE file='cyclist_bt.jpg')),
                      (1,(SELECT id FROM images WHERE file='Fm_bt.jpg')),
                      (1,(SELECT id FROM images WHERE file='Police_bt.jpg')),
                      (1,(SELECT id FROM images WHERE file='rs_bt.jpg')),

                      (2,(SELECT id FROM images WHERE file='cyclist2.jpg')),
                      (2,(SELECT id FROM images WHERE file='Fm2.jpg')),
                      (2,(SELECT id FROM images WHERE file='Police2.jpg')),
                      (2,(SELECT id FROM images WHERE file='rs2.jpg')),
                      (2,(SELECT id FROM images WHERE file='cyclist_bt.jpg')),
                      (2,(SELECT id FROM images WHERE file='Fm_bt.jpg')),
                      (2,(SELECT id FROM images WHERE file='Police_bt.jpg')),
                      (2,(SELECT id FROM images WHERE file='rs_bt.jpg')),

                      (3,(SELECT id FROM images WHERE file='cyclist1.jpg')),
                      (3,(SELECT id FROM images WHERE file='Fm1.jpg')),
                      (3,(SELECT id FROM images WHERE file='Police1.jpg')),
                      (3,(SELECT id FROM images WHERE file='rs3.jpg')),
                      (3,(SELECT id FROM images WHERE file='cyclist_bt.jpg')),
                      (3,(SELECT id FROM images WHERE file='Fm_bt.jpg')),
                      (3,(SELECT id FROM images WHERE file='Police_bt.jpg')),
                      (3,(SELECT id FROM images WHERE file='rs_bt.jpg')),


                      -- Helping communities to thrive
                      (4,(SELECT id FROM images WHERE file='Baker1.jpg')),
                      (4,(SELECT id FROM images WHERE file='Stu1.jpg')),
                      (4,(SELECT id FROM images WHERE file='Surg1.jpg')),
                      (4,(SELECT id FROM images WHERE file='Te1.jpg')),
                      (4,(SELECT id FROM images WHERE file='Baker_bt.jpg')),
                      (4,(SELECT id FROM images WHERE file='Stu_bt.jpg')),
                      (4,(SELECT id FROM images WHERE file='Surg_bt.jpg')),
                      (4,(SELECT id FROM images WHERE file='Te_bt.jpg')),

                      (5,(SELECT id FROM images WHERE file='Baker2.jpg')),
                      (5,(SELECT id FROM images WHERE file='Stu2.jpg')),
                      (5,(SELECT id FROM images WHERE file='Surg2.jpg')),
                      (5,(SELECT id FROM images WHERE file='Te2.jpg')),
                      (5,(SELECT id FROM images WHERE file='Baker_bt.jpg')),
                      (5,(SELECT id FROM images WHERE file='Stu_bt.jpg')),
                      (5,(SELECT id FROM images WHERE file='Surg_bt.jpg')),
                      (5,(SELECT id FROM images WHERE file='Te_bt.jpg')),

                      (6,(SELECT id FROM images WHERE file='Baker3.jpg')),
                      (6,(SELECT id FROM images WHERE file='Stu3.jpg')),
                      (6,(SELECT id FROM images WHERE file='Surg3.jpg')),
                      (6,(SELECT id FROM images WHERE file='Te3.jpg')),
                      (6,(SELECT id FROM images WHERE file='Baker_bt.jpg')),
                      (6,(SELECT id FROM images WHERE file='Stu_bt.jpg')),
                      (6,(SELECT id FROM images WHERE file='Surg_bt.jpg')),
                      (6,(SELECT id FROM images WHERE file='Te_bt.jpg')),

                      (7,(SELECT id FROM images WHERE file='Baker4.jpg')),
                      (7,(SELECT id FROM images WHERE file='Stu4.jpg')),
                      (7,(SELECT id FROM images WHERE file='Surg4.jpg')),
                      (7,(SELECT id FROM images WHERE file='Te4.jpg')),
                      (7,(SELECT id FROM images WHERE file='Baker_bt.jpg')),
                      (7,(SELECT id FROM images WHERE file='Stu_bt.jpg')),
                      (7,(SELECT id FROM images WHERE file='Surg_bt.jpg')),
                      (7,(SELECT id FROM images WHERE file='Te_bt.jpg')),


                      -- Shaping a Sustainable Future
                      (8,(SELECT id FROM images WHERE file='Bk1.jpg')),
                      (8,(SELECT id FROM images WHERE file='Es1.jpg')),
                      (8,(SELECT id FROM images WHERE file='Pan1.jpg')),
                      (8,(SELECT id FROM images WHERE file='Rc4.jpg')),
                      (8,(SELECT id FROM images WHERE file='Rc_bt.jpg')),
                      (8,(SELECT id FROM images WHERE file='Pan_bt.jpg')),
                      (8,(SELECT id FROM images WHERE file='Es_bt.jpg')),
                      (8,(SELECT id FROM images WHERE file='Bk_bt.jpg')),

                      (9,(SELECT id FROM images WHERE file='Bk2.jpg')),
                      (9,(SELECT id FROM images WHERE file='Es2.jpg')),
                      (9,(SELECT id FROM images WHERE file='Pan2.jpg')),
                      (9,(SELECT id FROM images WHERE file='Rc3.jpg')),
                      (9,(SELECT id FROM images WHERE file='Rc_bt.jpg')),
                      (9,(SELECT id FROM images WHERE file='Pan_bt.jpg')),
                      (9,(SELECT id FROM images WHERE file='Es_bt.jpg')),
                      (9,(SELECT id FROM images WHERE file='Bk_bt.jpg')),

                      (10,(SELECT id FROM images WHERE file='Bk3.jpg')),
                      (10,(SELECT id FROM images WHERE file='Es3.jpg')),
                      (10,(SELECT id FROM images WHERE file='Pan3.jpg')),
                      (10,(SELECT id FROM images WHERE file='Rc2.jpg')),
                      (10,(SELECT id FROM images WHERE file='Rc_bt.jpg')),
                      (10,(SELECT id FROM images WHERE file='Pan_bt.jpg')),
                      (10,(SELECT id FROM images WHERE file='Es_bt.jpg')),
                      (10,(SELECT id FROM images WHERE file='Bk_bt.jpg')),

                      (11,(SELECT id FROM images WHERE file='Bk4.jpg')),
                      (11,(SELECT id FROM images WHERE file='Es4.jpg')),
                      (11,(SELECT id FROM images WHERE file='Pan4.jpg')),
                      (11,(SELECT id FROM images WHERE file='Rc1.jpg')),
                      (11,(SELECT id FROM images WHERE file='Rc_bt.jpg')),
                      (11,(SELECT id FROM images WHERE file='Pan_bt.jpg')),
                      (11,(SELECT id FROM images WHERE file='Es_bt.jpg')),
                      (11,(SELECT id FROM images WHERE file='Bk_bt.jpg'));";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE image_groups;");
	}
}