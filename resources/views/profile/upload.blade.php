@extends('profile.layout.profile-layout')

@section('title', 'New Upload')

@section('profile-content')
    @include('components.alert')
    <form action="{{ route('profile.upload.store', Auth::user()->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row gy-3">
            <div class="col-12">
                <div>
                    <img id="imagePreview" src="/assets/images/gallery-images/image (13).jpg"
                        class="img-fluid rounded-2 profile-upload-img" alt=""
                        onclick="document.getElementById('fileInput').click()" />
                </div>
                <input id="fileInput" name="picture"
                    class="form-control mt-2 @error('picture')
                    is-invalid
                @enderror"
                    type="file" accept="image/*"
                    onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])" />
                @error('picture')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label mb-1">Title
                    <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title')
                    is-invalid
                @enderror"
                    name="title" placeholder="Picture title" value="{{ old('title') }}" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="tags" class="form-label mb-1">Tags
                    <span class="text-danger">*</span></label>
                <select id="tags" class="select2-tags form-control d-none" name="tags[]" multiple="multiple">
                    <option value="">Select tags</option>
                    @foreach ($tags as $id => $name)
                        <option value="{{ $id }}" {{ collect(old('tags'))->contains($id) ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    The first name field is required
                </div>
            </div>

            <div class="col-12">
                <label for="details" class="form-label mb-1">Description
                </label>
                <textarea class="form-control @error('description')
                    is-invaild
                @enderror"
                    name="description" rows="4" placeholder="Image description (optional)">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 text-end">
                <button class="btn btn-primary rounded-5 px-3" type="submit">
                    <i class="fa-solid fa-upload me-1 text-light"></i>
                    Upload
                </button>
            </div>
        </div>
    </form>
@endsection
