<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class AppController extends BaseController
{


    public function dashboard()
    {
        $this->load->view('frames/head');
        $this->load_views('pages/dashboard/dashboard',null);
        $this->load->view('frames/footer');
    }

    public function history()
    {
        $this->load->model('app_model');
        $response = $response = $this->app_model->getHistory();
        $data = array(
            'historyRows' => '',
        );
        $data['historyRows']=$response; 
        $this->load->view('frames/head');
        $this->load_views('pages/dashboard/history',$data);
        $this->load->view('frames/footer');
    }
    

    public function getAnalysis(){
        
        $this->load->model('app_model');
        $response = $this->app_model->getAnalysis($this->input->get('code'),$this->input->get('imgSrc'));
        echo json_encode($response);
    }

    public function uploadData()
    {
        $configUpload['upload_path']    = './uploads/';                 #the folder placed in the root of project
        $configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
        $configUpload['max_size']       = '0';                          #max size
        $configUpload['max_width']      = '0';                          #max width
        $configUpload['max_height']     = '0';                          #max height
        $configUpload['encrypt_name']   = true;                         #encrypt name of the uploaded file
        $this->load->library('upload', $configUpload);                  #init the upload class
        if (!$this->upload->do_upload('uploadimage')) {
            $uploadedDetails    = $this->upload->display_errors();
        } else {
            $uploadedDetails    = $this->upload->data();
        }

        echo json_encode($uploadedDetails);
        // print_r($uploadedDetails);
        // die;
    }
}
