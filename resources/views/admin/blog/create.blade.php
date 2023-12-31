@extends('admin.layouts.main')
@section('container')

<div class="col-lg-8">
    <form method="post" action="/admin/blog" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5" >
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>

          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
            @error('body')
                    <p class="text-danger">
                        <small>{{ $message }}</small>
                    </p>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>


    <script>

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');


        title.addEventListener('change', function(){
        console.log(title.value);
        if(title.value == ""){
            slug.value = "";
            return 0;
        }
        fetch('/admin/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug);
        });


        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });


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
