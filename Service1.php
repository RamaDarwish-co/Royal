<!DOCTYPE html>
<html lang="en">

<head>
    <title>Service1 | Royal </title>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styles/service.css">


</head>

<body>
    <?php include_once "includes/header.php"; ?>


    <?php
    include "includes/conn.php";
    if ($conn) {
        $sql = mysqli_query($conn, "SELECT * FROM `service` WHERE `S_id`= " . $_GET["s"]);
        if (mysqli_num_rows($sql) == 1) {
            $data = mysqli_fetch_assoc($sql);


    ?>
            <div class="back" style="background-image: url(<?php echo "images/" . $data["s_image"]; ?>);"></div>
            <div class="container flex-evn p25 g25" style="padding-top:70px ;">
                <div class="img">
                    <h2><?php echo $data["s_name"]; ?></h2>

                    <img src="images/<?php echo $data["s_image"]; ?>" alt="<?php echo $data["s_name"]; ?>" class="rad15">

                    <a class="btn" href="contact_us"><i class="fa-solid fa-phone"></i>Contact us </a>
                </div>

                <div class="steps">
                    <ul>
                <?php
            }

            $query = mysqli_query($conn, "SELECT * FROM `step` WHERE s_id =" . $_GET["s"]);
            if (mysqli_num_rows($query) > 0) {
                while ($dt = mysqli_fetch_assoc($query)) {
                    echo '<li><i class="fa-solid fa-check"></i>' . $dt['st_text'] . '</li>';
                }
            }
        }
                ?>


                <a class="btn" href="commercial.php"><i class="fa-solid fa-phone"></i>Commercial</a>
                <a class="btn" href="residential.php"><i class="fa-solid fa-phone"></i>Residential </a>

               
                    </ul>
                </div>
            </div>
            <?php include_once "includes/footer.php"; ?>

</body>

</html>