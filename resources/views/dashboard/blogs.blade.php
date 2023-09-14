@extends('dashboard.layouts.main')

@section('container')

<!-- Blog Start -->
<div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Blog!</span>
        </p>
        <h1 class="mb-4">Articles From Blog</h1>
      </div>
      <!-- Search Form -->
          <div class="mb-5">
              <form action="/blog">
                  @csrf
                  <div class="input-group">
                  <input
                      type="text"
                      class="form-control form-control-lg"
                      name="search"
                      placeholder="Keyword"
                      value="{{ request('search') }}"
                  />
                  <div class="input-group-append">
                      <span class="input-group-text bg-transparent text-primary"
                      ><button class="border-0 bg-transparent" type="input"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
                  </div>
          </form>
      </div>
      <div class="row pb-3">
        @foreach ($blogs as $blog )
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
                @if (!$blog->image)
                    <img class="card-img-top mb-2" src="https://source.unsplash.com/300x200?children" alt="" />
                @else
                    <img class="card-img-top mb-2" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->name }}">
                @endif

              <div class="card-body bg-light text-center p-4">
                <h4>{{ $blog->title }}</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="bi bi-person-fill"></i> {{ $blog->author->name }}</small
                  >
                  <small class="mr-3"
                    ><i class="bi bi-clock"></i>{{ $blog->created_at->diffForHumans() }}</small
                  >
                </div>
                <p>
                  {{-- {!! $blog->excerpt !!} --}}
                </p>
                <a href="/blog/{{ $blog->slug }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>
        @endforeach
        </div>
        {{ $blogs->links() }}
    </div>
  </div>
  <!-- Blog End -->


@endsection
