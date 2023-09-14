@extends('dashboard.layouts.main')
@section('container')

@if (session()->has('success'))
    @php
    echo "
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '".session('success')."',
        })
    </script>
    ";
    @endphp
@endif
<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-5">
            <img
            class="img-fluid rounded mb-5 mb-lg-0"
            src="/kidkinderResource/img/about-1.jpg"
            alt=""
            />
        </div>
        <div class="col-lg-7">
            <p class="section-title pr-5">
            <span class="pr-2">Learn About Us</span>
            </p>
            <h1 class="mb-4">Best School For Your Kids</h1>
            <p>
            Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
            dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
            Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
            dolor
            </p>
            <div class="row pt-2 pb-4">
            <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="/kidkinderResource/img/about-2.jpg" alt="" />
            </div>
            <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                    dolor amet diam
                </li>
                <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                    dolor amet ipsum
                </li>
                <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                    elitripsum vero.
                </li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
      <!-- About End -->

<!-- Blog Start -->
<div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Latest Blog</span>
        </p>
        <h1 class="mb-4">Latest Articles From Blog</h1>
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
                <h4 class="">{{ $blog->title }}</h4>
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
    </div>
</div>
<!-- Blog End -->


@endsection
