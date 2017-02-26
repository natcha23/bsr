<?php
class Addup extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1/backend');
    }

    public function index(){
        $this->load->view('backend/addup/index');
    }

    public function lists(){
        $data = array();
        $data['addups'] = $this->core_model->find('ci_addup', array('addup_status'=>1));
        $this->load->view('backend/addup/lists', $data);
    }

    public function update( $id='' ){
        if( $this->input->post('method') == TRUE ){
            $post = $this->input->post();

            $data = array();
            $data['date_updated'] = date('Y-m-d H:i:s');
            $data['unix_timestamp'] = time();

            $this->core_model->update('ci_addup', $post, $data, array('id'=>$post['id']));
            redirect('backend/addup/lists');
        }else{
            if(!empty($id)){
                $func = new func();
                $data = array();
                $id = $func->decrypt($id, ENCRYPT_KEY);
                $data['addup'] = $this->core_model->findOne('ci_addup', array('id'=>$id));
                $this->load->view('backend/addup/update', $data);
            }
        }
    }

    public function addAddup(){
        $this->output->unset_template();
        $post = $this->input->post();
        $data = array();

        $data['date_created'] = date('Y-m-d H:i:s');
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['unix_timestamp'] = time();

        $res = $this->core_model->insert('ci_addup', $post, $data );
        if($res['effect_row'] == 1){
            redirect('backend/addup');
        }else{
            print_r($res);
        }
    }
}