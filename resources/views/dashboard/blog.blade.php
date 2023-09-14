@extends('dashboard.layouts.main')

@section('container')

<!-- Detail Start -->
<div class="container py-5">
    <div class="row pt-5">
      <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-3">
          <p class="section-title pr-5">
            <span class="pr-2">Blog Detail Page</span>
          </p>
          <h1 class="mb-3">{{ $blog->title }}</h1>
          <div class="d-flex">
            <p class="mr-3"><i class="bi bi-person-fill"></i>{{ $blog->author->name }}</p>
            <p class="mr-3"><i class="bi bi-clock"></i>{{ $blog->created_at->diffForHumans() }}</p>
          </div>
        </div>
        <div class="mb-5">
          <img
            class="img-fluid rounded w-100 mb-4"
            src="{{ asset('storage/'.$blog->image) }}"
            alt="Image"
          />
          <p>{!! $blog->body !!}</p>
        </div>

        <!-- Related Post -->
        <div class="mb-5 mx-n3">
          <h2 class="mb-4 ml-3">Related Post</h2>
          <div class="owl-carousel post-carousel position-relative">
            @foreach($blogs as $item)
            <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
              <img
                class="img-fluid"
                src="{{ asset('storage/'.$item->image) }}"
                style="width: 80px; height: 80px"
              />
              <div class="pl-3">
                <h5 class="">{{ $item->title }}</h5>
                <div class="d-flex">
                  <small class="mr-3"
                    ><i class="bi bi-person-fill"></i>{{ $item->author->name }}</small>
                  <small class="mr-3"
                    ><i class="bi bi-clock"></i>{{ $blog->created_at->diffForHumans() }}</small>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
      <div class="col-lg-4 mt-5 mt-lg-0">
        <!-- Author Bio -->
        <div
          class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4"
        >
        <h3 class="text-secondary mb-3">Author</h3>
        <img class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" src="https://source.unsplash.com/300x300?developer" alt="" />
          {{-- @if (!$blog->image)
                @else
                    <img class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->name }}">
                @endif --}}
          <h3 class="text-secondary mb-3">{{ $blog->author->name }}</h3>
        </div>
      </div>

  </div>
</div>
  <!-- Detail End -->

@endsection
