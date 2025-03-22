<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index() {
        if (isset($_SESSION['userdata'])) {
            $session = $_SESSION['userdata'];
            if ($session->user_type == "1") {
                $this->home_load_page('home');
            } else {
                redirect(base_url());
            }
        } else redirect(base_url('errors'));
    }

	function send_email()  {
        $from_email = $_POST['from_email'];
        $to_email = $_POST['to_email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $data = array(
            'from_email' => $from_email,
            'to_email' => $to_email,
            'subject' => $subject,
            'message' => $message
        );

        $to = "$to_email";
        $subject = "$subject";
        $message = "$message";
        $headers = "From: $from_email";

        // Command to send email in the background (replace with your mail() function call)
        $command = "php -r 'mail(\"$to\", \"$subject\", \"$message\", \"$headers\");' > /dev/null 2>&1 &";

        // Execute the command in the background
        exec($command);

        $result = insert('send_email_history', $data);
        if ($result) {
            response(status_res('success'), "", "Success.");
        } else {
            response(status_res('fail'), "", "Failed.");
        }
    }

    function add_new_sales_rep()  {
        $sales_rep_name = $_POST['sales_rep_name'];
        $sales_rep_com_per = $_POST['sales_rep_com_per'];
        $sales_rep_tax_rate = $_POST['sales_rep_tax_rate'];
        $sales_rep_bonuses = $_POST['sales_rep_bonuses'];

        $data = array(
            'sales_rep_name' => $sales_rep_name,
            'sales_rep_com_per' => $sales_rep_com_per,
            'sales_rep_tax_rate' => $sales_rep_tax_rate,
            'sales_rep_bonuses' => $sales_rep_bonuses
        );

        $result = insert('sales_rep_profile', $data);
        if ($result) {
            response(status_res('success'), "", "Success.");
        } else {
            response(status_res('fail'), "", "Failed.");
        }
    }


} ?>
