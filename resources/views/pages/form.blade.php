@extends('home')
@section('content')
<style>
.border-dashed {
    border-style: dashed;
}

.remove-focus:focus {
    outline: none;
    box-shadow: none;
    color: white;
}

.placeholder::placeholder {
    color: white;
}

.action-button {
    background-color: #C6DE41;
    color: #071C21;
    font-weight: 600;
    cursor: pointer;
}

.action-button:hover {
    background-color: #C6DE41;
    color: #071C21;
    font-weight: 600;
    cursor: pointer;
}

.cursor {
    cursor: pointer;
}
</style>

<div class="row">
    <div class="col rounded p-3 px-4" style="background-color: #153B44;">
        <h4 class="text-light fw-semibold">Item Information</h4>
        <span style="color: #AEAEAE">Fill out a few details to start posting your item.</span>
        <form action="{{ url('/form-send') }}" id="post-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="item-photo mt-4">
                <h6 class="text-light text-uppercase">Photo</h6>
                <hr class="border-light">
                <div class="row p-3 mx-1 rounded" style="border: 1px solid white; border-style: dashed;">
                    <div id="img-div" class="col-4 d-inline-flex">
                        <!-- <div class="bg-light rounded" style="width: 4vw; height: 8vh;"></div> -->
                        <!-- <img id="imagePreview"
                            style="width: 4vw; height: 8vh; border: 1px solid grey; border-style: dashed; border-radius: 10%; color: white;"
                            src="" alt="Your preview"> -->
                        <!-- <span class="text-light my-auto ms-4">Upload your photos here. Max size 2MB</span> -->
                        <i id="removed" class="fa fa-file-image-o my-auto me-3"
                            style="font-size: 1.7vw; color: #C6C6C6;" aria-hidden="true"></i>
                        <span id="removedd" class="my-auto" style="color: #C6C6C6">Upload your photos here. Max size
                            1MB</span>
                    </div>
                    <div class="col-8 float-end d-block my-auto">
                        <label class="float-end text-light border rounded p-2 fw-semibold" for="uploadFile"
                            style="cursor: pointer;">Browse</label>
                        <input type="file" accept="image/*" name="uploadFile" id="uploadFile" value="upload"
                            class="uploadFile d-none" multiple>
                    </div>
                </div>
            </div>
            <div class="description mt-5">
                <h6 class="text-light text-uppercase">Description</h6>
                <hr class="border-light">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="title" class="form-label text-light">Title</label>
                            <input id="title" type="text"
                                class="form-control remove-focus bg-transparent placeholder text-light cursor"
                                name="title" required autofocus placeholder="Title">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="subtitle" class="form-label text-light">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle"
                                class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                                autofocus placeholder="Subtitle">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label text-light">Category</label>
                            <select name="category" id=""
                                class="form-control remove-focus bg-transparent placeholder text-light cursor">
                                <option class="text-dark dropdown-item" value="Art">Art</option>
                                <option class="text-dark dropdown-item" value="Building">Building</option>
                                <option class="text-dark dropdown-item" value="Automotive">Automotive</option>
                                <option class="text-dark dropdown-item" value="Electronic">Electronic</option>
                                <option class="text-dark dropdown-item" value="Music">Music</option>
                                <option class="text-dark dropdown-item" value="Vintage">Vintage</option>
                                <option class="text-dark dropdown-item" value="Photography">Photography</option>
                                <option class="text-dark dropdown-item" value="Baby & Kids">Baby & Kids</option>
                                <option class="text-dark dropdown-item" value="Toys">Toys</option>
                                <option class="text-dark dropdown-item" value="Furniture">Furniture</option>
                                <option class="text-dark dropdown-item" value="Cloth">Cloth</option>
                                <option class="text-dark dropdown-item" value="Pant">Pant</option>
                                <option class="text-dark dropdown-item" value="Sneaker">Sneaker</option>
                                <option class="text-dark dropdown-item" value="Accecories">Accecories</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="location" class="form-label text-light">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                                autofocus placeholder="Your location">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="endauc" class="form-label text-light">End auction</label>
                            <input type="date" name="endauc" id="endauc"
                                class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                                autofocus>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="startprice" class="form-label text-light">Start price</label>
                    <input type="text" name="startprice" id="startprice"
                        class="form-control remove-focus placeholder bg-transparent text-light cursor" required
                        autofocus placeholder="Start price">
                </div>
                <div class="mb-3">
                    <label for="descandcond" class="form-label text-light">Description & Condition</label>
                    <!-- <input type="text" name="descandcond" id="descandcond"
                        class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                        autofocus placeholder="Description & Condition"> -->
                    <textarea name="descandcond" id="descandcond" cols="30" rows="10"
                        class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                        autofocus placeholder="Description & Condition"></textarea>
                </div>
            </div>
        </form>
        <a href="#" id="post-form-button" class="btn action-button mt-3"
            onClick="document.getElementById('post-form').submit()" role="button">Post</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="imported-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script>
$(document).ready(function() {
    $("#uploadFile").change(function() {
        var file = this.files;
        var output = $('#img-div');
        output.html("");
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                output.append(`<img id="imagePreview" style="width: 4vw; height: 8vh; border-radius: 10%; color: white;"
                            src="${event.target.result}" alt="Your preview">`);
                $('#removed').remove();
                $('#removedd').remove();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
@endsection