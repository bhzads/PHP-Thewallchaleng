<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function load()
    {
        $this->load->model('usermodel');
        return $this->usermodel;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function isEmailExist($value)
    {
        if( $this->load()->hasUser($value) )
        {
            return true;
        }
        $this->form_validation->set_message('isEmailExist', 'This user does not exist! Please register.');
        return false;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function isPasswordExist($value)
    {
        if( $this->load()->usermodel->isUserValid($value) )
        {
            return true;
        }
        $this->form_validation->set_message('isPasswordExist', 'invalid password please try again.');
        return false;
    }


    public function login()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[9]|callback_isPasswordExist');
        $this->form_validation->set_rules('email', 'Email',
            'trim|required|valid_email|callback_isEmailExist');

        $isUser = $this->session->userdata('user');

        if ($this->form_validation->run() == FALSE)
        {
            $errors = validation_errors();
            $this->load->view('register_view', [
                'errors' => $errors,
                'success' => $this->session->flashdata('success_message'),
                'user' => $isUser
                
            ]);
            
        }
        else
        {
            $this->session->set_userdata(
                'user',
                $this->load()->getUserByEmail($this->input->post('email'))
        );

            redirect('/');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|regex_match[/^[a-zA-Z \.]+$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[9]');
        $this->form_validation->set_rules('conf-password', 'Password Confirmation', 'trim|matches[password]');

        $postData = $this->input->post(null, true);
        $isUser = $this->session->userdata('user');

        if ( $this->form_validation->run() == FALSE)
        {
            $errors = validation_errors();
            $this->load->view('register_view', [
                'errorsMsg' => $errors,
                'success' => $this->session->flashdata('success_message'),
                'user' => $isUser
            ]);
        }
        else
        {
            $data = array(
                'fullname' => $postData['fullname'],
                'email' => $postData['email'],
                'password' => $this->encryption->encrypt($postData['password'])
            );

            //            unset($postData['conf-password']);
            //            unset($postData['signin']);
            $this->load()->addUser($data);
            $this->session->set_flashdata('success_message', 'Your registration has been done.' );
            redirect('/register');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
