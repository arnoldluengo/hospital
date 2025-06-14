<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

  <!-- Quick Access Sidebar -->
  <div class="quick-access-sidebar">
    <a href="<?php echo e(url('/login')); ?>" class="quick-access-item" title="Admin">
      <i class="fas fa-user-shield"></i>
      <span>Admin</span>
    </a>
  </div>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/about')); ?>">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/doctors')); ?>">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/news')); ?>">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/contact')); ?>">Contact</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <?php if(session()->has('message')): ?>
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"></button>
    <?php echo e(session()->get('message')); ?>

  </div>
  <?php endif; ?>

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-5">
              <h1 class="text-center mb-4 wow fadeInUp">Book Your Appointment</h1>
              <p class="text-center text-muted mb-5 wow fadeInUp" data-wow-delay="0.2s">Fill out the form below to schedule your consultation</p>

              <form class="main-form" action="<?php echo e(url('appointment')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="row">
                  <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <div class="form-group">
                      <label for="name" class="form-label">Full Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <div class="form-group">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="form-group">
                      <label for="date" class="form-label">Appointment Date</label>
                      <input type="date" name="date" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="form-group">
                      <label for="doctor" class="form-label">Select Doctor</label>
                      <select name="doctor" id="departement" class="form-select" required>
                        <option value="">Choose a doctor</option>
                        <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($doctors->name); ?>"><?php echo e($doctors->name); ?> - <?php echo e($doctors->specialty); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 py-2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="form-group">
                      <label for="number" class="form-label">Phone Number</label>
                      <input type="tel" name="number" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                  </div>
                  <div class="col-12 py-2 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="form-group">
                      <label for="message" class="form-label">Additional Information/Comments</label>
                      <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter any additional information or comments..."></textarea>
                    </div>
                  </div>
                </div>

                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary btn-lg wow fadeInUp" data-wow-delay="0.5s">
                    Submit Request
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2023 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="../assets/vendor/wow/wow.min.js"></script>
  <script src="../assets/js/theme.js"></script>
  
  <style>
    /* Quick Access Sidebar */
    .quick-access-sidebar {
      position: fixed;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      background-color: #fff;
      box-shadow: -2px 0 10px rgba(0,0,0,0.1);
      border-radius: 10px 0 0 10px;
      padding: 15px 10px;
      z-index: 1000;
    }
    
    .quick-access-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px;
      color: #555;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    
    .quick-access-item:hover {
      color: #007bff;
      transform: translateX(-5px);
    }
    
    .quick-access-item i {
      font-size: 24px;
      margin-bottom: 5px;
    }
    
    .quick-access-item span {
      font-size: 12px;
      font-weight: 500;
    }
    
    /* Form styles */
    .form-control, .form-select {
      border-radius: 8px;
      padding: 12px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.2rem rgba(45, 137, 239, 0.25);
    }
    
    .form-label {
      font-weight: 500;
      color: #333;
      margin-bottom: 8px;
    }
    
    .card {
      border: none;
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
  </style>
</body>
</html> <?php /**PATH C:\xampp\htdocs\Hospitall\resources\views/user/appointment_direct.blade.php ENDPATH**/ ?>