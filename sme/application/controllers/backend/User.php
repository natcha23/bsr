<?php
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1/backend');
    }

    public function index(){
        $this->load->view('backend/user/index');
    }

    public function lists(){
        $data = array();
        $data['users'] = $this->core_model->find('ci_user', array('user_status'=>1));
        $this->load->view('backend/user/lists', $data);
    }

    public function update( $id='' ){
        if( $this->input->post('method') == TRUE ){
            $post = $this->input->post();

            $data = array();
            $data['date_updated'] = date('Y-m-d H:i:s');
            $data['unix_timestamp'] = time();

            $this->core_model->update('ci_user', $post, $data, array('id'=>$post['id']));
            redirect('backend/user/lists');
        }else{
            if(!empty($id)){
                $func = new func();
                $data = array();
                $id = $func->decrypt($id, ENCRYPT_KEY);
                $data['user'] = $this->core_model->findOne('ci_user', array('id'=>$id));
                $this->load->view('backend/user/update', $data);
            }
        }
    }

    public function addUser(){
        $this->output->unset_template();
        $post = $this->input->post();
        $data = array();

        $password = $post['user_password'];
        $hashed_password = $this->bcrypt->hash($password);

        $data['user_password'] = $hashed_password;
        $data['user_role'] = 'user';
        $data['date_created'] = date('Y-m-d H:i:s');
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['unix_timestamp'] = time();

        $res = $this->core_model->insert('ci_user', $post, $data );
        if($res['effect_row'] == 1){
            redirect('backend/user');
        }else{
            print_r($res);
        }

//        redirect('backend/user');
//        echo $hashed_password;
//        echo '<br>';
//        $chk_pass = $this->bcrypt->compare('adminsmx', $hashed_password);
//        if($chk_pass == TRUE){
//            echo 'pass ok';
//        }else{
//            echo 'pass not ok';
//            redirect('backend/user');
//        }
    }
}