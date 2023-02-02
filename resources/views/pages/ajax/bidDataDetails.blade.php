    <div class="row">
        <div class="col-6" style="overflow-y: auto;">
            @php
            $i = 1;
            @endphp
            <table class="table table-borderless table-responsive border-light"
                style="border: 1px solid #5C5C5C; border-radius: 6px;">
                <thead style="border: 1px solid #5C5C5C; border-radius: 6px;">
                    <tr>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light" scope="col">No
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light" scope="col">
                            Name
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light" scope="col">
                            Bid
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light" scope="col">
                            Posted
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;"
                            class="text-light @if(Auth::user()->role == 'user') d-none @endif" scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody style="border: 1px solid #5C5C5C; border-radius: 6px;">
                    @foreach($bid_data as $bid)
                    <tr>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light" scope="row">
                            {{ $i++ }}.
                        </th>
                        <td style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light">
                            @if(Auth::user()->name == $bid -> user -> name) You @else
                            {{ $bid -> user -> name }} @endif</td>
                        <td style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light">Rp.
                            {{ $bid -> bid }}
                        </td>
                        <td style="border: 1px solid #5C5C5C; border-radius: 6px;" class="text-light">
                            {{ $bid -> created_at -> diffForHumans() }}
                        </td>
                        <td style="border: 1px solid #5C5C5C; border-radius: 6px;"
                            class="text-light @if(Auth::user()->role == 'user') d-none @endif">
                            <input type="hidden" name="username" id="username" value="{{ $bid -> user -> name }}">
                            <a href="#" class="btn" onClick="getWinnerName()" id="select-winner-button"
                                style="background-color: #C6DE41;"><i class="fa fa-arrow-right"></i></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- <img class="d-block mx-auto"
        src="https://play-lh.googleusercontent.com/sBCKPKALbJlMtGczEfmgTdL5WmbGEx3Sldbgku-wrw1cORAyYciMYN-7or5ufkXAOwiW=w240-h480-rw"
        alt="">
    <h2 class="text-light text-center">Oops! No Data Bro.</h2> -->
        </div>
        <div class="col-6 p-2 py-0">
            <form action="{{ url('send-message', $postingan_id) }}" method="post">
                @csrf
                <div class="rounded p-3" style="background-color: #0E2930;">
                    <div class="form-group mb-3">
                        <label for="winner_name" class="form-label text-light">To: </label>
                        <input type="text" name="winner_name" id="winner_name"
                            class="form-control text-light bg-transparent remove-focus placeholder cursor">
                    </div>
                    <div class="form-group mb-3">
                        <label for="winner_message" class="form-label text-light">Message</label>
                        <textarea name="winner_message" id="winner_message" cols="30" rows="10"
                            class="form-control text-light bg-transparent remove-focus placeholder cursor"></textarea>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn float-end fw-semibold"
                                style="background-color: #C6DE41;">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>