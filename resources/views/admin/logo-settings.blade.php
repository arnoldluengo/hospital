<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .logo-card {
            background: linear-gradient(to right, #00b09b, #96c93d);
            border-radius: 10px;
            padding: 20px;
            color: white;
        }
        .logo-preview {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .logo-preview img {
            max-height: 80px;
            width: auto;
        }
        .mini-logo-preview {
            background-color: #333;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .mini-logo-preview img {
            max-height: 40px;
            width: auto;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }
        .btn-update {
            background-color: white;
            color: #00b09b;
            font-weight: bold;
        }
        .btn-update:hover {
            background-color: #f0f0f0;
            color: #00b09b;
        }
        .custom-file-upload {
            border: 1px solid white;
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
            font-size: 16px;
            margin-top: 10px;
        }
        .custom-file-upload:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .file-name {
            margin-top: 5px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">HEALTH BOOKER FOR ENT CONSULTATION - Book your appointment today!</p>
                            <a href="/" target="_blank" class="btn me-2 buy-now-btn border-0">Book Now</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        @include('admin.sidebar')
        @include('admin.navbar')
        
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card logo-card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Logo Settings</h4>
                                    
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    
                                    <form action="{{ route('admin.logo.update') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Main Logo</h5>
                                                <div class="logo-preview">
                                                    <img src="{{ asset('admin/assets/images/logo.png') }}" alt="Main Logo" id="main-logo-preview">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="main_logo" class="custom-file-upload">
                                                        <i class="mdi mdi-upload"></i> Upload Main Logo
                                                    </label>
                                                    <input type="file" name="main_logo" id="main_logo" class="d-none" accept="image/*">
                                                    <div class="file-name" id="main-file-name">No file chosen</div>
                                                    <p class="mt-2 text-light">Recommended: PNG with transparent background, 200x50px</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <h5>Mini Logo</h5>
                                                <div class="mini-logo-preview mx-auto">
                                                    <img src="{{ asset('admin/assets/images/logo-mini.png') }}" alt="Mini Logo" id="mini-logo-preview">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="mini_logo" class="custom-file-upload">
                                                        <i class="mdi mdi-upload"></i> Upload Mini Logo
                                                    </label>
                                                    <input type="file" name="mini_logo" id="mini_logo" class="d-none" accept="image/*">
                                                    <div class="file-name" id="mini-file-name">No file chosen</div>
                                                    <p class="mt-2 text-light">Recommended: PNG with transparent background, 40x40px</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-update px-5 py-2">Update Logos</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('admin.script')
    <script>
        // Preview main logo before upload
        document.getElementById('main_logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update file name display
                document.getElementById('main-file-name').textContent = file.name;
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('main-logo-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Preview mini logo before upload
        document.getElementById('mini_logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update file name display
                document.getElementById('mini-file-name').textContent = file.name;
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('mini-logo-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
