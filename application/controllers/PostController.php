<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {

    public function load()
    {
        $this->load->model('postmodel');
        return $this->postmodel;
    }

    public function add()
    {
        $isUser = $this->session->userdata('user');
        if( empty($isUser) ) {
            redirect('/login');
        }

        $this->form_validation->set_rules('text', 'Message', 'trim|required');
        $postData = $this->input->post(null, true);

        if ( $this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errorsPost', validation_errors());
        }
        else
        {
            $postData['user_id'] = $isUser['id'];
            $this->load()->addPost($postData);
            $this->session->set_flashdata('successPost', "Your post is added.");
        }
        redirect('/');
    }

    public function deletpost($id)
    {
        $post = $this->load()->getPostById($id);

        $isUser = $this->session->userdata('user');
        if( empty($isUser) && $post['user_id'] !== $isUser['id'] ) {
            $this->session->set_flashdata('forbiddenUser', 'This action is forbidden');
        } else {
            $this->load->model('postmodel');
            $this->postmodel->delete($id);
        }
        redirect('/');
    }

    public function upvoetpost($id)
    {
        $post = $this->load()->getPostById($id);

        $isUser = $this->session->userdata('user');

            $this->load->model('postmodel');
            $this->postmodel->upvoet($id);

        redirect('/');
    }
}
