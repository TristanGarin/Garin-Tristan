<?php
$year = ($_GET["year"]);

if ($year % 4 == 0 || $year % 400 == 0) {
    echo $year . " is a Leap Year";
} else {
    echo $year . " is not a Leap Year";
}


?>