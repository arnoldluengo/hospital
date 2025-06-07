<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
      .form-container {
        padding-top: 50px;
        padding-bottom: 50px;
      }
      
      label {
        display: inline-block;
        width: 200px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
      }
      
      .form-group {
        padding: 15px;
      }
      
      .form-control {
        color: black;
        width: 300px;
      }
      
      .btn-primary {
        background-color: #00796b;
        border: none;
        padding: 10px 20px;
        margin-top: 20px;
      }
      
      .btn-primary:hover {
        background-color: #1976d2;
      }
      
      .card {
        background-color: #191c24;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      
      .card-header {
        background-color: #1976d2;
        color: white;
        font-size: 20px;
        font-weight: bold;
        padding: 15px;
        border-radius: 10px 10px 0 0;
      }
      
      .card-body {
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
      @include('admin.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="container form-container">
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session()->get('message')}}
          </div>
          @endif

          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  Update User Information
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="phone">Phone:</label>
                      <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="address">Address:</label>
                      <input type="text" name="address" class="form-control" value="{{$user->address}}">
                    </div>
                    
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                  </form>
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