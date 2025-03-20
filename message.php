<?php
    use PHPMailer\PHPMailer\PHPMailer;
    include "includes/conn.php";
    if($con_p){
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
        $mail->Subject = $_POST["sb"];
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