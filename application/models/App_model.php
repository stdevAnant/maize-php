<?php

class App_model extends CI_Model
{

    public function getAnalysis($code, $image)
    {
        $data = array("code" => "");
        $data['code']   = $code;
        // $data['password'] = $password;
        $query = $this->db->get_where('analysis', $data);
        $this->load->helper('url');
        $this->load->library('session');

        $resultId = $query->row_array()['id'];

        $historyData = array(
            "user_id" => "",
            "result_id" => "",
            "imageUrl" => "",
        );
        $this->load->library('session');
        $this->load->helper('url');
        $historyData['user_id'] = $this->session->userdata('userIdDb');
        $historyData['result_id'] = $resultId;
        $historyData['imageUrl'] = $image;

        $this->addHistory($historyData);
        return $query->row_array();
    }

    public function addHistory($data)
    {

        $bl = $this->db->insert('history', $data);
        if (!$bl && $this->db->_error_number() == 1062) {
            print_r($this->db->_error_number());
        } else {
            return $bl;
        }
    }

    public function getHistory()
    {
        $data = array("user_id" => "");
        $this->load->library('session');
        $this->load->helper('url');
        $data['user_id'] = $this->session->userdata('userIdDb');
        // $data['password'] = $password;
        $query = $this->db->from('history');
        $query = $this->db->where('user_id', $data['user_id']);
        $query = $this->db->join('analysis', 'analysis.id = history.result_id');
        $query = $this->db->get();
        return $query->result();
    }
}
