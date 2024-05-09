<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reservation</title>
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
        if (isset($_SESSION['view']) && $_SESSION['view'] == "overview") {
            // Display receipt overview here //
        } else {
            // Display reservation form here // 
        ?>
            <form action="Receiver.php" method="post">
                <div class="form-body">
                    <div class=" form-header header">
                        Cozy Corner Online Reservation
                    </div>
                    <div class=" header">
                        Customer Information
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <span>Name</span>
                            <input type="text" name="csname" placeholder="Juan dela Cruz" required>
                        </div>
                        <div class=" form-control">
                            <span>Contact Number</span>
                            <input type="text" name="phone" placeholder="0900-000-0000" inputmode="numeric" required>
                        </div>
                    </div>
                    <div class="header">
                        Reservation Details
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <span>From</span>
                            <input type="date" name="start" id="" required>
                        </div>
                        <div class="form-control">
                            <span>To</span>
                            <input type="date" name="end" id="" required>
                        </div>
                    </div>
                    <div class="header">
                        Room Details
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <span><strong>Type</strong></span>
                            <div>
                                <div>
                                    <input type="radio" name="type" value="Suite" required>
                                    <label>Suite</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="Deluxe">
                                    <label>De Luxe</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="Regular">
                                    <label>Regular</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-control">
                            <span><strong>Capacity</strong></span>
                            <div>
                                <div>
                                    <input type="radio" name="cap" value="Family" required>
                                    <label>Family</label>
                                </div>
                                <div>
                                    <input type="radio" name="cap" value="Double">
                                    <label>Double</label>
                                </div>
                                <div>
                                    <input type="radio" name="cap" value="Single">
                                    <label>Single</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-control">
                            <span><strong>Payment Type</strong></span>
                            <div>
                                <div>
                                    <input type="radio" name="payment" value="Cash" required>
                                    <label>Cash</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="Cheque">
                                    <label>Cheque</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="Credit Card">
                                    <label>Credit Card</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" form-action">
                    <button type="reset">Clear Entry</button>
                    <button type="submit" name="submit" value="form">Submit Reservation</button>
                </div>
            </form>
        <?php }
        ?>
    </main>
</body>

</html>