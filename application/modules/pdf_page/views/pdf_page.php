      <?php $session = $_SESSION['userdata']; ?>
      <div class="conatiner-fluid content-inner pb-0">
         <div class="row">

            <?php foreach ($pdfs as $pdf) { ?>
               <div class="col-lg-2 col-md-6">
                  <a href="<?= base_url($pdf->sales_rep_path) ?>" target="_blank">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                 <h2 class="counter"><?= $pdf->pdf ?></h2>
                                 <?= $pdf->date ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
            <?php } ?>

            <!-- </?php
            echo '<pre>';
            print_r($pdfs);
            ?> -->

         </div>
      </div>