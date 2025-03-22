<?php $session = $_SESSION['userdata']; ?>
<div class="conatiner-fluid content-inner pb-0">
   <div class="row justify-content-center mb-5">

      <!-- </?php
            echo '<pre>';
            print_r($session);
            ?> -->
      <div class="col-lg-9">
         <form action="<?php echo base_url('create_payroll/generate_payroll'); ?>" method="POST" id="submit-payroll"
            enctype="multipart/form-data">
            <div class="row">
               <div class="col-lg-6">
                  <label for="sales_representative" class="form-label">Sales Representative</label>
                  <div class="input-group mb-3">
                     <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-person" viewBox="0 0 16 16">
                           <path
                              d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zM1.5 14c0-1.625 3.75-2.5 6.5-2.5s6.5.875 6.5 2.5v1c0 .25-.25.5-.5.5h-12c-.25 0-.5-.25-.5-.5v-1z" />
                        </svg>
                     </span>
                     <select type="text" class="form-control" name="sales_representative" id="sales_representative"
                        required>
                        <option value="">Select a Sales Representative</option> <!-- Empty default option -->
                        <?php foreach ($user as $row) { ?>
                           <option value="<?php echo $row->sales_rep_name ?>"><?php echo $row->sales_rep_name ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="mb-3">
                     <label for="datePeriod" class="form-label">Date Period</label>
                     <div class="row g-2">
                        <div class="col">
                           <select class="form-select" id="monthSelect" name="month">
                              <!-- Month options will be added dynamically -->
                           </select>
                        </div>
                        <div class="col">
                           <input type="number" class="form-control" id="yearInput" name="year" placeholder="Year">
                        </div>
                        <div class="col">
                           <select class="form-select" id="weekSelect" name="week" required>
                              <!-- Week options will be added dynamically based on month and year -->
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <label for="bonuses" class="form-label">Bonuses</label>
                  <div class="input-group mb-3">
                     <span class="input-group-text">$</span>
                     <input type="number" class="form-control" name="bonuses" required>
                  </div>
               </div>
               <div class="col-lg-6">
                  <label for="numberOfClients" class="form-label">Number of Clients</label>
                  <div class="input-group mb-3">
                     <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-person" viewBox="0 0 16 16">
                           <path
                              d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zM1.5 14c0-1.625 3.75-2.5 6.5-2.5s6.5.875 6.5 2.5v1c0 .25-.25.5-.5.5h-12c-.25 0-.5-.25-.5-.5v-1z" />
                        </svg>
                     </span>
                     <input type="number" class="form-control" name="numberOfClients" id="numberOfClients" required>
                  </div>
               </div>


            </div>
            <div class="row justify-content-center">
               <div id="clientInputsContainer" class="col-lg-4">
                  <!-- Client name and commission inputs will be dynamically added here -->
               </div>
            </div>

            <div class="row justify-content-center d-flex">
               <div class="col-lg-5 text-center">
                  <button type="submit" class="btn btn-danger">Create Payroll</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <div class="row justify-content-center">

      <!-- </?php
            echo '<pre>';
            print_r($session);
            ?> -->
      <div class="col-lg-9">
         <h3>After Creating a payroll it would generate a pdf.</h3>
      </div>
   </div>
</div>