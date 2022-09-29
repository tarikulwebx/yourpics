@extends('profile.layout.profile-layout')

@section('title', 'Edit Profile')

@section('profile-content')
    @include('components.alert')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="text-primary mb-0">Edit Profile <i class="fa-solid fa-user-pen"></i></h3>
        <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-primary">
            Go to Profile</a>
    </div>
    <form action="{{ route('profile.update', Auth::user()->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gy-3">
            <div class="col-12">
                <div>
                    <img id="imagePreview" src="{{ Auth::user()->picture_url }}" width="100"
                        class="rounded-circle edit-profile-picture shadow-sm"
                        onclick="document.getElementById('picture-input').click()" alt="" />
                </div>
                <input id="picture-input" name="picture"
                    class="form-control mt-3 @error('picture')
                    is-invalid
                @enderror"
                    type="file" placeholder="Choose image" accept="image/*"
                    onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])" />
                @error('picture')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="first_name" class="form-label mb-1">First name
                    <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('first_name')
                    is-invalid
                @enderror"
                    name="first_name" placeholder="First name" value="{{ old('first_name', Auth::user()->first_name) }}" />
                @error('first_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label mb-1">Last name
                    <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('last_name')
                    is-invalid
                @enderror"
                    name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}" />
                @error('last_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="bio" class="form-label mb-1">Bio
                </label>
                <textarea class="form-control @error('bio')
                    is-invaild
                @enderror" name="bio"
                    rows="6" placeholder="Your bio" maxlength="255">{{ old('bio', Auth::user()->bio) }}</textarea>
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="textarea-char-count text-end fw-light">
                        <span id="current">0</span> /
                        <span id="maximum"></span>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <!-- <hr class="w-100" /> -->
                <h5 class="mt-3 text-primary mb-0">
                    Change password
                </h5>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label mb-1">New Password
                </label>
                <input type="password"
                    class="form-control @error('password')
                    is-invalid
                @enderror"
                    name="password" placeholder="New password" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @else
                    <div class="form-text">
                        Leave it empty if you don't want to
                        change
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label mb-1">Confirm Password
                </label>
                <input type="password"
                    class="form-control @error('password_confirmation')
                    is-invalid
                @enderror"
                    name="password_confirmation" placeholder="Confirm password" />
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-12">
                <label for="current_password" class="form-label mb-1">Current Password
                </label>
                <input type="password"
                    class="form-control @error('current_password')
                    is-invalid
                @enderror"
                    name="current_password" placeholder="Current password" />
                @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 text-end">
                <button class="btn btn-primary rounded-5">
                    <i class="fa-solid fa-check me-1 text-light"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </form>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var maxlength = $('textarea').attr("maxlength");
            var currentLength = $('textarea').val().length;
            $('#current').html(currentLength);
            $('#maximum').html(maxlength);

            $('textarea').on('input', function() {
                currentLength = $(this).val().length;
                $('#current').html(currentLength);
            });

        });
    </script>
@endsection
