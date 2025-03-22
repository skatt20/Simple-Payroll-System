<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Create_payroll extends MY_Controller
{
    public function index()
    {
        if (isset($_SESSION['userdata'])) {
            $session = $_SESSION['userdata'];
            if ($session->user_type == "1") {

                $data['user'] = $this->MY_Model->getRows('sales_rep_profile', '', 'obj');
                usort($data['user'], function ($a, $b) {
                    return strcmp($a->sales_rep_name, $b->sales_rep_name); // Sort in ascending order based on fullname
                });

                $this->home_load_page('create_payroll', $data);
            } else {
                redirect(base_url());
            }
        } else redirect(base_url('errors'));
    }

    // function generate_payroll()
    // {
    //     $data['inputs'] = $_POST;
    //     $pdfname = $data['inputs']['sales_representative'];

    //     $this->load->library('pdf');
    //     $html = $this->load->view('payroll', $data, true);

    //     // For Signed Documents
    //     $email_path = "./assets/file_uploads/pdf/";
    //     $email_folder = create_date_folder($email_path);

    //     $attachment = $this->pdf->createPDFEmail($html, str_replace(' ', '_'), false, array(0, 0, 800, 680), '');
    //     $file_path = $email_folder['day'] .  $pdfname . '.pdf';

    //     file_put_contents($file_path, $attachment);

    //     $params = array(
    //         'pdf' => $data['inputs']['sales_representative'],
    //         'sales_rep_path' => $file_path,
    //         'date' => date('Y-m-d'),
    //     );
    //     $sql = $this->MY_Model->insert('sales_rep_pdf', $params);

    //     if ($sql != null) {

    //         redirect(base_url('/'.$file_path));
    //     }
    // }
    function generate_payroll()
    {
        $data['inputs'] = $_POST;
        $month = $_POST['month'];
        $year = $_POST['year'];
        $week = $_POST['week'];
        $bonuses = $_POST['bonuses'];
        $clientNames = array(); // Initialize an array to store client names
        $clientCommissions = array(); // Initialize an array to store client commissions

        // Check if numberOfClients is set in the POST data and is a valid number
        if (isset($_POST['numberOfClients']) && is_numeric($_POST['numberOfClients'])) {
            $numberOfClients = (int) $_POST['numberOfClients'];

            // Loop through the number of clients to retrieve client names and commissions
            for ($i = 1; $i <= $numberOfClients; $i++) {
                // Check if the client name and commission for this index exist in the POST data and are not empty
                if (
                    isset($_POST['clientName' . $i]) && !empty($_POST['clientName' . $i]) &&
                    isset($_POST['clientCommission' . $i]) && !empty($_POST['clientCommission' . $i])
                ) {
                    // Add the client name and commission to their respective arrays
                    $clientNames[] = $_POST['clientName' . $i];
                    $clientCommissions[] = $_POST['clientCommission' . $i];
                }
            }
        }

        // Calculate the total commission
        $totalCommission = array_sum($clientCommissions);

        // Calculate the total bonuses
        $totalBonuses = (!empty($bonuses) ? $bonuses : 0); // Assuming $bonuses contains the total bonuses

        // Calculate the total of commission and bonuses
        $totalAmount = $totalCommission + $totalBonuses;

        $pdfname = $data['inputs']['sales_representative'];

        // Fetch sales representative data from sales_rep_profile table
        $salesRepData = $this->MY_Model->getRows('sales_rep_profile', 'sales_rep_name, sales_rep_com_per', ['sales_rep_name' => $pdfname]);

        // echo '<pre>';
        // print_r($salesRepData);
        // echo '</pre>';
        // exit;

        $this->load->library('pdf');
        $html = $this->load->view(
            'payroll',
            [
                'pdfname' => $pdfname,
                'inputs' => $data['inputs'],
                'month' => $month,
                'year' => $year,
                'week' => $week,
                'bonuses' => $bonuses,
                'clientNames' => $clientNames,
                'clientCommissions' => $clientCommissions,
                'totalCommission' => $totalCommission,
                'totalAmount' => $totalAmount,
                'salesRepData' => $salesRepData,
                // 'salesRepName' => $salesRepName, // Include sales representative name
                // 'salesRepCommission' => $salesRepCommission, // Include sales representative commission
            ],
            true
        );


        // For Signed Documents
        $email_path = "./assets/file_uploads/pdf/";
        $email_folder = create_date_folder($email_path);

        $attachment = $this->pdf->createPDFEmail($html, str_replace(' ', '_'), false, array(0, 0, 800, 680), '');
        $file_path = $email_folder['day'] .  $pdfname . '.pdf';

        file_put_contents($file_path, $attachment);

        $params = array(
            'pdf' => $pdfname, // Update to use $pdfname directly
            'sales_rep_path' => $file_path,
            'date' => date('Y-m-d'),
        );
        $sql = $this->MY_Model->insert('sales_rep_pdf', $params);

        if ($sql != null) {
            redirect(base_url('/' . $file_path));
        }
    }
}
