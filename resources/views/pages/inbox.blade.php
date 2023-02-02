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
<div class="row p-3 rounded mb-4" style="background-color: #153B44;">
    <div class="col-2 my-auto">
        <h5 class="py-0 my-0 mb-1" style="color: #9CA4A6;"><input type="checkbox" name="" id=""class="form-check-input m-0 p-0 me-2 bg-transparent main-border-color remove-focus"> Select All</h5>
        <h5 class="py-0 my-0" style="color: #9CA4A6;"><i class="fa fa-refresh me-2" style="color: #C6DE41;"></i> Refresh</h5>
    </div>
    <div class="col-6"></div>
    <div class="col-4">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="" class="form-label fw-semibold mb-1" style="color: #C6DE41;">From</label>
                    <input type="date" name="" id="" class="form-control bg-transparent remove-focus" style="border: 1px solid #C6DE41; color: transparent;">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="" class="form-label fw-semibold mb-1" style="color: #C6DE41;">From</label>
                    <input type="date" name="" id="" class="form-control bg-transparent remove-focus" style="border: 1px solid #C6DE41; color: transparent;">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        @if(count($get_message) < 1)
        <img class="d-block mx-auto mt-5" src="{{ asset('asset/No inbox found.svg') }}" style="width: 20vw; height: 38vh;" alt="">
        @else
        @foreach($get_message as $message)
        <div class="row rounded p-3 mb-3" style="background-color: #153B44;">
            <div class="col">
                <h5 class="text-light d-flex my-0 py-0">
                    <input type="checkbox" name="" id=""
                        class="form-check-input m-0 p-0 me-2 bg-transparent main-border-color remove-focus">
                    System
                    <div class="mx-4 rounded" style="background-color: #9CA4A6; width: .2vw; height: 2.3vh;"></div>
                    <p class="py-0 my-0 cursor" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="getInboxDetails({{ $message -> id }})">
                        {{ $message -> postingan -> title }} - {{ $message -> postingan -> category }}
                    </p>
                </h5>
            </div>
            <div class="col">
                <p class="my-0 py-0 text-light float-end"> {{ $message -> created_at -> diffForHumans() }} </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
    role="dialog" style="z-index: 1400;">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4" style="background-color: #071C21; border-bottom: 1px solid #1D5F6F;">
                <h1 class="modal-title fs-5 text-light mx-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #071C21;">
                <div id="imported-inbox-details" style="overflow-y: auto; overflow-x: hidden;"></div>
            </div>
            <div id="modal-footer" class="modal-footer" style="background-color: #071C21; border-top: 1px solid #1D5F6F;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script>
    
    function getInboxDetails(id){
        $.get("{{ url('/inbox-details') }}/" + id, {}, function(data, status) {
            $("#imported-inbox-details").html(data);
            $('#exampleModalLabel').html($('#postingan_title').val());
            $("#exampleModal").show();
        });
    }
</script>
@endsection