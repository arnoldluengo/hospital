<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
      @include('admin.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top: 100px;">
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session()->get('message')}}
          </div>
          @endif

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
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')" href="{{ route('admin.users.delete', $user->id) }}">Delete</a>
                        </td>
                      </tr>
                      @endforeach
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
      @include('admin.script')
      <!-- End custom js for this page -->
  </body>
</html> 