<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($mysqli, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($mysqli, $sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }
    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($mysqli, $sql);
        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($mysqli, $sql);
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
        }
        $newbalance = 0;
        $amount = 0;
    }
}
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
            padding: 1.5%;
            border-radius: 0.25rem;
        }

        button:hover {
            background-color: #32353a;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div align="center" style="max-width: 720px;
                               width: 100%;
                               padding-right: 15px;
                               padding-left: 15px;
                               margin-right: auto;
                               margin-left: auto;" class="container">
        <h2 class="text-center pt-4">Transaction</h2>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM users where id=$sid";
        $result = mysqli_query($mysqli, "SELECT * FROM users where id=$sid");
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($mysqli);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext"><br>
            <div align="center" class="log-form>" <center>
                <table style="border: 1px;" class="table table-striped table-condensed table-bordered">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance</th>
                    </tr>
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name'] ?></td>
                        <td class="py-2"><?php echo $rows['email'] ?></td>
                        <td class="py-2"><?php echo $rows['balance'] ?></td>
                    </tr>
                </table>
                <br><br><br>
                <label>Transfer To:</label>
                <select style="display: block;
                               width: 50%;
                               padding: .375rem .75rem;
                               font-size: 1rem;
                               border: 1px;
                               border-radius: .25rem;
                               transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" name="to" class="form-control" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                    include 'config.php';
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM users where id!=$sid";
                    $result = mysqli_query($mysqli, $sql);
                    if (!$result) {
                        echo "Error " . $sql . "<br>" . mysqli_error($mysqli);
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option class="table" value="<?php echo $rows['id']; ?>">

                            <?php echo $rows['name']; ?> (Balance:
                            <?php echo $rows['balance']; ?> )
                        </option>
                    <?php
                    }
                    ?>
                    <div>
                </select>
                <br>
                <br>
                <label>Amount:</label>
                <input style="display: block;
                               width: 50%;
                               padding: .375rem .75rem;
                               font-size: 1rem;
                               border: 1px;
                               border-radius: .25rem;
                               transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" type="number" class="form-control" name="amount" required>
                <br><br>
                <div class="text-center">
                    <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                    <br>
                    <ul style="padding-top: 2%;"><a href="index.html">Cancel</a></ul>
                </div>
            </div>
        </form>
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