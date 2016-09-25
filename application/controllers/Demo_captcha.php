<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo_captcha extends CI_Controller
{

    public function index()
    {
        // memanggil / meload library yang dibutuhkan (library recaptcha & form validation)
        $this->load->library(array('recaptcha', 'form_validation'));
       // memanggil helper yang diperlukan (helper form)
        $this->load->helper('form');

        // Set rule/aturan validasi
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // validasi untuk google recaptcha
        // pada parameter ketiga 'callback_get_response_captcha' artinya kita tidak menggunakan rule validasi bawaan dari library form validation
        // tetapi kita membuat custom validasi yang terdapat pada method get_response_captcha
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_get_response_captcha');
        
        // men-set pesan error ketika validasi bernilai false (error)
        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('valid_email', 'Alamat %s tidak valid');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        //ketika validasi bernilai true (validasi benar)
        if($this->form_validation->run() == TRUE)
        {
          // print/cetak pesan sukses mendaftar
        	echo 'Selamat, Anda berhasil mendaftar. <a href="'.site_url('demo_captcha/index').'">kembali ke form</a>';
        }
        // jika validasi bernilai false
        else 
        {          
          //load ulang form register beserta pesan error validasinya.
        	$data['recaptcha_html'] = $this->recaptcha->render();
        	$this->load->view('demo-captcha', $data);
        }     
    }

    public function get_response_captcha($string)
    {
        //load library recaptcha
        $this->load->library('recaptcha');
        //mengambil response dari form dan memverifikasinya
        $response = $this->recaptcha->verifyResponse($string);
        
        //jika verifikasi benar
        if ($response['success']) {
            //kembalikan nilai true
            return true;
        //jika verifikasi salah
        } else {            
            //set pesan error untuk validasi recaptcha
            $this->form_validation->set_message('get_response_captcha', '%s harus diisi');
            //mengembalikan nilai false
            return false;
        }
    }

}

/* application/controllers/Demo_captcha.php */
