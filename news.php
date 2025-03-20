<!DOCTYPE html>
<html lang="en">

<head>
    <title> news | Royal </title>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styles/news.css">
</head>

<body>
    <?php include_once "includes/header.php"; ?>

    <div class="container flex-cen p35 g35">
        <?php
        include "includes/conn.php";
        if ($conn) {
            $sql = mysqli_query($conn, "SELECT * FROM `news`");
            if (mysqli_num_rows($sql)) {
                while ($data = mysqli_fetch_assoc($sql)) {
        ?>

                    <div class="news rad25  flex-cen  p35 g35">
                        <div class="text">
                            <h2><?php echo $data["n_title"]; ?></h2>
                            <p><?php echo $data["n_subject"]; ?>
                            </p>

                            <div class="flex-bet">

                                <a href="residential.php" class="button" style="color: var(--www);"><i class="fa-solid fa-share"></i>See more</a>
                                <a href="contact_us" class="button"style="color: var(--www);"><i class="fa-solid fa-phone" ></i>Contact us</a>

                            </div>
                        </div>
                        <div class="img">
                            <img class="rad15" src="images/<?php echo $data["n_image"]; ?>" alt="Royal">
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>

    <?php include_once "includes/footer.php" ?>
</body>

</html>