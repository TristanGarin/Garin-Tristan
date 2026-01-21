<?php
$grade = ($_GET["grade"]);

if ($grade >= 90 && $grade <= 100) {
    echo "A";
} elseif ($grade >= 80 && $grade <= 89) {
    echo "B";
} elseif ($grade >= 70 && $grade <= 79) {
    echo "C";
} elseif ($grade >= 60 && $grade <= 69) {
    echo "D";
} elseif ($grade < 60) {
    echo "F";
}

?>