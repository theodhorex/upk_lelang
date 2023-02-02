@extends('home')
@section('content')
<style>
.main-border-color {
    border: 2px solid #C6DE41;
}

.remove-focus:active {
    outline: none;
    box-shadow: none;
    border: 2px solid $C6DE41
}

.remove-focussfocus {
    outline: none;
    box-shadow: none;
    color: white;
}

.placeholder::placeholder {
    color: white;
}

.cursor {
    cursor: pointer;
}
</style>
<div class="row">
    <h2 class="text-light">Account list</h2>
    <hr class="border-light">
    <div class="col">
        <div class="row">
            <div class="col d-flex px-3">
                <div class="d-inline-flex my-auto">
                    <h5 class=""><input type="checkbox" name="" id=""
                            class="form-check-input m-0 p-0 bg-transparent main-border-color remove-focus">#
                        <a href="#" class="text-light"><i class="fa fa-trash"></i></a>
                    </h5>
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn mb-3 float-end fw-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="background-color: #C6DE41;">
                    Add account
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="rounded p-3 px-4" style="background-color: #153B44;">
                    <h4 class="text-light">Active admin account</h4>
                    <hr class="border-light">
                    @foreach($getAdminAccount as $ga)
                    <h5 class="text-light d-flex"><input type="checkbox" name="" id="" value="{{ $ga -> id }}"
                            class="form-check-input m-0 p-0 me-2 bg-transparent main-border-color remove-focus">
                        {{ $ga -> name }} - <span class="text-light my-auto mx-2"
                            style="font-size: 0.7vw;">Administrator</span></h5>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <div class="rounded p-3 px-4" style="background-color: #153B44;">
                    <h4 class="text-light">Active officer account</h4>
                    <hr class="border-light">
                    @foreach($getOfficerAccount as $go)
                    <h5 class="text-light d-flex"><input type="checkbox" name="" id="" value="{{ $go -> id }}"
                            class="form-check-input m-0 p-0 me-2 bg-transparent main-border-color remove-focus">
                        {{ $go -> name }} - <span class="text-light my-auto mx-2"
                            style="font-size: 0.7vw;">Officer</span></h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #071C21;">
            <div class="modal-header" style="border-bottom: 1px solid #666666;">
                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add account</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form class="px-2" action="{{ url('/add-account') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label text-light">Username</label>
                        <input type="text" name="name" id="name"
                            class="text-light form-control bg-transparent placeholder cursor remove-focuss">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" name="email" id="email"
                            class="text-light form-control bg-transparent placeholder cursor remove-focuss">
                    </div>
                    <div class="form-group mb-3">
                        <label for="role" class="form-label text-light">Role</label>
                        <select name="role" id="role"
                            class="text-light form-control bg-transparent placeholder cursor remove-focuss">
                            <option class="text-dark" value="" selected="true" disabled="disabled">-- Select Role --
                            </option>
                            <option class="text-dark" value="admin">Admin</option>
                            <option class="text-dark" value="officer">Officer</option>
                            <option class="text-dark" value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="text" name="password" id="password"
                            class="text-light form-control bg-transparent placeholder cursor remove-focuss">
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #666666;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: #C6DE41;">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection