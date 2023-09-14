@extends('dashboard.layouts.main')

@section('container')

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Get In Touch</span>
        </p>
        <h1 class="mb-4">Contact Us For Any Query</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-5">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('login'))
                    @php
                    echo "<script>
                        Swal.fire({
                                title: 'Anda Harus Login Dahulu!',
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                            if (result.isConfirmed) {
                            window.location = '/login';
                            }
                            })
                        </script>";


                    @endphp
            </div>
            @endif
          <div class="contact-form">
            <form method="post" action="/contact">
                @csrf
              <div class="control-group">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Your Name"
                  required="required"
                  @if (auth()->user())
                  readonly
                        value = "{{ auth()->user()->name }}"
                  @endif
                  data-validation-required-message="Please enter your name"
                />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Your Email"
                  required="required"
                  @if (auth()->user())
                  readonly
                        value = "{{ auth()->user()->email }}"
                  @endif
                  data-validation-required-message="Please enter your email"
                />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <input
                  type="text"
                  class="form-control"
                  name="subject"
                  id="subject"
                  placeholder="Subject"
                  required="required"
                  data-validation-required-message="Please enter a subject"
                />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <textarea
                  class="form-control"
                  rows="6"
                  id="message"
                  name="message"
                  placeholder="Message"
                  required="required"
                  data-validation-required-message="Please enter your message"
                ></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div class="d-flex justify-content-end">
                <button
                  class=" btn btn-primary py-2 px-4"
                  type="submit"
                  id="sendMessageButton"
                >
                  Send Message
                </button>
              </div>
            </form>
          </div>



        </div>
      </div>
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Meet Our</span>
        </p>
        <h1 class="mb-4">Developer</h1>
      </div>
      <div class="row justify-content-center px-4">
         <!-- Author Bio -->
         <div
         class="col-lg-4 d-flex flex-column text-center bg-primary rounded mr-1 mb-2 py-5 px-4"
       >
       <h3 class="text-secondary mb-3">Back-End</h3>
         <img
           src="/img/nopalturu.jpg"
           class="img-fluid rounded-circle mx-auto mb-3"
           style="width: 150px"
         />
         <h3 class="text-secondary mb-1">Naufal Syafiq Hambali</h3>
         <small class="text-white">Hi, saya naufal memiliki minat di bidang programming dan yang paling utama yaitu gaming. </small>
         <div class="pl-3 mt-4">
            <h5 class="text-white"><i class="bi bi-hash"></i>Hardstuck Gold</h5>
          </div>
       </div>
         <div
         class="col-lg-4 d-flex flex-column text-center bg-primary rounded ml-1 mb-2 py-5 px-4"
       >
       <h3 class="text-secondary mb-3">Front-End</h3>
         <img
           src="/img/mas.jpg"
           class="img-fluid rounded-circle mx-auto mb-3"
           style="width: 150px"
         />
         <h3 class="text-secondary mb-1">Moch. Zukhruf Ain</h3>
         <small class="text-white">Hi, saya Zukruf, bisa dipanggil sayang. Saya suka uang tapi ga punya uang.</small>
         <div class="pl-3 mt-4">
            <h5 class="text-white"><i class="bi bi-hash"></i>jangan merendah puh</h5>
          </div>
       </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->

@endsection
