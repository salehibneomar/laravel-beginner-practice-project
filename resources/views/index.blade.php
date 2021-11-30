@extends('frontend.layout')

@section('content')
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About Us</strong></h2>
          </div>
  
          <div class="row content">
            @if (!empty($about))
            <div class="col-lg-6" data-aos="fade-right">
              <h2>{{ $about->title }}</h2>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                {{ $about->description }}
              </p>
            </div>
            @endif
  
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>BRANDS</h2>
          </div>
  
          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
  
            @foreach ($brands as $brand)
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{ asset($brand->image) }}" class="img-fluid" alt="brand" style="min-width:200px ;max-width: 200px; min-height: 200px; max-height: 200px;">
              </div>
            </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Our Clients Section -->
  

@endsection