<?php
$rows = "";
$cols = "";

if (isset($_POST['rows']) && isset($_POST['cols'])) {
    $rows = $_POST['rows'];
    $cols = $_POST['cols'];
}

function createTable($rows, $cols)
{
    echo "<table>";
    echo "<tr><th>X</th>";
    for ($i = 1; $i <= $cols; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr><th>$i</th>";
        for ($j = 1; $j <= $cols; $j++) {
            $value = $i * $j;
            if ($value % 2 != 0) {
                echo "<td class='odd'>$value</td>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Case Study 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            text-align: center;
            padding: 30px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        input[type="number"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 5px 0;
            text-align: center;
        }

        input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        table {
            border-collapse: collapse;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px 18px;
            text-align: center;
        }

        th {
            background: #3f51b5;
            color: white;
        }

        .odd {
            background: #ffeb3b;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Case Study 3 </h2>

    <form method="post">
        <div>
            <input type="number" name="rows" placeholder="Enter number of rows" value="<?php echo $rows; ?>" min="0">
        </div>
        <div>
            <input type="number" name="cols" placeholder="Enter number of columns" value="<?php echo $cols; ?>" min="0">
        </div>
        <input type="submit" value="Enter">
    </form>


    <?php
    if (!empty($rows) || !empty($cols)) {
        createTable($rows, $cols);
    }
    ?>
</body>

</html>