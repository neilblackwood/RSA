<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save extends MY_Controller
{
    private $filename = null;

    public function index()
    {
        $this->image_stitch();
    }

    public function crop()
    {
        $targ_w = 400;
        $targ_h = 200;
        $jpeg_quality = 100;
        $src = substr( substr($_POST['pic'],0,strpos($_POST['pic'], "?")),1);

        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

        imagejpeg($dst_r, $src, $jpeg_quality);

        echo json_encode($src . "?" . time());
    }

    public function webcam()
    {
        $file_name = "upload/" . $_POST['email'] . "_webcam.png";
        $encodedData = $_POST['dataURL'];
        $encodedData = substr($encodedData, strpos($encodedData,",")+1);
        $encodedData = str_replace(' ','+',$encodedData);
        $decodedData = base64_decode($encodedData);

        file_put_contents($file_name, $decodedData);

        echo json_encode($file_name . "?" . time());
        die();
    }

    private function get_path($file)
    {
        $clear = strpos($file, '?')-1;
        if ($clear < 0) $clear = strlen($file);

        return realpath(substr($file, 1, $clear ));
    }

    private function image_stitch()
    {
        $this->filename = 'upload/' . $this->input->cookie('RSAemail') . "_full.png";
        $head_pic = $this->get_path($this->input->cookie('RSApicture'));
        $body_pic = $this->get_path($this->input->cookie('RSAbody'));
        $legs_pic = $this->get_path($this->input->cookie('RSAlegs'));

        try
        {
            if (TRUE !== class_exists('Imagick'))
            {
                throw new Exception('Imagick class does not exist.');
            }

            /* Create new imagick object */
            $image = new Imagick();

            /* create red, green and blue images */
            $image->readImage($head_pic);
            $image->readImage($body_pic);
            $image->readImage($legs_pic);

            /* Append the images into one */
            $image->resetIterator();
            $combined = $image->appendImages(true);

            /* Output the image */
            $combined->setImageFormat("jpg");

            if (file_exists($this->filename)) unlink ($this->filename);

            // Let's write the image.
            if  (FALSE == $combined->writeImage($this->filename))
            {
                throw new Exception();
            }

            echo $this->filename . "?" . time();
        }

        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage() . "\n";
        }
    }

    public function email()
    {
        $this->perm_save();

        $params = explode("-",$_COOKIE['RSAchoice']);
        $group_id = $params[0];
        $part_id = $params[1];

        $sql = "SELECT title
                FROM parts
                WHERE id=" . $part_id;

        $this->load->database();

        $data = $this->db->query($sql)->result_array();

        $this->load->library('email');

        $config['mailtype']  = 'html';
        $this->email->initialize($config);
        $this->email->from('noreply@bepartofcr.rsagroup.com', 'Be part of CR');
        $this->email->to($this->input->cookie('RSAemail'));
        $this->email->subject($data[0]['title']);

        $part = str_replace('Be part', 'being part', $data[0]['title']);
        $message =
        "Hi " . $this->input->cookie('RSAname') . "<br/><br/>

        Here's your photo, we hope you like it. <br/><br/>
        By " . $part . ", you are helping us meet our ambition to be the world’s most sustainable general insurer.
        <br/><br/>
        In the future, there will be lots of ways to get involved in making things better, together. If you have any questions about Corporate Responsibility at RSA, contact 
        <a href='corporate.responsibility@gcc.rsagroup.com'>corporate.responsibility@gcc.rsagroup.com</a>.";
        $this->email->message($message);

        $this->email->attach('upload/' . $this->input->cookie('RSAemail') . "_full.png");

        $this->email->send();
    }

    public function perm_save()
    {
        $this->load->database();

        $query = "SELECT id FROM users WHERE email_address='" . $this->input->cookie('RSAemail') . "'";
        $exists = $this->db->query($query)->result_array();

        if(empty($exists))
        {
            $query = "INSERT INTO users(name,email_address,last_used,language_id,head_pic,body_id,legs_id,full_pic)
                        VALUES ('" . $this->input->cookie('RSAname') . "','" .
                                    $this->input->cookie('RSAemail') . "'," .
                                    time() . ",'" .
                                    $this->input->cookie('RSAlanguage') . "','" .
                                    $this->input->cookie('RSApicture') . "','" .
                                    $this->input->cookie('RSAbody') . "','" .
                                    $this->input->cookie('RSAlegs') . "','" .
                                    $this->filename . "')";
        }
        else
        {
            $query = "UPDATE users
                      SET name = '" . $this->input->cookie('RSAname') . "',
                          last_used = " . time() . ",
                          language_id = '" . $this->input->cookie('RSAlanguage') . "',
                          head_pic = '" . $this->input->cookie('RSApicture') . "',
                          body_id = '" . $this->input->cookie('RSAbody') . "',
                          legs_id = '" . $this->input->cookie('RSAlegs') . "',
                          full_pic = '" . $this->filename . "'
                      WHERE id = " . $exists[0]['id'];
        }

        $this->db->query($query);
    }
}
