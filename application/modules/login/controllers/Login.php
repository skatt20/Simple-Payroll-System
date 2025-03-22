<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function index() {
        if (isset($_SESSION['userdata'])) {
            $session = $_SESSION['userdata'];
            if ($session->user_type == 1) redirect(base_url('home'));
            if ($session->user_type == 2) redirect(base_url('ceo_dashboard'));
        }
        $this->login_load_page('login');
    }
    public function userAuth() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $options['where'] = array(
            'username' => $username,
            'password' => $password,
            'user_status' => 1,
        );

        $result = getrow('sales_rep_users', $options, 'row');

        if ((bool)$result === true) {
            $this->session->set_userdata('userdata', $result);
            response(status_res('success'), "", "You have successfully logged in.");
        } else {
            response(status_res('fail'), "", "Password does not match in our database.");
        }
    }

    function logout()
    {
        if (!$_SESSION['userdata']) {
            redirect(base_url());
        } else {
            session_destroy();
            response(status_res('success'), "", "You have been logged out.");
        }
    }
}
