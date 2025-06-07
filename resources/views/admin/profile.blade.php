<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .profile-card {
            background: linear-gradient(to right, #00b09b, #96c93d);
            border-radius: 10px;
            padding: 20px;
            color: white;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        .profile-img-container {
            position: relative;
            display: inline-block;
        }
        .profile-img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .profile-img-container:hover .profile-img-overlay {
            opacity: 1;
        }
        .upload-icon {
            color: white;
            font-size: 2rem;
        }
        .quick-upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #00b09b;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            cursor: pointer;
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
                            <div class="card profile-card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Admin Profile</h4>
                                    
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
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
                                    
                                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="forms-sample" id="profileForm">
                                        @csrf
                                        
                                        <div class="text-center mb-4">
                                            <div class="profile-img-container">
                                                @if($user->profile_photo_path)
                                                    <img src="{{ asset('admin/assets/images/profile/' . $user->profile_photo_path) }}" class="profile-img" id="profile-preview" alt="Profile Image">
                                                @else
                                                    <img src="{{ asset('admin/assets/images/faces/admin-default.jpg') }}" class="profile-img" id="profile-preview" alt="Default Profile">
                                                @endif
                                                <div class="profile-img-overlay" id="profile-overlay">
                                                    <i class="mdi mdi-camera upload-icon"></i>
                                                </div>
                                                <div class="quick-upload-btn" id="quick-upload-btn">
                                                    <i class="mdi mdi-camera-plus"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label for="profile_photo" class="custom-file-upload">
                                                    <i class="mdi mdi-upload"></i> Upload New Photo
                                                </label>
                                                <input type="file" name="profile_photo" id="profile_photo" class="d-none" accept="image/*">
                                                <div class="file-name" id="file-name">No file chosen</div>
                                                <p class="mt-2 text-light">Recommended: Square image, 300x300px or larger</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                        </div>
                                        
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-update px-5 py-2">Update Profile</button>
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
        // Preview image before upload
        document.getElementById('profile_photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update file name display
                document.getElementById('file-name').textContent = file.name;
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Click on overlay to trigger file input
        document.getElementById('profile-overlay').addEventListener('click', function() {
            document.getElementById('profile_photo').click();
        });
        
        // Quick upload button
        document.getElementById('quick-upload-btn').addEventListener('click', function() {
            document.getElementById('profile_photo').click();
        });
        
        // Auto-submit form when file is selected
        document.getElementById('profile_photo').addEventListener('change', function() {
            if (this.files.length > 0) {
                setTimeout(function() {
                    // Small delay to allow preview to update
                    if (confirm('Upload this photo as your profile picture?')) {
                        document.getElementById('profileForm').submit();
                    }
                }, 500);
            }
        });
    </script>
</body>
</html> 