<div class="page-section bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="display-4 wow fadeInUp">Meet Our Expert Doctors</h1>
        <p class="lead text-muted wow fadeInUp" data-wow-delay="0.2s">Our team of experienced healthcare professionals is here to provide you with the best care</p>
      </div>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($doctor as $doctors)
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="doctorimage/{{$doctors->image}}" alt="{{$doctors->name}}" class="img-fluid">
                <div class="meta">
                  <a href="#" class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="tooltip" title="Call">
                    <i class="fas fa-phone"></i>
                  </a>
                  <a href="#" class="btn btn-success btn-sm rounded-circle" data-bs-toggle="tooltip" title="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                </div>
              </div>
              <div class="body text-center p-4">
                <h5 class="mb-1">{{$doctors->name}}</h5>
                <p class="text-muted mb-3">{{$doctors->specialty}}</p>
                <a href="{{url('appointment')}}" class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-calendar-plus me-2"></i>Book Appointment
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <style>
    .card-doctor {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .card-doctor:hover {
      transform: translateY(-10px);
    }
    .card-doctor .header {
      position: relative;
      overflow: hidden;
    }
    .card-doctor .header img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .card-doctor:hover .header img {
      transform: scale(1.05);
    }
    .card-doctor .meta {
      position: absolute;
      bottom: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
    }
    .card-doctor .meta a {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: transform 0.3s ease;
    }
    .card-doctor .meta a:hover {
      transform: scale(1.1);
    }
    .card-doctor .body {
      background: white;
    }
    .card-doctor .body h5 {
      color: #333;
      font-weight: 600;
    }
    .card-doctor .body p {
      color: #666;
    }
  </style>

  <script>
    $(document).ready(function(){
      $('#doctorSlideshow').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 2
          },
          992: {
            items: 3
          }
        }
      });
    });
  </script>
