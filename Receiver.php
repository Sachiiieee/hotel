<?php 

include 'Reservation.php';

$obj = new Reservation();

// Redirecting Form Submissions
if (isset($_POST['submit'])) {
    $val = $_POST['submit'];
    if ($val == "form") {
        $name = ucwords($_POST['csname']);
        $phone = $_POST['phone'];
        $from = $_POST['start'];
        $to = $_POST['end'];
        $type = $_POST['type'];
        $cap = $_POST['cap'];
        $pay = $_POST['payment'];

        $obj->compute($name, $phone, $from, $to, $type, $cap, $pay);
    } elseif ($val == "save") {
        extract($_SESSION['data']);
        $obj->insert($name, $phone, $date, $time, $from, $to, $room, $cap, $payment, $days, $rate, $sub, $disc, $add, $total, "Pending");
    } elseif ($val == "Declined" || $val == "Accepted") {
        $id = $_POST['id'];
        $obj->update($id, $val);
    } elseif ($val == "Delete") {
        $id = $_POST['id'];
        $obj->delete($id);
    }
}

if (isset($_GET['view'])) {
    $obj->setView($_GET['view']);
}

// Redirect GET request here // 