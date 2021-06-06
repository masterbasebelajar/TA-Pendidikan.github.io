<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

// Function LOGIN
    public function index()
    {
        $data['title'] = 'LOGIN';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function ProsesLogin()
    {
       $username = $this->input->post('username');
       $password = $this->input->post('password');

        $this->load->model('M_login');

        $getUser = $this->M_login->getUser($username);
        // var_dump($getUser);die;
        
        // kondisi ketika login

        if(count($getUser) == 1){
            if(password_verify($password, $getUser[0]->password)){

                $dataSession = array(
                    "namalengkap" => $getUser[0]->namalengkap,
                    "username" => $getUser[0]->username,
                    "isActive" => $getUser[0]->isActive,
                    "akses" => $getUser[0]->akses,
                    "isLoggin" => true
                    // true = 1
                );
                $this->session->set_userdata($dataSession);

                if($getUser[0]->isActive == 1){
                    if($getUser[0]->akses == 1){
                        redirect('users');
                    }elseif($getUser[0]->akses == 2){
                        redirect('tbmakanan');
                    }
                }elseif($getUser[0]->isActive == 0){
                    $data['title'] = 'LOGIN';
                    $data['peringatan'] = "Anda harus aktivasi akun atau hubungi admin.";
                    
                    $this->load->view('templates/auth_header', $data);
                    $this->load->view('auth/v_gagallogin', $data);
                    $this->load->view('templates/auth_footer');
                }
            }else{
                $data['title'] = 'LOGIN';
                $data['peringatan'] = "Password Anda salah!.";
                    
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/v_gagallogin', $data);
                $this->load->view('templates/auth_footer');
            }
        }elseif(count($getUser) == 0){
            $data['title'] = 'LOGIN';
            $data['peringatan'] = "Anda belum terdaftar!";
            
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/v_gagallogin', $data);
            $this->load->view('templates/auth_footer');
            // echo "Akun belum terdaftar!";
        }
        else{
            echo "<script>
            alert('Username Tidak Tepat!');
            window.location.href='". base_url() ."auth';
            </script>";
        }
        // var_dump($getUser);die;
    }

// REGISTRASI

    public function registration()
    {
        // Rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [
            'is_unique' => 'Username Sudah terpakai!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email Sudah digunakan!'
        ]);
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $this->load->model('M_register');

            $data['namalengkap'] = $this->input->post('namalengkap');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $password = $this->input->post('password1');
            $data['akses'] = 0;
            $data['isActive'] = 0;
            $password2 = $this->input->post('password2');
    
            // validasi
            if($password == $password2){
                // echo "Password sama!";
                $options = [
                    'cost' => 5,
                ];
                // echo password_hash($password, PASSWORD_DEFAULT, $options);
    
                $data['password'] = password_hash($password, PASSWORD_DEFAULT, $options);
                echo "<script>
                alert('Berhasil Mendaftar!');
                window.location.href='". base_url() ."auth';
                </script>";
                $this->M_register->insertUser($data);
            }
            else{
                echo "<script>
                alert('Password Tidak Sama!');
                window.location.href='". base_url() ."auth/registration';
                </script>";
            }
        }

    }

    // public function prosesRegister()
    // {
        
    // }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('akses');
        redirect('auth');
    }

    // public function testSession()
    // {
    //     if($this->session->has_userdata('isLoggin') == true){
    //         echo "Success Test Session";
    //     }else{
    //         echo "Gagal Test Session";
    //     }
    // }
}