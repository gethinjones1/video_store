<?php

namespace App\Utility;


class Receipt {
    public function create($rentalArray) {
        $rentalResult = array();
        $totalPrice = 0;
        $totalPoints = 0;

        foreach($rentalArray as $rental) {
            $film = $rental[0]; 
            $duration = $rental[1];
            $type = $rental[2];

            $statementLine = $this->lineItem($film, $duration, $type);

            array_push($rentalResult, $statementLine);
            $totalPrice = $totalPrice + $statementLine['price'];
            $totalPoints = $totalPoints + $statementLine['points'];
        }

        $total = array("totalPrice"=>$totalPrice, "totalPoints"=>$totalPoints);

        array_push($rentalResult, $total);
        
        return $rentalResult;
    }

    public function lineItem($film, $duration, $type) {
        $price = 0;
        $points = 0;
        $NEW_FILM_RATE = 3;
      
        if ($type == "new") {
          $price = $NEW_FILM_RATE * $duration;
          $points = $duration < 2 ? 1 : 2;
        }
      
        if ($type == "regular") {
          $price = 2 + max($duration - 2, 0) * 1.5;
          $points = 1;
        }
      
        if ($type == "childrens") {
          $price = 1.5 + max($duration - 3, 0) * 1.5;
          $points = 1;
        }

        return array("price"=>$price, "points"=>$points, "filmName"=>$film, "duration"=>$duration);

    }
}


?>