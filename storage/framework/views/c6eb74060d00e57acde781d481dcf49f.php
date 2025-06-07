<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php echo $__env->make('admin.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <!-- partial -->
      
      <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top: 100px;">
          <?php if(session()->has('message')): ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo e(session()->get('message')); ?>

          </div>
          <?php endif; ?>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Management</h4>
                <p class="card-description">Manage all users</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <td><?php echo e($user->address); ?></td>
                        <td>
                          <a class="btn btn-primary" href="<?php echo e(route('admin.users.edit', $user->id)); ?>">Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')" href="<?php echo e(route('admin.users.delete', $user->id)); ?>">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- container-scroller -->
      
      <!-- plugins:js -->
      <?php echo $__env->make('admin.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <!-- End custom js for this page -->
  </body>
</html> <?php /**PATH C:\xampp\htdocs\Hospitall\resources\views/admin/users.blade.php ENDPATH**/ ?>