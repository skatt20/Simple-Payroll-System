      <?php $session = $_SESSION['userdata']; ?>
      <div class="conatiner-fluid content-inner pb-0">
         <div class="row justify-content-center">

            <div class="col-lg-4">
               <div class="container mt-5">
                  <h1>Send Email</h1>
                  <form method="POST" id="contactForm" action="send_email.php">
                     <div class="mb-3">
                        <label for="from_email" class="form-label">From</label>
                        <input type="email" class="form-control" id="from_email" name="from_email" required>
                     </div>
                     <div class="mb-3">
                        <label for="to_email" class="form-label">To</label>
                        <input type="email" class="form-control" id="to_email" name="to_email" required>
                     </div>
                     <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                     </div>
                     <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Send Message</button>
                  </form>

               </div>
            </div>

         </div>
      </div>