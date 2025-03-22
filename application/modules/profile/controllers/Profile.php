<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	public function index() {
        if (isset($_SESSION['userdata'])) {
            $session = $_SESSION['userdata'];
            if ($session->user_type == "1") {
                $this->home_load_page('profile');
            } else {
                redirect(base_url());
            }
        } else redirect(base_url('errors'));
    }

	public function salesAccount() {
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $select = "*";
        $column_order = array(
            'sales_rep_name', 'sales_rep_com_per', 'sales_rep_tax_rate', 'sales_rep_bonuses'
        );
        $join = array(
            // 'tbl_clientstatus' => 'tbl_users.user_id = tbl_clientstatus.fk_user_id'
        );
        $where = array(
            // 'user_type' => 4
        );
        $list = datatables('sales_rep_profile', $column_order, $select, $where, $join, $limit, $offset, $search, $order);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $list['count_all'],
            "recordsFiltered" => $list['count'],
            "data" => $list['data'],
        );
        json($output);
    }


} ?>
