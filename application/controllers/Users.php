<?php
    class Users extends CI_Controller{


        public function register(){
            $data['title'] = 'Daftar';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('zipcode','Zipcode', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() ===  FALSE){

                $this->load->view('templates/header');
                $this->load->view('users/register' ,$data);
                $this->load->view('templates/footer');

            }else {
                // Enkripsi Password
                $enc_password = sha1($this->input->post('password'));

                $this->user_model->register($enc_password);

                //Pesan 
                $this->session->set_flashdata('user_registered', 'Berhasil daftar dan Sekarang Bisa Login');
                redirect('users/login');
            }


        }

        //Cek Apakah Ada Username 
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That Username is Taken, Please Choose A Different One');

            if($this->user_model->check_username_exists($username)){
                    return true;
            }else {
                return false;
            }
        }

        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'That Email is Taken, Please Choose A Different One');

            if($this->user_model->check_email_exists($email)){
                    return true;
            }else {
                return false;
            }
        }

        //login
        public function login()
        {
            
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() ===  FALSE){

                $this->load->view('templates/header');
                $this->load->view('users/login' ,$data);
                $this->load->view('templates/footer');

            }else {

                //Get Username
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));

                //Login User
                $user_id = $this->user_model->login($username, $password);

                if($user_id)
                {
                    //Buat Sesi
                $user_data = array(
                    'user_id' => $user_id,
                    'usernama' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);    

                $this->session->set_flashdata('user_loggedin', 'Berhasil Login');
                
                redirect('posts');

                } else {

                //Pesan 
                $this->session->set_flashdata('login_failed', 'Gagal Login');

                redirect('users/login');

                };
            }


        }
        //Logout
        public  function logout(){

            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_logout', 'Berhasil Logout');
                
            redirect('users/login');

        }
    }


   

?>