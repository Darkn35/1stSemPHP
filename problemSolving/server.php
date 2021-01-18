<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $probNum = $_POST['probNum'];
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $var3 = $_POST['var3'];

    switch($probNum) {
        case 1:
            function numberTowords($num)
            {
            $ones = array(
            0 =>"ZERO", 1 => "ONE", 2 => "TWO", 3 => "THREE", 4 => "FOUR", 5 => "FIVE", 6 => "SIX", 7 => "SEVEN", 8 => "EIGHT", 9 => "NINE", 10 => "TEN", 11 => "ELEVEN", 
            12 => "TWELVE", 13 => "THIRTEEN", 14 => "FOURTEEN", 15 => "FIFTEEN", 16 => "SIXTEEN", 17 => "SEVENTEEN", 18 => "EIGHTEEN", 19 => "NINETEEN", "014" => "FOURTEEN"
            );
            $tens = array( 
            0 => "ZERO", 1 => "TEN", 2 => "TWENTY", 3 => "THIRTY",  4 => "FORTY",  5 => "FIFTY",  6 => "SIXTY",  7 => "SEVENTY",  8 => "EIGHTY",  9 => "NINETY" 
            ); 
            $hundreds = array("HUNDRED", "THOUSAND", "MILLION", "BILLION", "TRILLION", "QUARDRILLION"); 
            $num = number_format($num,2,".",","); 
            $num_arr = explode(".",$num); 
            $wholenum = $num_arr[0]; 
            $decnum = $num_arr[1]; 
            $whole_arr = array_reverse(explode(",",$wholenum)); 
            krsort($whole_arr,1); 
            $rettxt = ""; 
            foreach($whole_arr as $key => $i){
                
            while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
            if($i < 20){ 
            $rettxt .= $ones[$i]; 
            }elseif($i < 100){ 
            if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
            if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
            }else{ 
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
            if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
            } 
            if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
            }
            } 
            if($decnum > 0){
            $rettxt .= " and ";
            if($decnum < 20){
            $rettxt .= $ones[$decnum];
            }elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
            }
            return $rettxt;
            }
            echo numberTowords($var1); 
        break;
        case 2:
            function ConvertToRoman($num){ 
                $n = intval($num); 
                $res = ''; 
                $romanNumber_Array = array( 'M'  => 1000, 'CM' => 900, 'D'  => 500, 'CD' => 400, 'C'  => 100, 'XC' => 90, 'L'  => 50, 'XL' => 40, 'X'  => 10, 'IX' => 9, 'V'  => 5, 'IV' => 4, 'I'  => 1 );
                foreach ($romanNumber_Array as $roman => $number){ 
                    $matches = intval($n / $number); 
                    $res .= str_repeat($roman, $matches); 
                    $n = $n % $number; 
                } 
                return $res; 
            } 
            echo 'The number in roman numerals is: '.ConvertToRoman($var1).'';
        break;
        case 3:
            $accNum = $var1;
            $minutes = $var2;
            $service = $var3;

            global $total;  
            if ($service == "regular") {
               $charge = 10;
               $free = 50;
               if ($minutes > $free) {
                  $extraminutes = $minutes - $free;
                  $extra = $extraminutes * 0.2;
                  $total = $extra + $charge;
               }
               else {
                  $extraminutes = 0;
                  $extra = 0;
                  $total = $charge;
               }
            }
            else if ($service == "premium") {
               $charge = 25;             
               if ($minutes >= 6 && $minutes <= 18) {  
                  $free = 75;          
                  if ($minutes > $free) {
                     $extraminutes = $minutes - $free;
                     $extra = $extraminutes * 0.1;
                     $total = $extra + $charge;
                  }
                  else {
                     $extraminutes = 0;
                     $extra = 0;
                     $total = $charge;
                  }
               }  
            }
            else {   
               $free = 100;
               if ($minutes > $free) {
                  $extraminutes = $minutes - $free;
                  $extra = $extraminutes * 0.05;
                  $total = $extra + $charge;
               }
            }
            echo 'Account Number '.$accNum.' in '.$service.' service is due $'.$total.' after '.$minutes.' minutes';
        break;
        case 4:
            $timeStart = explode(':', $var1);
            $totalMins = ($var2 * 60) + $var3;
            $gross = number_format($totalMins * 0.4, 2, '.', '');
            if (intval($timeStart[0] < 8 || intval($timeStart[0]) > 18)) { $net_1 = $gross * 0.5; }
            else { $net_1 = $gross; }
            if ($totalMins > 60) { $net_2 = $net_1 - ($net_1 * 0.15); }
            else { $net_2 = $net_1; }
            $net_final = number_format($net_2 - ($net_2 * 0.04), 2, '.', '');
            echo 'Gross Cost is: '.$gross.' and Net Cost is: '.$net_final.'';
        break;
        case 5:
            $div2 = '';
            $div3 = '';
            $div5 = '';
            if ($var1 % 2 === 0) { $div2 = 'Divisible by 2'; }
            if ($var1 % 3 === 0) { $div3 = 'Divisible by 3'; }
            if ($var1 % 5 === 0) { $div5 = 'Divisible by 5'; }
            if (($var1 % 2 !== 0) && ($var1 % 3 !== 0) && ($var1 % 5 !== 0)) { echo ''.$var1.' is not divisible by all three'; }
            else { echo ''.$var1.' is '.$div2.' '.$div3.' '.$div5.''; }

        break;
        case 6:
            $result;
            switch ($var2) {
                case "addition":
                    $result = $var1 + $var3;
                break;
                case "subtraction":
                    $result = $var1 - $var3;
                break;
                case "multiplication":
                    $result = $var1 * $var3;
                break;
                case "division":
                    // Error - Divided by 0
                    if ($var3 == 0) { echo 'syntax error'; } 
                    else { $result = $var1 / $var3; }
                break;
                default:  
                break;   
            }
            echo 'The answer is '.$result.'';
        break;
        case 7:
            $resultFloat;
            switch ($var2) {
                case "addition":
                    $result = $var1 + $var3;
                    $resultFloat = number_format((float)$result, 2, '.', '');
                break;
                case "subtraction":
                    $result = $var1 - $var3;
                    $resultFloat = number_format((float)$result, 2, '.', '');
                break;
                case "multiplication":
                    $result = $var1 * $var3;
                    $resultFloat = number_format((float)$result, 2, '.', '');
                break;
                case "division":
                    // Error - Divided by 0
                    if ($var3 == 0)
                    {
                        echo 'syntax error';
                    } 
                    else 
                    {
                        $result = $var1 / $var3;
                        $resultFloat = number_format((float)$result, 2, '.', '');
                    }
                break;
                default:  
                break;   
            }
            echo 'The answer is '.$resultFloat.'';
        break;
        case 8:
            $xCoord = $var1;
            $yCoord = $var2;

            if ($xCoord > 0 && $yCoord > 0) { echo 'The coordinate is at the first quadrant!'; } 
            elseif ($xCoord < 0 && $yCoord > 0) { echo 'The coordinate is at the second quadrant!'; } 
            elseif ($xCoord < 0 && $yCoord < 0) { echo 'The coordinate is at the third quadrant!'; }
            elseif ($xCoord > 0 && $yCoord < 0) { echo 'The coordinate is at the fourth quadrant!'; } 
            elseif ($xCoord == 0 && $yCoord > 0) { echo 'The coordinate is at the positive y axis!'; } 
            elseif ($xCoord == 0 && $yCoord < 0) { echo 'The coordinate is at the negative y axis!';} 
            elseif ($xCoord < 0 && $yCoord == 0) { echo 'The coordinate is at the negative x axis!'; } 
            elseif ($xCoord > 0 && $yCoord == 0) { echo 'The coordinate is at the positive x axis!'; }
            else { echo 'The coordinate is at the origin point!'; }
            break;
        case 9:
            $letter = $var1;

            switch($letter)
            {
                case ($letter == "a" || $letter == "A" || $letter == "b" || $letter == "B" || $letter == "c" || $letter == "C"): echo 'The corresponding digit is 2'; break;
                case ($letter == "d" || $letter == "D" || $letter == "e" || $letter == "E" || $letter == "f" || $letter == "F"): echo 'The corresponding digit is 3'; break;
                case ($letter == "g" || $letter == "G" || $letter == "h" || $letter == "H" || $letter == "i" || $letter == "I"): echo 'The corresponding digit is 4'; break;
                case ($letter == "j" || $letter == "J" || $letter == "k" || $letter == "K" || $letter == "l" || $letter == "L"): echo 'The corresponding digit is 5'; break;
                case ($letter == "m" || $letter == "M" || $letter == "n" || $letter == "N" || $letter == "o" || $letter == "O"): echo 'The corresponding digit is 6'; break;
                case ($letter == "p" || $letter == "P" || $letter == "q" || $letter == "Q" || $letter == "r" || $letter == "R" || $letter == "s" || $letter == "S"): echo 'The corresponding digit is 7'; break;
                case ($letter == "t" || $letter == "T" || $letter == "u" || $letter == "U" || $letter == "v" || $letter == " V"): echo 'The corresponding digit is 8'; break;
                case ($letter == "w" || $letter == "W" || $letter == "x" || $letter == "X" || $letter == "y" || $letter == "Y"): echo 'The corresponding digit is 9'; break;
                default: echo 'Error, this does not exist in the telephone dial!'; break;
            }
        break;
        default:
        break;
    }
}
