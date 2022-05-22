<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;
use App\Models\Customers;
use App\Utility\Receipt;


class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRentals(Request $request)
    {
        $rentalString = '';

        if($request->has('rentals')) {
            $rentalString = $request->input('rentals');
        } else {
            return '500'; //send http status
        }

        $rentalString = explode(',', $rentalString); // Initial query string to an array
        $rentalArray = array_chunk($rentalString, 2); // The input is filmname,duration split the array in chunks
        $receiptArray = array(); // Initialise new array to push the above and then append the type

        foreach($rentalArray as $rental) {
            $movie = Rentals::where('movie_name', $rental[0])->get('movie_type');
            array_push($receiptArray, $rental[0]);
            array_push($receiptArray, $rental[1]);
            array_push($receiptArray, $movie[0]['movie_type']);
        }

        // Array will now contain film,duration,type needs to be chunked into own array
        $receiptArray = array_chunk($receiptArray, 3);


        //algo
        $receiptClass = new Receipt();
        $receipt = $receiptClass->create($receiptArray);
        
        return  $receipt;

    }

}
