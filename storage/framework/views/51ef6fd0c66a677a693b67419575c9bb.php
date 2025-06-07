<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="/home" style="color: white; text-decoration: none; font-weight: bold;">HEALTH BOOKER</a>
          <a class="sidebar-brand brand-logo-mini" href="/home" style="color: white; text-decoration: none; font-weight: bold;">HB</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <?php if(Auth::check() && Auth::user()->profile_photo_path): ?>
                    <img class="img-xs rounded-circle" src="<?php echo e(asset('admin/assets/images/profile/' . Auth::user()->profile_photo_path)); ?>" alt="Profile">
                  <?php else: ?>
                    <img class="img-xs rounded-circle" src="<?php echo e(asset('admin/assets/images/faces/admin-default.jpg')); ?>" alt="Default Profile">
                  <?php endif; ?>
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo e(Auth::user()->name); ?></h5>
                  <span>ENT Consultation</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-account text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Profile Settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(url('home')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(url('add_doctor_view')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-doctor"></i>
              </span>
              <span class="menu-title">Add Doctors</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(url('showappointment')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-clock"></i>
              </span>
              <span class="menu-title">Appointments</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(url('showdoctor')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="menu-title">All Doctors</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(url('users')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-group"></i>
              </span>
              <span class="menu-title">User Management</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo e(route('admin.profile')); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-circle"></i>
              </span>
              <span class="menu-title">My Profile</span>
            </a>
          </li>

        </ul>
      </nav<?php /**PATH C:\xampp\htdocs\Hospitall\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>