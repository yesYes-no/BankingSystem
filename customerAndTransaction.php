<?php
$databaseHost = '127.0.0.1';
$databasename = 'bank';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databasename);

$result = mysqli_query($mysqli, "SELECT * FROM users");
?>

<html>

<head>
    <link rel="stylesheet" href="Formcss.css">
    <link rel="stylesheet" href="templatemo_style.css">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
        li:hover {
            background: #4e91c9;
            color: #fff;
        }
    </style>


    <title>Customers' Details</title>

    <h1 align="center" class="animated fadeInRight">
        Customers' details</h1>
    <div class="col-md-8">
        <nav id="nav" class="main-navigation hidden-xs hidden-sm">
            <ul class="main-menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="transactionhistory.php">Transaction History</a></li>
            </ul>
        </nav>
    </div>
</head>

<body>
    <style>
        table {
            background: transparent;
            border-collapse: collapse;
            width: 50%;
            color: #757575;
            font-family: monoscope;
            font-size: 25px;
            text-align: center;
            top: 70%;
            left: 50%;

        }

        th,
        td {
            background-color: #32353a;
            color: #eaeaea;
            padding: .75rem;
            text-align: center !important;
            border: 1px solid #8c8d8d;
        }

        button {
            transition: 0.5s;
            padding: 7%;
            border-radius: 0.25rem;
        }

        button:hover {
            background-color: #32353a;
            color: white;
            cursor: pointer;
        }
    </style>
    <div align="center" class="log-form>" <center>
        <table align="center" height=100 width="500">
            <tr width="500">
                <th width="120">id</th>
                <th width="120">Name</th>
                <th width="120">email</th>
                <th width="120">Balance</th>
                <th width="120">Operation</th>

                <?php
                include_once("config.php");
                $result = mysqli_query($mysqli, "SELECT * FROM users");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["balance"] . "</td>
                                    <td><a href='selecteduserdetail.php?id=" . $row["id"] . "'> <button type='button' class='btn'>Transact</button></a></td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo " 0 result";
                }
                ?>
                </center>
    </div>
    <span class="border-top"></span>
    <span class="border-left"></span>
    <span class="border-right"></span>
    <span class="border-bottom"></span>
    <span class="shape-1"></span>
    <span class="shape-2"></span>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo_custom.js"></script>
</body>

</html>