<?php
class Promotion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1/backend');
        $this->load->js('assets/js/datepicker/bootstrap-datepicker.js');
        $this->load->css('assets/css/datepicker/datepicker3.css');
    }

    public function index(){
        $this->load->view('backend/promotion/index');
    }

    public function lists(){
        $data = array();
        $data['promotions'] = $this->core_model->find('ci_promotion', array('pro_status'=>1));
        $this->load->view('backend/promotion/lists', $data);
    }

    public function update( $id='' ){
        if( $this->input->post('method') == TRUE ){
            $post = $this->input->post();

            $data = array();
            $data['date_updated'] = date('Y-m-d H:i:s');
            $data['unix_timestamp'] = time();

            $this->core_model->update('ci_promotion', $post, $data, array('id'=>$post['id']));
            redirect('backend/promotion/lists');
        }else{
            if(!empty($id)){
                $func = new func();
                $data = array();
                $id = $func->decrypt($id, ENCRYPT_KEY);
                $data['pro'] = $this->core_model->findOne('ci_promotion', array('id'=>$id));
                $this->load->view('backend/promotion/update', $data);
            }
        }
    }

    public function addPromotion(){
        $this->output->unset_template();
        $post = $this->input->post();
        $data = array();

        $data['date_created'] = date('Y-m-d H:i:s');
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['unix_timestamp'] = time();

        $res = $this->core_model->insert('ci_promotion', $post, $data );
        if($res['effect_row'] == 1){
            redirect('backend/promotion');
        }else{
            print_r($res);
        }
    }
}