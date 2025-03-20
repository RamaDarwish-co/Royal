<!DOCTYPE html>
<html lang="en">

<head>
    <title> Around | Royal</title>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styles/Wer_sind_Win.css">
    
</head>

<body>
    <?php include_once "includes/header.php"; ?>
    <div class="container flex-evn p35 g25">
        <div class="details">
            <h1>Company Details:</h1>
            <p>Royal is a real estate brokerage company

It has gained great respect for its professional transparency and consistently providing high-quality, professional and value-added real estate services.

Since its inception, Royal has gained tremendous fame for its involvement in many projects.

We are committed to providing the best services and achieving your goals with professionalism and efficiency, we will be able to meet your needs and exceed your expectations.</p>

            <a class="btn" href="styles/contact us.css"><i class="fa-solid fa-phone"></i>contact us </a>

        </div>
        <div class="img">
            <!-- <h1>Royal</h1> -->
            <img src="images/Royal.png" alt="Royal">
            <div class="links">
            <?php 
                include "includes/conn.php";
                if($con_m){
                    $sql = mysqli_query($con_m, "SELECT * FROM links");
                    if(mysqli_num_rows($sql) > 0){
                        while($data = mysqli_fetch_assoc($sql)){
                            ?>
                                <a target="_blank" href="<?php echo $data["url"]; ?>"><i class="fa-brands fa-<?php echo $data["title"]; ?>"></i></a>
                            <?php
                        }
                    }
                }
                ?>
                <!-- <a target="_blank" href="facebook"><i class="fa-brands fa-facebook fa-xl" style="color: #0000ee ;"></i></a>
                <a target="_blank" href="telegram"><i class="fa-brands fa-telegram fa-xl" style="color: #1c7ed6 ;"></i></a>
                <a target="_blank" href="whatsapp"><i class="fa-brands fa-whatsapp fa-xl" style="color: #0ca678 ;"></i></a>
                <a target="_blank" href="instagram"><i class="fa-brands fa-instagram fa-xl" style="color: #f58529;"></i></a> -->
            </div>
        </div>
    </div>
    <?php include_once "includes/footer.php" ?>
</body>

</html>