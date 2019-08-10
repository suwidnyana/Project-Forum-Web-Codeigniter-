<?php
    class Posts extends CI_Controller
    {
        public function index($offset = 0)
        {
            //Pagination Config
            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');

            //Init Pagination
            $this->pagination->initialize($config);

            $data['title'] = 'Latest Post';

            $data['posts'] = $this->posts_model->get_posts(FALSE, $config['per_page'], $offset);
          

            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
           $data['post'] = $this->posts_model->get_posts($slug);

           $post_id = $data['post']['id'];

           $data['comments'] = $this->comments_model->get_comments($post_id);
            
     
               
			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
        }

        public function create()
        {
            //Check Login
             if(!$this->session->userdata('logged_in')){
                 redirect('users/login');
             }


            $data['title'] = 'Create Post';

            $data['categories'] = $this->posts_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_rules('category_id', 'Category Id', 'required');


            if($this->form_validation->run() === FALSE) { // jika form validation jalan halaman tetap di posts/create
                $this->load->view('templates/header');
                $this->load->view('posts/create',$data);
                $this->load->view('templates/footer');

            } else {
                //upload image
                $config['upload_path'] = './assets/images/posts/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);
                
               
                if(!$this->upload->do_upload()){
                    die($this->upload->display_errors());
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->posts_model->create_posts($post_image); //jika data yg diinput benar redirect ke halaman posts/index
                
                $this->session->set_flashdata('post_created','Postingan Anda Telah Dibuat');
                redirect('posts');
            }
            
        }

        public function delete($id){
            //Check Login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->posts_model->delete_post($id);

            $this->session->set_flashdata('post_deleted','Postingan Anda Telah Dihapus');

            redirect('posts');
        }

        public function edit($slug){
    
            //Check Login
           if(!$this->session->userdata('logged_in')){
            redirect('users/login');
            }

            $data['post'] = $this->posts_model->get_posts($slug);
            
            //Check Login
            if($this->session->userdata('user_id') != $this->posts_model->get_posts($slug)['user_id']){
                redirect('posts');
            }

            $data['categories'] = $this->posts_model->get_categories();
            
            if(empty($data['post'])){
                show_404();
            }
            
            $data['title'] = 'Edit Post';
           

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

        }

        public function update(){
            //Check Login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

           $this->posts_model->update_post();

           $this->session->set_flashdata('post_updated','Postingan Anda Telah Diupdate');

           redirect('posts');
        }
    }
    