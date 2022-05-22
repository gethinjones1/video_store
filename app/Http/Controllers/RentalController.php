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


        $rentalString = explode(',', $rentalString);
        $rentalArray = array_chunk($rentalString, 2);

        $rentalFilm = array();

        foreach($rentalFilm as $film) {
            array_push($rentalFilm ,$film[0]);
        }

        //Take the type
        $movies = Rentals::whereIn('movie_name', $rentalFilm)->get();
        
        //append type to film, duration OR replace the filmname with the movieObject
        foreach($movies as $movie) {
            $movie['movie_type'];
        }

        //algo
        $receiptClass = new Receipt();
        $receipt = $receiptClass->create($rentalArray);
        
        return $receipt;

        //return $rentalString;
    }

}
