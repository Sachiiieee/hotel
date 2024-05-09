<?php 

include 'Reservation.php';

$obj = new Reservation();

// Redirecting Form Submissions
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "form") {
        $name = ucwords($_POST['csname']);
        $phone = $_POST['phone'];
        $from = $_POST['start'];
        $to = $_POST['end'];
        $type = $_POST['type'];
        $cap = $_POST['cap'];
        $pay = $_POST['payment'];

        $obj->compute($name, $phone, $from, $to, $type, $cap, $pay);
    }
}

// Redirect GET request here // 