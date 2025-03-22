<div class="wrapper">
    <section class="login-content">
        <div class="row m-0 align-items-center vh-100">
            <div class="col-md-6 offset-md-3">
                <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                    <div class="card-body">
                        <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                            <!--Logo start-->
                            <img src="<?= base_url() ?>assets/images/jrc_logo.png" width="40" alt="">
                            <!--logo End-->
                            <h4 class="logo-title ms-3">Online Insure Payroll System</h4>
                        </a>
                        <h2 class="mb-2 text-center">Sign In</h2>
                        <p class="text-center">Login to stay connected.</p>
                        <form method="post" id="userAuth">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
