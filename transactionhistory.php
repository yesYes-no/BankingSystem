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
        a:hover {
            background: #4e91c9;
            color: #fff;
        }
    </style>


    <title>Transaction History</title>

    <h1 align="center" class="animated fadeInRight">
        Transaction History</h1>
    <div class="col-md-8">
        <nav id="nav" class="main-navigation hidden-xs hidden-sm">
            <ul class="main-menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="customerAndTransaction.php">Customers</a></li>
                <!--<li><a class="show-5 contactbutton" href="#">Contact</a></li>-->
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
    <div align="center" class="container">
        <h2 class="text-center pt-4">Transaction History</h2>

        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">S.No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'config.php';

                    $sql = "select * from transaction";

                    $query = mysqli_query($mysqli, $sql);

                    while ($rows = mysqli_fetch_assoc($query)) {
                    ?>

                        <tr>
                            <td class="py-2"><?php echo $rows['sno']; ?></td>
                            <td class="py-2"><?php echo $rows['sender']; ?></td>
                            <td class="py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['balance']; ?> </td>
                            <td class="py-2"><?php echo $rows['datetime']; ?> </td>

                        <?php
                    }

                        ?>
                </tbody>
            </table>

        </div>
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