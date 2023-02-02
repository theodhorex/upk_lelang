<?php

namespace App\Http\Controllers;

use App\Models\BidData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;


class BidController extends Controller
{
    public function sendBid(Request $request, $id){
        $bid_data = new BidData;

        $bid_data -> bid = $this -> moneyFormat($request->bidd);
        $bid_data -> user_id = Auth::user() -> id;
        $bid_data -> postingan_id = $id;

        $bid_data -> save();
        return redirect('/home');
    }

    public function getBidDataDetails($id){
        $bid_data = BidData::where('postingan_id', $id)->with('user')->orderBy('bid', 'asc')->get();
        $postingan_id = $id;
        return view('pages/ajax/bidDataDetails', compact(['bid_data', 'postingan_id']));
    }

    // Helper function
    public function moneyFormat($amount){
        return number_format($amount, 2);
    }
}
