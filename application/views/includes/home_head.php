<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Online Insure Payroll System</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/jrc_logo.png">

  <!-- Library / Plugin Css Build -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/core/libs.min.css">


  <!-- Hope Ui Design System Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/hope-ui.min.css?v=4.0.0">

  <!-- Custom Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.min.css?v=4.0.0">

  <!-- Dark Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/dark.min.css">

  <!-- Customizer Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/customizer.min.css">

  <!-- RTL Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/rtl.min.css">
  <style>
    .navbar-nav .nav-link,
    .navbar-nav .dropdown-menu .dropdown-item,
    .navbar-nav .mt-auto .nav-link {
      color: white !important;
    }

    .dropdown-menu {
      background-color: #12afcb !important;
    }
  </style>
</head>

<body class="  ">
  <span class="screen-darken"></span>
  <!-- loader Start -->
  <div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body">
      </div>
    </div>
  </div>
  <!-- loader END -->
  <main class="main-content">
    <!--Nav Start-->
    <nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #12afcb;">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ms-auto me-3"> <!-- Add ms-auto for margin-right -->
              <a class="nav-link" href="<?= base_url(''); ?>">Onlineinsure Payroll System</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url(''); ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="salesrepDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salesrep
              </a>
              <ul class="dropdown-menu" aria-labelledby="salesrepDropdown">
                <li><a class="dropdown-item" href="<?= base_url('profile'); ?>">Salesrep Profile</a></li>
                <li>
                  <a class="dropdown-item" href="#">
                    Add Salesrep Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <form method="POST" id="sales_rep" class="dropdown-item">
                    <div class="mb-3">
                      <label for="sales_rep_name" class="form-label">Salesrep Name</label>
                      <input type="text" class="form-control" name="sales_rep_name">
                    </div>
                    <div class="mb-3">
                      <label for="sales_rep_com_per" class="form-label">Set Commission Percentage</label>
                      <input type="number" class="form-control" name="sales_rep_com_per">
                    </div>
                    <div class="mb-3">
                      <label for="sales_rep_tax_rate" class="form-label">Tax Rate</label>
                      <input type="number" class="form-control" name="sales_rep_tax_rate">
                    </div>
                    <div class="mb-3">
                      <label for="sales_rep_bonuses" class="form-label">Bonuses</label>
                      <input type="number" class="form-control" name="sales_rep_bonuses">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Salesrep</button>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('create_payroll'); ?>">Create Payroll</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pdf_page'); ?>">PDFs</a>
            </li>
            <li class="nav-item mt-auto ml-4"> 
              <a class="nav-link" href="javascript:void(0)" id="sales_rep_logout">Logout</a>
            </li>
          </ul>

        </div>
      </div>

    </nav>