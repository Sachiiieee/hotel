<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['page'])) {
        header('Location: Receiver.php?view=Pending');
    }
    ?>
    <?php
    if (isset($_SESSION['updatemsg'])) {
        echo "<script> alert('" . $_SESSION['updatemsg'] . "'); </script>";
        unset($_SESSION['updatemsg']);
    }
    ?>
    <nav>
        <div>
            <img class="nav-logo" src="images/cclogo.png" alt="logo">
            <span>Cozy Corner</span>
        </div>
    </nav>
    <!-- Kayo na bahala gumawa ng popup para makita lahat ng info -->
    <!-- Gagawin ko na ung table saka functionality -->
    <main style="padding-top: 4rem; flex-direction: column;">
        <section id="admin-nav">
            <div onclick="location.href = 'Receiver.php?view=Pending'">Pending</div>
            <div onclick="location.href = 'Receiver.php?view=Accepted'">Accepted</div>
            <div onclick="location.href = 'Receiver.php?view=Declined'">Declined</div>
        </section>
        <span class="header" style="color: white;"><?= $_SESSION['page'] ?></span>
        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Check-in Date</th>
                <th>Actions</th>
            </tr>
            <?php
            if (count($_SESSION['viewArray']) < 1) { ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No Records found.</td>
                </tr>
                <?php } else {
                foreach ($_SESSION['viewArray'] as $val) { ?>
                    <tr>
                        <td><?= $val['name'] ?></td>
                        <td><?= $val['num'] ?></td>
                        <td><?= $val['rsvFrom'] ?></td>
                        <td>
                            <form action="Receiver.php" method="post" class="action">
                                <input type="hidden" name="id" value="<?= $val['id'] ?>" />
                                <?php
                                if ($val['status'] == "Pending") { ?>
                                    <button type="submit" name="submit" value="Declined" class="del-btn">Decline</button>
                                    <button type="submit" name="submit" value="Accepted">Accept</button>
                                <?php } else { ?>
                                    <button type="submit" name="submit" value="Delete" class="del-btn">Delete</button>
                                <?php }
                                ?>
                            </form>
                        </td>
                    </tr>
            <?php }
            }
            ?>
        </table>
    </main>
</body>

</html>