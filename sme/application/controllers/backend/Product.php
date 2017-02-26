<?php
class Product extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1/backend');
    }

    public function index(){
        $this->load->view('backend/product/index');
    }

    public function lists(){
        $data = array();
        $data['products'] = $this->core_model->find('ci_product', array('product_status'=>1));
        $this->load->view('backend/product/lists', $data);
    }

    public function update( $id='' ){
        if( $this->input->post('method') == TRUE ){
            $post = $this->input->post();

            $data = array();
            $data['date_updated'] = date('Y-m-d H:i:s');
            $data['unix_timestamp'] = time();

            $this->core_model->update('ci_product', $post, $data, array('id'=>$post['id']));
            redirect('backend/product/lists');
        }else{
            if(!empty($id)){
                $func = new func();
                $data = array();
                $id = $func->decrypt($id, ENCRYPT_KEY);
                $data['product'] = $this->core_model->findOne('ci_product', array('id'=>$id));
                $this->load->view('backend/product/update', $data);
            }
        }
    }

    public function addProduct(){
        $this->output->unset_template();
        $data_file = array();
        $image_field = '';
        foreach($_FILES as $index => $file){
            $data_file = $this->doupload($index);
            $image_field = $index;
        }

        $data = array();
        $data['date_created'] = date('Y-m-d H:i:s');
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['unix_timestamp'] = time();

        $insert_file = $this->core_model->insert('ci_upload', $data_file, $data);
        $data[$image_field] = $insert_file['insert_id'];
        $post = $this->input->post();

        $res = $this->core_model->insert('ci_product', $post, $data );
        if($res['effect_row'] == 1){
            redirect('backend/product');
        }else{
            print_r($res);
        }
    }

    public function doupload($file) {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/'; //Use relative or absolute path
        $config['file_name'] = date('dmyhis');
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = '8192';
        $config['max_width'] = '2560';
        $config['max_height'] = '1600';
        $config['overwrite'] = FALSE; //If the file exists it will be saved with a progressive number appended
        //Initialize
        $this->upload->initialize($config);

        $data = array();
        //Upload file
        if (!$this->upload->do_upload($file)) {
            //echo the errors
            $data['error'] = $this->upload->display_errors();
        }

        //If the upload success
        $file_name = $this->upload->file_name;
        $data['file_name']     = $this->upload->data('file_name');
        $data['file_type']     = $this->upload->data('file_type');
        $data['file_path']     = $this->upload->data('file_path');
        $data['full_path']     = $this->upload->data('full_path');
        $data['raw_name']      = $this->upload->data('raw_name');
        $data['orig_name']     = $this->upload->data('orig_name');
        $data['client_name']   = $this->upload->data('client_name');
        $data['file_ext']      = $this->upload->data('file_ext');
        $data['file_size']     = $this->upload->data('file_size');
        $data['is_image']      = $this->upload->data('is_image');
        $data['image_width']   = $this->upload->data('image_width');
        $data['image_height']  = $this->upload->data('image_height');
        $data['image_type']    = $this->upload->data('image_type');
        $data['image_size_str'] = $this->upload->data('image_size_str');

        return $data;
    }
}