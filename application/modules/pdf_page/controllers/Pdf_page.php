<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_page extends MY_Controller {
	public function index() {
        if (isset($_SESSION['userdata'])) {
            $session = $_SESSION['userdata'];
            if ($session->user_type == "1") {

                $data['pdfs'] = $this->MY_Model->getRows('sales_rep_pdf', '', 'obj');

                $this->home_load_page('pdf_page', $data);
            } else {
                redirect(base_url());
            }
        } else redirect(base_url('errors'));
    }

	


} ?>
