@if (Request::is('/'))
<!-- Header Start -->
<div class="container-fluid bg-primary px-6 px-md-5 mb-5">
    <div class="row align-items-center px-3">
      <div class="col-lg-6 text-center text-lg-left">
        <h4 class="text-white mb-4 mt-5 mt-lg-0">Kids Learning Center</h4>
        <h1 class="display-3 font-weight-bold text-white">
          New Approach to Kids Education
        </h1>
        <p class="text-white mb-4">
          Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed
          sit. Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed
          ipsum at ipsum nonumy amet. Clita lorem dolore sed stet et est justo
          dolore.
        </p>
        <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
        <img class="img-fluid mt-5" src="/kidkinderResource/img/header.png" alt="" />
      </div>
    </div>
  </div>
  <!-- Header End -->
@else
  <!-- Header Start -->
  <div class="container-fluid bg-primary mb-5">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">{{ $title }}</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="/">Home</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">{{ $title }}</p>
      </div>
    </div>
  </div>
  <!-- Header End -->

  @endif
