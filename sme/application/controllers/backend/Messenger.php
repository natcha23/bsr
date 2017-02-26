<?php
class Messenger extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1/backend');
    }

    public function index(){
        $data = array();
        $data['amphurs'] = $this->core_model->find('ci_amphurs', array('PROVINCE_ID'=>1));
        $this->load->view('backend/messenger/index', $data);
    }

    public function lists(){
        $data = array();
        $data['messengers'] = $this->core_model->find('ci_messenger', array('mes_status'=>1));
        $this->load->view('backend/messenger/lists', $data);
    }

    public function getDistrict(){
        $this->output->unset_template();
        $amphur_id = $this->input->post('amphur_id');
        $districts = $this->core_model->find('ci_districts', array('AMPHUR_ID'=>$amphur_id));
        echo json_encode($districts);
    }

    public function addMessenger(){
        $this->output->unset_template();
        $post = $this->input->post();
        $data = array();

        $data['date_created'] = date('Y-m-d H:i:s');
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['unix_timestamp'] = time();

        $res = $this->core_model->insert('ci_messenger', $post, $data );
        if($res['effect_row'] == 1){
            redirect('backend/messenger');
        }else{
            print_r($res);
        }
    }

    public function update( $id='' ){
        if( $this->input->post('method') == TRUE ){
            $post = $this->input->post();

            $data = array();
            $data['date_updated'] = date('Y-m-d H:i:s');
            $data['unix_timestamp'] = time();

            $this->core_model->update('ci_messenger', $post, $data, array('id'=>$post['id']));
            redirect('backend/messenger/lists');
        }else{
            if(!empty($id)){
                $func = new func();
                $data = array();
                $id = $func->decrypt($id, ENCRYPT_KEY);
                $data['messenger'] = $this->core_model->findOne('ci_messenger', array('id'=>$id));
                $data['amphurs'] = $this->core_model->find('ci_amphurs', array('PROVINCE_ID'=>1));
                $data['districts'] = $this->core_model->find('ci_districts', array('AMPHUR_ID'=>$data['messenger']['mes_amphur']));

                $this->load->view('backend/messenger/update', $data);
            }
        }
    }
}