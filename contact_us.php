<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us | Royal</title>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styles/contact us.css">
</head>
<body>
    <?php include_once "includes/header.php"; ?>

    <form action="" method="post">

<div class="container p25 flex-cen ">
    <div class="box flex-bet p25 g25 rad20">
        <h2>Send a message</h2>
        <div class="input-box">
            <input type="text" name="firstname" id="firstname" require autofocus tabindex="1" >
            <label for="firstname">firstname</label>
        </div>
        <div class="input-box">
            <input type="text" name="lastname" id="lastname" require  tabindex="2" >
            <label for="lastname">Nickname</label>
        </div>
        <div class="input-box">
            <input type="text" name="phone" id="phone" require  tabindex="3">
            <label for="phone">phone</label>
        </div>
        <div class="input-box">
            <input type="email" name="email" id="email" require  tabindex="4">
            <label for="email">E-Mail</label>
        </div>
        <div class="input-box">
            
            <select name="prfcttime" id="prfcttime" tabindex="7">
                <option selected hidden></option>
                
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <label for="prfcttime">right timing</label>
        </div>
        <div class="input-box">
            <textarea name="subject" id="subject" require  tabindex="6"></textarea>
            <label for="subject"> subject</label>
            
        </div>
        <div class="input-box">
            <input type="text" name="service" id="service" require  tabindex="8"  list="s_names">
            <label for="service">service</label>
            <datalist id="s_names">
                <?php 
                include "includes/conn.php";
                $sql = mysqli_query($conn,"SELECT `s_name` FROM `service`");
                if(mysqli_num_rows($sql) > 0 ){
                    while ($d = mysqli_fetch_assoc($sql)){
                        
                            echo '<option value="' . $d["s_name"] . '>' . $d["s_name"] . '</option>';
                            
                        }
                    }
                    
                    ?>
                </datalist>
                <div class="input-box">
                    <textarea name="address" id="address" require  tabindex="5" ></textarea>
                    <label for="address">the address </label>
                    
                </div>
            <button class="btn">send <i class="fa-solid fa-envelope"></i></button>

            <div class="links">
                <a target="_blank" href="https://www.facebook.com/share/15qotbTBCJ/?mibextid=qi2Omg"><i class="fa-brands fa-facebook fa-xl" style="color: #0000ee ;"></i></a>
                <a target="_blank" href="https://t.me/rawanaldar"><i class="fa-brands fa-telegram fa-xl" style="color: #1c7ed6 ;"></i></a>
                <a target="_blank" href="tel:00971566122100"><i class="fa-brands fa-whatsapp fa-xl" style="color: #0ca678 ;"></i></a>
                <a  target="_blank" href="https://www.instagram.com/rawan.darwish.96?igsh=MXJsZG8yZnllMzJ0cQ=="><i class="fa-brands fa-instagram fa-xl" style="color: #f58529;"></i></a>
            </div>
            </div>

        </div>
    </div>
    <?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     include "includes/conn.php";
     if($conn && isset($_POST["send"])){
         require 'PHPMailer-master/src/Exception.php';
         require 'PHPMailer-master/src/PHPMailer.php';
         require 'PHPMailer-master/src/SMTP.php';
         $mail = new PHPMailer(true);
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'ramdarwish03@gmail.com';
         $mail->Password = 'ward2003ward';
         $mail->SMTPSecure = 'ssl';
         $mail->Port = 465;
         $mail->setFrom('ramdarwish03@gmail.com');
 
         // البريد الحديث للشركه
         $mail->addAddress('Info@royalelegantuae.com');
         $mail->isHTML(true);
         $mail->Subject = $_POST["Subject"];
         $mail->Body = 
         "First Name: " . $_POST["First Name"] . "<br>" .
         "Last Name: " . $_POST["Last Name"] . "<br>" . 
         "Phone: " . $_POST["Phone"] . "<br>" . 
         "E-Mail: " . $_POST["E-Mail"] . "<br>" . 
         "Address: " . $_POST["Address"] . "<br>" . 
         "Subject: " . $_POST["Subject"] . "<br>" . 
         "Time: " . $_POST["Time"] . "<br>" . 
         "service: " . $_POST["service"] . "<br>"
         ;
         $mail->send();
         $sql = $con_p->prepare('INSERT INTO `message`(`m_first_name`, `m_last_name`, `m_phone`, `m_email`, `m_address`, `m_subject`, `m_prfct_time`, `s_title`)
         VALUES (:first, :last, :phone, :email, :address, :subject, :time, :title);');
         $sql->bindParam("first", $_POST["First Name"]);
         $sql->bindParam("last", $_POST["Last Name"]);
         $sql->bindParam("phone", $_POST["Phone"]);
         $sql->bindParam("email", $_POST["E-Mail"]);
         $sql->bindParam("address", $_POST["Address"]);
         $sql->bindParam("subject", $_POST["Subject"]);
         $sql->bindParam("time", $_POST["Time"]);
         $sql->bindParam("title", $_POST["service"]);
         if($sql->execute()){
             echo 'success';
         }
     }
    ?>
</form>
<?php include_once "includes/footer.php"; ?>
<script src="scripte/msg.js"></script>

</body>
</html>