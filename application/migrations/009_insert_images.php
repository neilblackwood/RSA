<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_images extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO images(file, body_part)
                      VALUES
                      ('Bk1.jpg','trunk'),
                      ('Bk2.jpg','trunk'),
                      ('Bk3.jpg','trunk'),
                      ('Bk4.jpg','trunk'),
                      ('Bk_bt.jpg','legs'),

                      ('Es1.jpg','trunk'),
                      ('Es2.jpg','trunk'),
                      ('Es3.jpg','trunk'),
                      ('Es4.jpg','trunk'),
                      ('Es_bt.jpg','legs'),

                      ('Pan1.jpg','trunk'),
                      ('Pan2.jpg','trunk'),
                      ('Pan3.jpg','trunk'),
                      ('Pan4.jpg','trunk'),
                      ('Pan_bt.jpg','legs'),

                      ('Rc1.jpg','trunk'),
                      ('Rc2.jpg','trunk'),
                      ('Rc3.jpg','trunk'),
                      ('Rc4.jpg','trunk'),
                      ('Rc_bt.jpg','legs'),

                      ('cyclist1.jpg','trunk'),
                      ('cyclist2.jpg','trunk'),
                      ('cyclist3.jpg','trunk'),
                      ('cyclist_bt.jpg','legs'),

                      ('Fm1.jpg','trunk'),
                      ('Fm2.jpg','trunk'),
                      ('Fm3.jpg','trunk'),
                      ('Fm_bt.jpg','legs'),

                      ('Police1.jpg','trunk'),
                      ('Police2.jpg','trunk'),
                      ('Police3.jpg','trunk'),
                      ('Police_bt.jpg','legs'),

                      ('rs1.jpg','trunk'),
                      ('rs2.jpg','trunk'),
                      ('rs3.jpg','trunk'),
                      ('rs_bt.jpg','legs'),

                      ('Baker1.jpg','trunk'),
                      ('Baker2.jpg','trunk'),
                      ('Baker3.jpg','trunk'),
                      ('Baker4.jpg','trunk'),
                      ('Baker_bt.jpg','legs'),

                      ('Stu1.jpg','trunk'),
                      ('Stu2.jpg','trunk'),
                      ('Stu3.jpg','trunk'),
                      ('Stu4.jpg','trunk'),
                      ('Stu_bt.jpg','legs'),

                      ('Surg1.jpg','trunk'),
                      ('Surg2.jpg','trunk'),
                      ('Surg3.jpg','trunk'),
                      ('Surg4.jpg','trunk'),
                      ('Surg_bt.jpg','legs'),

                      ('Te1.jpg','trunk'),
                      ('Te2.jpg','trunk'),
                      ('Te3.jpg','trunk'),
                      ('Te4.jpg','trunk'),
                      ('Te_bt.jpg','legs');";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE groups;");
	}
}