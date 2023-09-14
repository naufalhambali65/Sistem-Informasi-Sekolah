@extends('admin.layouts.main')
@section('container')
<div class="col-lg-8">
    <form method="post" action="/admin/teacher" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mapel" class="form-label">Teach Subject</label>
            <select class="form-select @error('mapel') is-invalid @enderror" id="mapel" name="mapel" aria-label="Default select example">
            <option value="Mathematics">Mathematics</option>
            <option value="Physics">Physics</option>
            <option value="Sports">Sports</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            {{-- img untuk preview jangan lupa dikasih function onchange untuk terhubung ke js --}}
            <img class="img-preview img-fluid mb-3 col-sm-3" >
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>


    <script>

        // untuk mematikan fungsi attach file
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });

        // untuk menampilkan gambar/preview img
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
