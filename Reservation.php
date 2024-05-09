<?php

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
    }
    public function insert()
    {
    }
}
