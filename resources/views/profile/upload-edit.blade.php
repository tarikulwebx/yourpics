@extends('profile.layout.profile-layout')

@section('title', 'Edit Picture')

@section('profile-content')
    @include('components.alert')
    <h4 class="mb-3 fw-bold text-dark text-uppercase">Edit Upload</h4>
    <form action="{{ route('profile.uploads.update', [Auth::user()->slug, $picture->slug]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row gy-3">
            <div class="col-12">
                <div>
                    <img id="imagePreview" src="{{ $picture->picture_url }}" class="img-fluid rounded-2 profile-upload-img"
                        alt="" onclick="document.getElementById('fileInput').click()" />
                </div>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label mb-1">Title
                    <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title')
                    is-invalid
                @enderror"
                    name="title" placeholder="Picture title" value="{{ old('title', $picture->title) }}" />
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
                        <option value="{{ $id }}"
                            {{ collect(old('tags'))->contains($id) || $selected_tags->contains($id) ? 'selected' : '' }}>
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
                <textarea
                    class="form-control char-count-textarea @error('description')
                    is-invaild
                @enderror"
                    name="description" rows="4" maxlength="300" placeholder="Image description (optional)">{{ old('description', $picture->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="textarea-counting-wrapper text-end fw-light">
                    <span id="current">0</span> /
                    <span id="maximum">300</span>
                </div>
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


@section('scripts')
    <script>
        $(document).ready(function() {
            var maxlength = $('.char-count-textarea').attr("maxlength");
            var currentLength = $('.char-count-textarea').val().length;
            $('#current').html(currentLength);
            $('#maximum').html(maxlength);

            $('.char-count-textarea').on('input', function() {
                currentLength = $(this).val().length;
                $('#current').html(currentLength);
            });

        });
    </script>
@endsection
