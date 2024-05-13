<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cozy Corner</title>
</head>

<body>
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] == true) {
        echo "<script> alert('Reservation successfully submitted!'); </script>";
        unset($_SESSION['success']);
    }
    ?>
    <nav>
        <div>
            <img class="nav-logo" src="images/cclogo.png" alt="logo">
            <span>Cozy Corner</span>
        </div>
        <!-- by section ang location ng href dto so sa section nyo sa babang part ilalagay content nung target page -->
        <!-- if want nyo baguhin tanggalin nyo lng ung mga section sa baba gawan nyo ng mga pages if yon trip nyo, palitan nyo lang ung mga href -->
        <div class="nav-link">
            <div onclick="location.href = '#'">Home</div>
            <div onclick="location.href = '#about'">About Us</div>
            <div onclick="location.href = '#contact'">Contacts</div>
            <div onclick="location.href = 'Form.php'">Reservation</div>
        </div>
    </nav>
    <section id="home">
        <div id="hero">
            <span>Where hospitality feels like home - Book now at Cozy Corner!</span>
            <button onclick="location.href = '#info'">Discover More!</button>
        </div>
        <div id="info">
            <span class="header">Prices that fit your every budget goals!</span>
            <div id="prices">
                <div>
                    <span>Regular</span>
                    <div>
                        <div>
                            <span>Room Capacity</span>
                            <span>Single</span>
                            <span>Double</span>
                            <span>Family</span>
                        </div>
                        <div>
                            <span>Rate per Day</span>
                            <span>Php100</span>
                            <span>Php200</span>
                            <span>Php500</span>
                        </div>
                    </div>
                </div>
                <div>
                    <span>Deluxe</span>
                    <div>
                        <div>
                            <span>Room Capacity</span>
                            <span>Single</span>
                            <span>Double</span>
                            <span>Family</span>
                        </div>
                        <div>
                            <span>Rate per Day</span>
                            <span>Php100</span>
                            <span>Php200</span>
                            <span>Php500</span>
                        </div>
                    </div>
                </div>
                <div>
                    <span>Suite</span>
                    <div>
                        <div>
                            <span>Room Capacity</span>
                            <span>Single</span>
                            <span>Double</span>
                            <span>Family</span>
                        </div>
                        <div>
                            <span>Rate per Day</span>
                            <span>Php100</span>
                            <span>Php200</span>
                            <span>Php500</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="promo">
                <div>
                    <img src="images/person.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="about"></section>
    <section id="contact"></section>
</body>

</html>