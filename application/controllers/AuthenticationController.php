<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthenticationController extends CI_Controller
{


    public function checkLogin()
    {
        $this->load->library('session');
        $this->load->helper('url');
        if ($this->session->userdata('userId') == null) {
            return 0;
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function login()
    {
        $this->checkLogin();
        $this->load->view('frames/head');
        $this->load->view('pages/login');
        $this->load->view('frames/footer');
    }

    public function logout()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect(base_url('dashboard'));
    }

    public function signup()
    {
        $this->load->view('frames/head');
        $this->load->view('pages/signup');
        $this->load->view('frames/footer');
    }

    public function authenticate()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'InputEmail',
            'Email',
            'trim|required|valid_email',
            array("is_unique" => "Email address is already taken")
        );
        $this->form_validation->set_rules('InputPassword', 'Password', 'callback_authEmail');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frames/head');
            $this->load->view('pages/login');
            $this->load->view('frames/footer');
        } else {

            redirect(base_url('/dashboard'));
        }
    }

    public function authEmail($str)
    {
        $this->load->model('user_model');
        $tl = $this->user_model->loginUserModel($this->input->post('InputEmail'), $this->input->post('InputPassword'));
        if ($tl == 0) {
            $this->form_validation->set_message('authEmail', 'The user does not exists');
            return FALSE;
        }
        if ($tl == 1) {
            $this->form_validation->set_message('authEmail', 'Invalid Password');
            return FALSE;
        }
        if ($tl == 2) {
            return TRUE;
        }
    }
    public function registerUser()
    {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'InputEmail',
            'Email',
            'trim|required|valid_email|is_unique[users.email]',
            array("is_unique" => "Email address is already taken")
        );
        $this->form_validation->set_rules('InputFirstName', 'First Name', 'trim|required');
        $this->form_validation->set_rules('InputLastName', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('InputPassword', 'Password', 'trim|required');
        $this->form_validation->set_rules(
            'RepeatPassword',
            'Password',
            'trim|required|matches[InputPassword]',
            array("matches" => "Passwords do not match")
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frames/head');
            $this->load->view('pages/signup');
            $this->load->view('frames/footer');
        } else {
            $this->load->model('user_model');
            $data['firstName'] = $this->input->post('InputFirstName');
            $data['LastName'] = $this->input->post('InputLastName');
            $data['email'] = $this->input->post('InputEmail');
            $data['password'] = password_hash($this->input->post('InputPassword'), PASSWORD_BCRYPT);
            try {
                $this->user_model->register($data);
                redirect(base_url('/login'));
                // redirect('/AuthenticationController/login');
            } catch (Exception $e) {
                print_r($e);
                redirect(base_url('/signup'));
                // redirect('/AuthenticationController/signup');
            }
        }
    }
}
