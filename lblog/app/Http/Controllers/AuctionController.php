<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;

class AuctionController extends Controller
{


    public function createauction()
    {
        return view('createauction');
    }
    public function addauction(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            ]);

        $auction = new Auction;
        $auction->name = $request->name;
        $auction->save();
        return redirect(route('home')) -> with('successMsg','Auction Sucessfully Added');
    }



    public function editauction($auction_id)
    {
        // $auction = Auction::find($auction_id);
        // return view('editauction', compact('auction'));
        
        return view('editauction');
    }

    public function updateauction(Request $request, $auction_id)
    {
        $this->validate($request, [
            'name'=> 'required',
    
            ]);
            $auction = Auction::find($auction_id);
            $auction->name = $request->name;           
            $auction->save();
            return redirect(route('home')) -> with('successMsg','Auction Sucessfully Updated');
    }

}