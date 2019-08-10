<?php 
    class Categories extends CI_Controller{
        
        public function index(){
            $data['title'] = 'Categories';

            $data['categories'] = $this->category_model->get_categories();
            
            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }


        public function create()
        {
            //Check Login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->category_model->create_category();

                $this->session->set_flashdata('category_created','Kategori Anda Telah Dibuat');

                redirect('categories');
            }
        }

        public function posts($id){
            $data['title'] = $this->category_model->get_category($id)->name;

            $data['posts'] = $this->posts_model->get_posts_by_category($id);
            
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }


        public function delete($id){
            //Check Login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->category_model->delete_category($id);

            $this->session->set_flashdata('category_deleted','Kategori Anda Telah Dihapus');

            redirect('categories');
        }
    }


?>