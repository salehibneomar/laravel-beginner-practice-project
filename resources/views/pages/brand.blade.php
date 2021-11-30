@extends('frontend.layout')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Portolio</h2>
            <ol>
              <li><a href="{{ route('page.home') }}">Home</a></li>
              <li>Portolio</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->

      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-brand">Brand</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up">
  
            @foreach ($brands as $brand)
            <div class="col-lg-4 col-md-6 portfolio-item filter-brand">
                <img src="{{ asset($brand->image) }}" class="img-fluid" alt="brand" >
                <div class="portfolio-info">
                  <h4>{{ $brand->name }}</h4>
                  <p>Brand</p>
                  <a href="{{ asset($brand->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $brand->name }}"><i class="bx bx-plus"></i></a>
                  <a href="" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            @endforeach

  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->

@endsection