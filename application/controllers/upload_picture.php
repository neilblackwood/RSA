<?php

class Upload_Picture extends MY_Controller
{
	public function index()
	{
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $allowedMimes = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
            $fileHandle = "image";

            $extension = strtolower(end(explode(".", $_FILES[$fileHandle]["name"])));

            $message = null;
            switch( $_FILES[$fileHandle]['error'] ) {
            case UPLOAD_ERR_OK:
                $message = false;
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $message .= ' - file too large (limit of test bytes).';
                break;
            case UPLOAD_ERR_PARTIAL:
                $message .= ' - file upload was not completed.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $message .= ' - zero-length file uploaded.';
                break;
            default:
                $message .= ' - internal error #'.$_FILES['newfile']['error'];
                break;
        }
        echo $message;

            // check types
            if (in_array($_FILES[$fileHandle]["type"], $allowedMimes) &&
                in_array($extension, $allowedExts) &&
                $_FILES[$fileHandle]["error"] == 0)
            {
                    $uploadPath = "upload/";
                    if(!is_dir($uploadPath)) //create the folder if it's not already exists
                    {
                      $oldmask = umask(0);
                      mkdir($uploadPath, 0777);
                      umask($oldmask);
                    }

                    //$fileName = $_FILES[$fileHandle]["name"];
                    $fileName = $_POST['token'] . "." . $extension;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $_FILES[$fileHandle]["tmp_name"];
                    $config['new_image'] = $uploadPath . $fileName;
                    $config['maintain_ratio'] = FALSE;
                    //$config['width'] = $this->config->item('image_width');
                    //$config['height'] = $this->config->item('image_height');
                    //$config['x-axis'] = 0;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);

                    if (file_exists($uploadPath . $fileName)) unlink($uploadPath . $fileName);

                    $this->image_lib->resize();

                    echo $config['new_image'];
            }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */