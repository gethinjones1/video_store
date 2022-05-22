<?php

namespace App\Utility;


class Receipt {
    public function create($rentalArray) {
        $rentalResult = array();
        $totalPrice = 0;
        $totalPoints = 0;

        foreach($rentalArray as $rental) {
            $film = $rental[0]; //film.name AND film.type 
            $duration = $rental[1];
            $statementLine = $this->lineItem($film, $duration);
            array_push($rentalResult, $statementLine);
            //Increment price and points
        }
        //Calculate total price
        return $rentalResult;
    }

    public function lineItem($film, $duration) {
        $price = 0;
        $points = 0;
        $NEW_FILM_RATE = 3;
      
        if ($film->movie_type == "new") {
          $price = $NEW_FILM_RATE * $duration;
          $points = $duration < 2 ? 1 : 2;
        }
      
        if ($film->movie_type == "regular") {
          $price = 2 + max($duration - 2, 0) * 1.5;
          $points = 1;
        }
      
        if ($film->movie_type == "childrens") {
          $price = 1.5 + max($duration - 3, 0) * 1.5;
          $points = 1;
        }

        return array("price"=>$price, "points"=>$points, "filmName"=>$film->movie_name, "duration"=>$duration);

    }
}


?>