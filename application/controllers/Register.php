<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    // LOAD MODEL MASUK
    $this->load->model('M_login');
  }
  
  public function index()
  {
    if($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in'))
    {
      $this->session->set_flashdata('warning', 'Anda telah masuk kedalam akun anda !');
      redirect(base_url());
    }else
    {
      $this->load->view('register');
    }
  }
  
  public function proses_daftar()
  {
    // ambil inputan dari view
    $nama           = htmlspecialchars($this->input->post('nama'));
    $no_telp        = htmlspecialchars($this->input->post('no_telp'));
    $email          = htmlspecialchars($this->input->post('email'));
    $password       = htmlspecialchars($this->input->post('password'));
    $password_conf  = htmlspecialchars($this->input->post('password_conf'));
    
    // cek apakah email telah ada
    if ($this->M_login->cek_user($email) == false) {
      
      // cek apakah password sama
      if ($password == $password_conf) {
        
        // ubah inputan view menjadi array
        $data_user = array(
          'NAMA'      => $nama,
          'NO_TELP'   => $no_telp,
          'EMAIL'     => $email,
          'PASSWORD'  => password_hash($password, PASSWORD_DEFAULT),
        );
        
        // masukkan ke database
        if ($this->M_login->add_user($data_user) == true) {
          $subject    = "Selamat bergabung - {$email}";
          $message    = "Hai, {$nama} selamat bergabung.</br></br></br></br>";
          
          $this->send_email($email, $subject, $message);
          
          $this->session->set_flashdata('success', "Berhasil mendaftaran akun anda, harap login untuk melanjutkan !");
          redirect(site_url('login'));
        } else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat mendaftarkan akun anda, harap coba lagi !");
          redirect(site_url('register'));
        }
        
        
      } else {
        $this->session->set_flashdata('warning', "Password yang anda masukkan tidak sama !");
        redirect(site_url('register'));
      }
      
    } else {
      $this->session->set_flashdata('warning', "Email atau username telah digunakan !");
      redirect(site_url('register'));
    }
    
  }
    
	// MAILER SENDER
    
    function send_email($email, $subject, $message){
        
        $mail = array(
            'to' 			=> $email,
            'subject'		=> $subject,
            'message'		=> $message
        );
        
        if ($this->mailer->send($mail) == TRUE) {
            return true;
        }else {
            return false;
        }
    }
}