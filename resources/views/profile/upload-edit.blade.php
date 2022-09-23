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
                    <i class="fa-regular fa-circle-check me-1 text-light"></i>
                    Update
                </button>
            </div>
            <div class="col-12">
                <p class="text-warning mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas aliquid cumque
                    laudantium laborum
                    deserunt, nulla obcaecati itaque dignissimos optio quaerat.</p>
                <button id="deletePictureBtn" type="button" class="btn btn-sm btn-danger rounded-2 px-3 py-2">
                    <i class="fa-solid fa-trash-can me-1 text-light"></i>
                    Delete Picture!
                </button>
            </div>
        </div>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel"><i class="fa-regular fa-trash-can me-1 text-danger"></i>
                        Delete
                        Confirmation</h5>
                    <h1 id="pictureId" class="d-none">{{ $picture->id }}</h1>
                    <h1 id="userSlug" class="d-none">{{ Auth::user()->slug }}</h1>
                    <button type="button" class="btn-close small" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete? This item will be deleted immediately. You can not undo this action!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm rounded-3 px-3 btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button id="deleteConfirmBtn" type="button" class="btn btn-sm rounded-3 px-3 btn-primary">Yes,
                        Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Fail Toast --}}
    <div class="toast-container position-fixed bottom-0 start-0 p-3">
        <div id="deleteFailToast" class="toast  text-bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex align-items-center">
                <div class="toast-body fw-semibold d-flex">
                    <div><i class="fa-regular fa-circle-check me-2 flex-row"></i></div>
                    <div>Picture delete failed! Try again
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>


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


    <script>
        const deleteModal = new bootstrap.Modal('#deleteModal');
        $('#deletePictureBtn').on('click', function() {
            deleteModal.show();
        });


        $('#deleteConfirmBtn').on('click', function() {
            let id = $('#pictureId').html();
            let userSlug = $('#userSlug').html();
            axios.delete('/profile/deletePictureById/' + id)
                .then(res => {
                    if (res.status == 200) {
                        deleteModal.hide();
                        window.location.href = "/profile/" + userSlug + "/uploads";
                    } else {
                        const toast = new bootstrap.Toast($('#deleteFailToast'));
                        deleteModal.hide();
                        toast.show();
                    }
                })
                .catch(err => {
                    const toast = new bootstrap.Toast($('#deleteFailToast'));
                    deleteModal.hide();
                    toast.show();
                })
        });
    </script>

@endsection
