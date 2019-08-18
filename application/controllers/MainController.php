<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller
{

    public function index()
    {
        $isUser = $this->session->userdata('user');

        $this->load->model('postmodel');

        $this->load->view('index_view', [
            'user' => $isUser,
            'errorsPost' => $this->session->flashdata('errorsPost'),
            'successPost' => $this->session->flashdata('successPost'),
            'posts' => $this->postmodel->getAll(),
            'forbiddenUser' => $this->session->flashdata('forbiddenUser'),
            'eventPostId' => $this->session->flashdata('eventPostId'),
        ]);
    }
}
