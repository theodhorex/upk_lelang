@extends('home')
@section('content')
<style>
.remove-hover:hover {
    outline: none;
}

.main-color {
    color: #C6DE41;
}

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

@php
$i = 1;
@endphp
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col d-flex">
                <h4 class="fw-normal my-auto text-light">Welcome, </h4>
                <h4 class="fw-semibold my-auto main-color"> {{ Auth::user()->name }}</h4>
            </div>
            <div class="col">
                <div class="row float-end">
                    <!-- <div class="col d-inline-flex">
                        <input type="search" name="" class="form-control mx-2 search-bar" placeholder="Search here">
                    </div> -->
                </div>
            </div>
        </div>
        <hr class="border-light mb-4">

        <div class="row mt-3 @if(Auth::user()->role == 'user') d-none @endif">
            <div class="col">
                <div class="row me-2">
                    <div class="col-md-6 rounded p-1">
                        <div class="rounded p-4" style="background-color: #0E2930;">
                            <div class="row mb-2">
                                <div class="col">
                                    <h5 class="text-light fw-semibold py-0 my-0">Team activity</h5>
                                </div>
                                <div class="col">
                                    <a href="#" class="text-decoration-underline float-end py-0 my-0"
                                        style="color: #C6DE41;">See all</a>
                                </div>
                            </div>
                            <hr class="border-light my-0 mb-4 rounded" style="padding-bottom: .4vh;">
                            @foreach($activity as $activities)
                            <div class="col mb-3 pb-3" style="border-bottom: 1px solid #717171; cursor: pointer;"
                                data-bs-toggle="modal" data-bs-target="#exampleModalToggle3">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="text-light my-0 py-0">{{ $activities -> user -> name }}</h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-light fw-semibold float-end my-0 py-0">{{ $activities -> created_at -> diffForHumans() }}</p>
                                    </div>
                                </div>
                                <p class="text-light my-0 py-0">{{ $activities -> keterangan }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 rounded p-1">
                        <div class="rounded p-4" style="background-color: #0E2930;">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-light fw-semibold">Statistic</h5>
                                </div>
                                <div class="col">
                                <a href="#" class="text-decoration-underline float-end py-0 my-0"
                                        style="color: #C6DE41;">See all</a>
                                </div>
                            </div>
                            <hr class="border-light my-0 py-0 mb-4 rounded">
                            <canvas id="lineChart" class="p-0 m-0"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row @if(Auth::user()->role == 'user') mt-2 @else mt-5 @endif">
    <div class="row my-0">
        @if(count($data) < 1) <img class="d-block mx-auto" src="{{ asset('asset/No data found.svg') }}"
            style="width: 20vw; height: 38vh;" alt="">
            @else
            <h3 class="text-light mb-3">Recently added</h3>
            @foreach($data as $postingan)
            <div class="col-md-3 rounded p-1">
                <div class="rounded p-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="cursor: pointer; background-color: #0E2930;"
                    onClick="getPostinganDetails({{ $postingan -> id }})">
                    <img style="width: 19vw; height: 33vh;" class="mb-4 rounded" src="{{ $postingan -> gambar }}"
                        alt="">
                    <h5 class="text-light fw-semibold mb-1">{{ $postingan -> title }}</h5>
                    <h6 class="text-light mb-4">{{ $postingan -> subtitle }}</h6>
                    <h6 class="text-light mb-3">{{ $postingan -> endauc }}</h6>
                    <h6 class="text-light fw-semibold m-0 mb-1">Current offer</h6>
                    <h6 class="text-light fw-semibold m-0">Rp. {{ $postingan -> start_price }}</h6>
                    <hr class="border-light my-3 mb-2">
                    <h6 class="text-light my-0">{{ $postingan -> created_at -> diffForHumans() }}</h6>
                </div>
            </div>
            @endforeach
            @endif
    </div>
</div>







<!-- Modal -->
<div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
    role="dialog" style="z-index: 1400;">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-5" style="background-color: #071C21; border-bottom: 1px solid #1D5F6F;">
                <nav class="d-flex" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb my-auto">
                        <li class="breadcrumb-item"><a class="text-decoration-none text-light" href="/home">Home</a>
                        </li>
                        <li id="active-breadcrumb" class="breadcrumb-item breadcrumb-title-postingan active"
                            aria-current="page"></li>
                    </ol>
                </nav>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #071C21;">
                <div id="imported-page" style="overflow-y: auto; overflow-x: hidden;"></div>
            </div>
            <div id="modal-footer" class="modal-footer"
                style="background-color: #071C21; border-top: 1px solid #1D5F6F;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1" role="dialog" style="z-index: 1600;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #071C21; border-bottom: 1px solid #1D5F6F;">
                <h1 class="modal-title fs-5 text-light" id="exampleModalToggleLabel2">Bid Data</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #071C21;">
                @if(Auth::user()->role == 'user')
                <div id="imported-bid-data-details"></div>
                @else
                <div id="imported-bid-data-details"></div>
                @endif
            </div>
            <div class="modal-footer" style="background-color: #071C21; border-top: 1px solid #1D5F6F;">
                <button class="btn fw-semibold" data-bs-target="#exampleModal" data-bs-toggle="modal"
                    style="background-color: #C6DE41;">Back to
                    first</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
    tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #071C21; border-bottom: 1px solid #1D5F6F;">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #071C21;">

            </div>
            <div class="modal-footer" style="background-color: #071C21; border-top: 1px solid #1D5F6F;">
                <button class="btn fw-semibold" data-bs-dismiss="modal"
                    style="background-color: #C6DE41;">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
function getPostinganDetails(id) {
    $.get("{{ url('/postingan-details') }}/" + id, {}, function(data, status) {
        $("#imported-page").html(data);
        $(".breadcrumb-title-postingan").html($("#postingan-title").val());
        $("#exampleModal").show();
    });
}

function getBidDataDetails(id) {
    $.get("{{ url('/get-bid-data-details') }}/" + id, {}, function(data, status) {
        $("#imported-bid-data-details").html(data);
        $("#exampleModalToggle2").show();
    });
}

function getWinnerName() {
    $('#winner_name').val($('#username').val());
    // console.log()
}

function editpostingansDetails() {
    let title = $("#postingan-title").val();
    let subtitle = $("#postingan-subtitle").val();
    let start_price = $("#postingan-start_price").val();
    let endauc = $("#postingan-endauc").val();
    let descandcond = $("#postingan-descandcond").val();
    let location = $("#postingan-location").val();



    $('#active-breadcrumb').html(`${title}`);

    $('#title').replaceWith(
        `<input id="title" name="title" type="text" value="${title}" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">`
    );
    $('#subtitle').replaceWith(
        `<input id="subtitle" name="subtitle" type="text" value="${subtitle}" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">`
    );
    $('#start_price').replaceWith(
        `<input id="start_price" name="start_price" type="text" value="${start_price}" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">`
    );
    $('#endauc').replaceWith(
        `<input id="endauc" name="endauc" type="date" value="${endauc}" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">`
    );
    $('#location').replaceWith(
        `<input id="location" name="location" type="text" value="${location}" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">`
    );
    $('#descandcond').replaceWith(
        `<textarea id="descandcond" cols="30" rows="10" name="descandcond" class="form-control bg-transparent text-light mb-2 remove-focus placeholder cursor">${descandcond}</textarea>`
    );
    $('#modal-footer').append(
        `<button type="submit" class="btn fw-semibold" style="background-color: #C6DE41;" onClick="event.preventDefault(); document.getElementById('update-postingan-form').submit();">Save</button>`
    );
}
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
                label: "My First dataset",
                data: [70, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {
                label: "My Second dataset",
                data: [28, 48, 40, 19, 86, 27, 90],
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    '#C6DE41',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});
</script>
@endsection