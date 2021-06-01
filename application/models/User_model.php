<?php

class User_model extends CI_Model
{
    public function register($data)
    {

        $bl = $this->db->insert('users', $data);
        if (!$bl && $this->db->_error_number() == 1062) {
            print_r($this->db->_error_number());
        }
        else {
            return $bl;

        }
    }
    public function loginUserModel($email , $password){
    $data =array("email"=>"");
    $data['email']   = $email; 
    // $data['password'] = $password;
    $query = $this->db->get_where('users', $data);
    $this->load->helper('url');
    $this->load->library('session');
    if(count($query->result()) > 0){
        if (!password_verify($password, $query->result()[0]->password)){
            return 1;//invalid password
        }
        else{
            $this->session->set_userdata('userId', $query->result()[0]->email);
            $this->session->set_userdata('userIdDb', $query->result()[0]->id);
            return 2;//valid user
        }
    
    }
    else{
        return 0;//user does not exist
    }

}
}
