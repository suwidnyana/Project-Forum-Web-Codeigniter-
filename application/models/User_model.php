<?php 
    class User_model extends CI_model{
        
        public function register($enc_password){
            $data =  array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'zipcode' => $this->input->post('zipcode'),
                'email' => $this->input->post('email'),
                'password' => $enc_password
            );

            // Masukan Data
            return $this->db->insert('users',$data);
        } 

        //Login
        public function login($username, $password){

            //Validasi
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1) {
                return $result->row(0)->id;            
            } else {
                return false;
            }

        }

        //Cek Username
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            
            if(empty($query->row_array())){
                return true;
            }else {
                return false;
            }
        }

        //Cek Email
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));

            if(empty($query->row_array())){
                return true;
            }else {
                return false;
            }
        }
    }


?>