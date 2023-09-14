@extends('dashboard.layouts.main')

@section('container')

<!-- Gallery Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Our Gallery</span>
        </p>
        <h1 class="mb-4">Our Kids School Gallery</h1>
      </div>
      <div class="row portfolio-container">
        {{--  --}}
        @foreach ($images as $blog)
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item">
            <div class="position-relative overflow-hidden mb-2">
              @if ($blog->image)
                    <img class="img-fluid w-100" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->name }}">
              <div
                class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
              >
                <a href="{{ asset('storage/'.$blog->image) }}" data-lightbox="portfolio">
                  <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                </a>
              </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Gallery End -->

@endsection
