<?php
$num = ($_GET["num"]);

if ($num % 2 == 0) {
    echo $num . " is Even";
} else {
    echo $num . " is Odd";
}


?>