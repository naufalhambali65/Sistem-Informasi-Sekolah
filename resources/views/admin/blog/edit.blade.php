@extends('admin.layouts.main')
@section('container')

<div class="col-lg-8">
    <form method="post" action="/admin/blog/{{ $data->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $data->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug', $data->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if ($data->image)
            <input type="hidden" name="oldImage" value="{{ $data->image }}">
            <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/'. $data->image) }}" style="display:block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            {{-- img untuk preview jangan lupa dikasih function onchange untuk terhubung ke js --}}
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            {{-- trix editor --}}
          <input id="body" type="hidden" name="body" value="{{ old('body', $data->body) }}">
          <trix-editor input="body"></trix-editor>
          @error('body')
                <p class="text-danger">
                    <small>{{ $message }}</small>
                </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
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
        fetch('/admin/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
    });

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
