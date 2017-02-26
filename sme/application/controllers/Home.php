<?php
class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        require_once APPPATH.'third_party/omise/lib/Omise.php';
        define('OMISE_API_VERSION', '2015-11-17');
        // define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
        // define('OMISE_SECRET_KEY', 'SECRET_KEY');
        define('OMISE_PUBLIC_KEY', 'pkey_test_54v9vcuv6p4bfwmk21l');
        define('OMISE_SECRET_KEY', 'skey_test_54v9vcuv8b8zwx6f098');
        $this->init();
    }

    private function init(){
        $this->output->set_template('template1');
        $this->load->js('assets/js/Omisejs/omise.js');
    }

    public function index(){
        $this->load->view('home/index');
    }

    public function omise(){
        $this->load->view('home/test_omise');
    }

    public function email(){
        $this->load->view('home/test_email');
    }

    public function page1(){
        $data = array();
        $this->load->view('home/page1', $data);
    }

    public function page2(){
        $this->load->view('home/page2', array('data'=>'5555'));
    }

    public function createCard(){
        $this->output->unset_template();
        $charge = OmiseCharge::create(array(
            'amount' => (int)$this->input->post('amount') * 100,
            'currency' => 'thb',
            'card' => $this->input->post('token_id')
        ));

        if ($charge['status'] == 'successful') {
            echo 'Success';
            print('<pre>');
            print_r($charge);
            print('</pre>');
        } else {
            echo 'Fail';
        }
    }

    public function sendEmail(){
        $to = $this->input->post('to');

        $subject = 'This is a test';
        $message = '<p>This message has been sent for testing purcccposes.'. date('Y-m-d H:i:s') .'</p>';

        // Get full html:
        $data = array(
            'userName'=> 'Mr.Sender Email'
        );
        $body = $this->load->view('home/test_email_template.php', array('to'=>$to), TRUE);
        // Also, for getting full html you may use the following internal method:
        // $body = $this->email->full_html($subject, $message);

        $result = $this->email
            ->from('me@gmail.com')
            //->reply_to('vbj.555@gmail.com')    // Optional, an account where a human being reads.
            ->to($to)
            ->subject($subject)
            ->message($body)
            ->send();

//        var_dump($result);
//        echo '<br />xx';
//        echo $this->email->print_debugger();
        redirect('home/email');
    }
}