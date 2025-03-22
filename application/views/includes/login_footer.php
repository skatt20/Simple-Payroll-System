    
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script> 
          var dis = this
          var base_url = '<?= base_url() ?>'; 
      </script>


    <!-- Library Bundle Script -->
    <script src="<?= base_url() ?>assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="<?= base_url() ?>assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="<?= base_url() ?>assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="<?= base_url() ?>assets/js/charts/vectore-chart.js"></script>
    <script src="<?= base_url() ?>assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="<?= base_url() ?>assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="<?= base_url() ?>assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="<?= base_url() ?>assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="<?= base_url() ?>assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->
    <script src="<?= base_url() ?>assets/vendor/aos/dist/aos.js"></script>

    <!-- App Script -->
    <script src="<?= base_url() ?>assets/js/hope-ui.js" defer></script>


    <?php __load_assets__($__assets__, 'js'); ?>

    </body>

    </html>