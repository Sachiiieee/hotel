<?php

session_start();
require_once 'Database.php';

class Reservation extends Database
{

    private $day, $rate, $add, $sub, $disc, $discTotal, $addTotal, $total;

    public function compute($name, $phone, $from, $to, $type, $cap, $pay)
    {
        date_default_timezone_set('Asia/Manila');

        // get total days
        $start = new DateTime($from);
        $end = new DateTime($to);
        $this->day = ($start->diff($end))->days;

        // get daily rate 
        switch ($cap) {
            case 'Single':
                switch ($type) {
                    case 'Suite':
                        $this->rate = 100.00;
                        break;
                    case 'Deluxe':
                        $this->rate = 300.00;
                        break;
                    case 'Luxury':
                        $this->rate = 500.00;
                        break;
                }
                break;
            case 'Double':
                switch ($type) {
                    case 'Suite':
                        $this->rate = 200.00;
                        break;
                    case 'Deluxe':
                        $this->rate = 500.00;
                        break;
                    case 'Luxury':
                        $this->rate = 800.00;
                        break;
                }
                break;
            case 'Family':
                switch ($type) {
                    case 'Suite':
                        $this->rate = 500.00;
                        break;
                    case 'Deluxe':
                        $this->rate = 750.00;
                        break;
                    case 'Luxury':
                        $this->rate = 1000.00;
                        break;
                }
                break;
        }

        // get additional charge and discount rate
        switch ($pay) {
            case 'Cash':
                $this->add = 0;
                if ($this->day >= 3 && $this->day <= 5) {
                    $this->disc = 0.10;
                } elseif ($this->day >= 6) {
                    $this->disc = 0.15;
                } else {
                    $this->disc = 0;
                }
                break;
            case 'Cheque':
                $this->add = 0.05;
                break;
            case 'Credit Card':
                $this->add = 0.1;
                break;
        }

        // compute subtotal
        $this->sub = $this->rate * $this->day;
        // compute total discount 
        $this->discTotal = $this->sub * $this->disc;
        // compute additional charges
        $this->addTotal = $this->sub * $this->add;
        // compute for the total
        $this->total = $this->sub + $this->addTotal - $this->discTotal;

        // Create an array to view computed values //
        $_SESSION['data'] = [
            'name' => $name,
            'phone' => $phone,
            'from' => $from,
            'to' => $to,
            'room' => $type,
            'cap' => $cap,
            'payment' => $pay,
            'date' => date('F d, Y'),
            'time' => date('h:i a'),
            'days' => $this->day,
            'rate' => $this->rate,
            'sub' => $this->sub,
            'add' => $this->addTotal,
            'disc' => $this->discTotal,
            'total' => $this->total,
        ];

        header('Location: Receipt.php');
    }
    // Create, Read, Update, Delete functions below
    // Create
    public function insert($name, $phone, $date, $time, $from, $to, $room, $cap, $payment, $days, $rate, $sub, $disc, $add, $total, $status)
    {
        $sql = "INSERT INTO reservations VALUES ('', ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$date, $time, $name, $phone, $from, $to, $room, $cap, $payment, $status, $days, $rate, $sub, $add, $disc, $total]);
        $_SESSION['success'] = true;
        return header('Location: index.php');
    }
    // Read
    public function setView($value) {
        if (isset($_SESSION['viewArray'])) {
            unset($_SESSION['viewArray']);
        }
        $viewArray = [];

        // Query reservations
        $sql = "SELECT * FROM reservations WHERE status = ?";
        $stmt = $this->db_connect()->prepare($sql);

        // Add query parameter depending on status to query
        $stmt->execute([$value]);
        // Get row count from query
        while ($row = $stmt->fetch()) {
            array_push($viewArray, $row);
        }
        $_SESSION['page'] = $value;
        $_SESSION['viewArray'] = $viewArray;
        return header('Location: Admin.php');
    }
    // Update
    public function update($id, $status) {
        $sql = "UPDATE reservations SET status = ? WHERE id = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$status, $id]);
        $_SESSION['updatemsg'] = "Status Updated!";
        return header('Location: Receiver.php?view=' . $status);
    }
    // Delete 
    public function delete($id) {
        $sql = "DELETE FROM reservations WHERE id = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$id]);
        $_SESSION['updatemsg'] = "Information Deleted!";
        return header('Location: Receiver.php?view=Pending');
    }
}
