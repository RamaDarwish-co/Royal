<!DOCTYPE html>
<html lang="en">

<head>
    <title>service | Royal</title>
    <?php include_once  "includes/head.php"; ?>
    <link rel="stylesheet" href="styles/service.css">

</head>

<body>
    <?php include_once "includes/header.php"; ?>

    <div class="start flex-cen ">
        <video src="images/froyal.mp4"  loop autoplay style="width:100% ; height:110% ;"></video>
        <div class="back flex-cen p25">
            <h1 class="text-grad"> Services We Provide </h1>
            
        </div>
    </div>



    <div class="services flex-evn p25 g35">
        <?php
        include "includes/conn.php";
        if ($conn) {
            $sql = mysqli_query($conn, "SELECT * FROM `service`");
            if (mysqli_num_rows($sql) > 0) {
                while ($data = mysqli_fetch_assoc($sql)) {
        ?>
                    <div class="box flex-cen">
                        <div class="color"></div>
                        <div class="service grid g5">
                            <h2><?php echo $data["s_name"]; ?></h2>
                            <img src="images/<?php echo $data["s_image"]; ?>"  alt="image royal">
                            <a href="Service1?s=<?php echo $data["s_id"]; ?>" class="btn">View Details</a>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>

    </div>
    <?php include_once "includes/footer.php"; ?>

</body>

</html>