<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_domains extends CI_Migration
{
	public function up()
	{
             $data = "INSERT INTO domains(domain,country)
                      VALUES
                      ('ar.rsagroup.com','Argentina'),
                      ('rsaacg.com.ar','Argentina'),
                      ('rsaelcomercio.com.ar','Argentina'),
                      ('ame.rsagroup.com','Asia & Middle East'),
                      ('bh.rsagroup.com','Bahrain'),
                      ('br.rsagroup.com','Brazil'),
                      ('cns.ca','Canada'),
                      ('gcan.ca','Canada'),
                      ('glenstonecapital.com','Canada'),
                      ('goguenchamplain.com','Canada'),
                      ('insurancecentre.com','Canada'),
                      ('johnson.ca','Canada'),
                      ('morgex.com','Canada'),
                      ('rsagroup.ca','Canada'),
                      ('uc.qc.ca','Canada'),
                      ('unifund.ca','Canada'),
                      ('web.cns.ca','Canada'),
                      ('insurancecorporation.com','Channel Islands'),
                      ('cl.rsagroup.com','Chile'),
                      ('cn.rsagroup.com','China'),
                      ('co.rsagroup.com','Colombia'),
                      ('direct.cz','Czech Republic'),
                      ('codan.dk','Denmark'),
                      ('surveyassociation.com','Denmark'),
                      ('rsagroup.ee','Estonia'),
                      ('sales.rsagroup.ee','Estonia'),
                      ('eu.rsagroup.com','Europe'),
                      ('europageneral.com','Europe'),
                      ('gcc.rsagroup.com','Global HQ'),
                      ('hk.rsagroup.com','Hong Kong'),
                      ('royalsundaram.in','India'),
                      ('123.ie','Ireland'),
                      ('bmu.ie','Ireland'),
                      ('ie.rsagroup.com','Ireland'),
                      ('sertus.ie','Ireland'),
                      ('it.rsagroup.com','Italy'),
                      ('ld.lt','Lithuania'),
                      ('laro.rsagroup.com','Latin America'),
                      ('balta.lv','Latvia'),
                      ('my.rsagroup.com','Malaysia'),
                      ('mx.rsagroup.com','Mexico'),
                      ('codanmarine.com','Nordic'),
                      ('codanmarineservices.com','Nordic'),
                      ('codanforsikring.no','Norway'),
                      ('trygghansa.no','Norway'),
                      ('alahliaoman.com','Oman'),
                      ('om.rsagroup.com','Oman'),
                      ('link4.pl','Poland'),
                      ('in-touch.ru','Russia'),
                      ('sa.rsagroup.com','Saudi Arabia'),
                      ('sg.rsagroup.com','Singapore'),
                      ('aktsam.se','Sweden'),
                      ('svelandsak.se','Sweden'),
                      ('trygghansa.se','Sweden'),
                      ('ae.rsagroup.com','UAE'),
                      ('morethan.com','UK'),
                      ('tridentpsl.co.uk','UK'),
                      ('uk.rsagroup.com','UK'),
                      ('uy.rsagroup.com','Uruguay'),
                      ('us.rsagroup.com','US'),
                      ('hotmail.co.uk','UK'),
                      ('live.co.uk','UK');";

             $this->db->query($data);
	}

	public function down()
	{
             $this->db->query("TRUNCATE TABLE domains;");
	}
}