<div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-5">
              <h1 class="text-center mb-4 wow fadeInUp">Book Your Appointment</h1>
              <p class="text-center text-muted mb-5 wow fadeInUp" data-wow-delay="0.2s">Fill out the form below to schedule your consultation</p>

              <form class="main-form" action="{{url('appointment')}}" method="POST">
                @csrf

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
                        @foreach($doctor as $doctors)
                          <option value="{{$doctors->name}}">{{$doctors->name}} - {{$doctors->specialty}}</option>
                        @endforeach
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
                      <label for="message" class="form-label">Message</label>
                      <textarea name="message" id="message" class="form-control" rows="4" placeholder="Describe your symptoms or concerns..." required></textarea>
                    </div>
                  </div>
                </div>

                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary btn-lg wow fadeInUp" data-wow-delay="0.5s">
                    <i class="fas fa-paper-plane me-2"></i>Submit Request
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
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