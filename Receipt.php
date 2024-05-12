<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Receipt</title>
</head>

<body>
    <nav>
        <div>
            <img class="nav-logo" src="images/cclogo.png" alt="logo">
            <span>Cozy Corner</span>
        </div>
        <div class="nav-link">
            <div onclick="location.href = 'index.php'">Home</div>
        </div>
    </nav>
    <main>
        <?php
        extract($_SESSION['data']);
        ?>
        <section id="receipt">
            <span class="header form-header">Cozy Corner Online Reservation</span>
            <div class=" receipt-row">
                <span>Name:</span>
                <span><?= $name ?></span>
            </div>
            <div class="receipt-row">
                <span>Contact:</span>
                <span><?= $phone ?></span>
            </div>
            <div class="receipt-row">
                <span>Date of Reservation:</span>
                <span><?= $date ?></span>
            </div>
            <div class="receipt-row">
                <span>Time of Reservation:</span>
                <span><?= $time ?></span>
            </div>
            <div class="receipt-row">
                <strong>Reservation Details</strong>
            </div>
            <div class="receipt-row">
                <span>Check-in Date:</span>
                <span><?= $from ?></span>
            </div>
            <div class="receipt-row">
                <span>Check-out Date:</span>
                <span><?= $to ?></span>
            </div>
            <div class="receipt-row">
                <span>Room Type:</span>
                <span><?= $room ?></span>
            </div>
            <div class="receipt-row">
                <span>Room Capacity:</span>
                <span><?= $cap ?></span>
            </div>
            <div class="receipt-row">
                <strong>Payment</strong>
            </div>
            <div class="receipt-row">
                <span>Type of Payment:</span>
                <span><?= $payment ?></span>
            </div>
            <div class="receipt-row">
                <span>Number of Days:</span>
                <span><?= $days ?></span>
            </div>
            <div class="receipt-row">
                <span>Room Rate:</span>
                <span><?= $rate ?></span>
            </div>
            <div class="receipt-row">
                <span>Sub-total:</span>
                <span><?= $sub ?></span>
            </div>
            <div class="receipt-row">
                <span>Additional Charge:</span>
                <span><?= $add ?></span>
            </div>
            <div class="receipt-row">
                <span>Discount:</span>
                <span><?= $disc ?></span>
            </div>
            <div class="receipt-row">
                <span>Total Bill:</span>
                <span><?= $total ?></span>
            </div>
            <div class="info info-success">Cash payments will enjoy discounts and 0% additional charge!</div>
            <div class="form-action">
                <button type="button" class="back-btn" onclick="location.href ='Form.php'">Cancel</button>
                <form action="Receiver.php" method="post">
                    <button type="submit" name="submit" value="save">Confirm Reservation</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>