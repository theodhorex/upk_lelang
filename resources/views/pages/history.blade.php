@extends('home')
@section('content')

<div class="row">
    <div class="row">
        @if(count($data) < 1) <img class="d-block mx-auto" src="{{ asset('asset/No data found.svg') }}"
            style="width: 20vw; height: 38vh;" alt="">
            @else
            <h3 class="text-light mb-3">Items that you have submitted before</h3>
            <hr class="border-light mx-2">

            <!-- Div for category -->
            <div class="row">
                <div class="col">
                    <h4 class="text-light px-0 mb-2" id="category_title">Category</h4>
                    <div class="p-3 px-0 pt-0">
                        <div class="row mb-3">
                            <div class="col-3">
                                <select name="category_filter" id="category_filter"
                                    class="form-control text-light bg-transparent remove-focus placeholder cursor" style="cursor: pointer;">
                                    <option class="text-dark dropdown-item" value="All">All</option>
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
                </div>
            </div>
            <div class="row" id="search_container">
            @foreach($data as $postingan)
            <div class="col-md-3 rounded p-1">
                <div class="rounded p-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="cursor: pointer; background-color: #0E2930;"
                    onClick="getPostinganDetails({{ $postingan -> postingan -> id }})">
                    <img style="width: 19vw; height: 33vh;" class="mb-4 rounded"
                        src="{{ $postingan -> postingan -> gambar }}" alt="">
                    <h5 class="text-light fw-semibold mb-1">{{ $postingan -> postingan -> title }}</h5>
                    <h6 class="text-light mb-4">{{ $postingan -> postingan -> subtitle }}</h6>
                    <h6 class="text-light mb-3">{{ $postingan -> postingan -> endauc }}</h6>
                    <h6 class="text-light fw-semibold m-0 mb-1">Current offer</h6>
                    <h6 class="text-light fw-semibold m-0">Rp. {{ $postingan -> postingan -> start_price }}</h6>
                    <hr class="border-light my-3 mb-2">
                    <h6 class="text-light my-0">{{ $postingan -> postingan -> created_at -> diffForHumans() }}</h6>
                </div>
            </div>
            @endforeach
            </div>
            @endif
    </div>
</div>









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


<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script>
function getPostinganDetails(id) {
    $.get("{{ url('/postingan-details') }}/" + id, {}, function(data, status) {
        $("#imported-page").html(data);
        $(".breadcrumb-title-postingan").html($("#postingan-title").val());
        $("#exampleModal").show();
    });
}

$('#category_filter').change(function() {
    $.ajax({
        type: 'get',
        url: '{{ url("/search") }}',
        data: {
            result: $(this).val(),
            status: true
        },
        dataType: "json",
        success: function(data) {

            var col = data.map(function(e) {
                return `
                <div class="col-md-3 rounded p-1">
                    <div class="rounded p-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="cursor: pointer; background-color: #0E2930;" onClick="getPostinganDetails(${e['id']})">
                        <img style="width: 19vw; height: 33vh;" class="mb-4 rounded" src="${e['gambar']}" alt="">
                        <h5 class="text-light fw-semibold mb-1">${e['title']}</h5>
                        <h6 class="text-light mb-4">${e['subtitle']}</h6>
                        <h6 class="text-light mb-3">${e['endauc']}</h6>
                        <h6 class="text-light fw-semibold m-0 mb-1">Current offer</h6>
                        <h6 class="text-light fw-semibold m-0">Rp. ${e["start_price"]}</h6>
                        <hr class="border-light my-3 mb-2">
                        <h6 class="text-light my-0"></h6>
                    </div>
                </div>
                `;
            });
            $('#search_container').append('<h3 class="text-light mb-2">Item</h3>');
            $('#search_container').html(col);
        },
        error: function(err) {
            alert(err.responseText);
        }
    });
});
</script>
@endsection