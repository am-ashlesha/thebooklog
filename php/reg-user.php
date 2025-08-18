<?php
include "../db_conn.php";


if (isset($_POST['register'])){

    $email = $_POST['u_email'];
    $name = $_POST['u_name'];
    $password = $_POST['u_pass'];
    $cpassword = $_POST['u_cpass'];


    //validations
        $query  = $conn -> prepare("SELECT * FROM user WHERE u_email = ?");
        $query -> execute([$email]);
		$result = $query -> rowCount();


    if (empty($name)) {
        $em = "The user name is required";
        header("Location: ../User/userreg.php?error=$em");
        exit;
    }elseif (!preg_match("/^[a-zA-Z\s]+$/",$name)) {
        $em = "The user name is not valid";
        header("Location: ../User/userreg.php?error=$em");
        exit;
    }else if (empty($email)) {
        $em = "The email is required";
        header("Location: ../User/userreg.php?error=$em");
        exit;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $em = "Enter valid email formate";
        header("Location: ../User/userreg.php?error=$em");
        exit;
    }else if (empty($password)) {
            $em = "The password is required";
            header("Location: ../User/userreg.php?error=$em");
            exit;
    }else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/",$password)) {
        $em = "The password can only contain minimum of 5 characters,at least 1 number,one uppercase character,one lowercase character";
        header("Location: ../User/userreg.php?error=$em");
        exit;
    }else if (empty($cpassword)) {
                $em = "The confirm is required";
                header("Location: ../User/userreg.php?error=$em");
                exit;
    }else if ($password != $cpassword) {
                    $em = "The password must be same";
                    header("Location: ../User/userreg.php?error=$em");
                    exit;
    }elseif ($result > 0) {
                    $em = "Email Already Exists";
                    header("Location: ../User/userreg.php?error=$em");
                    exit;
                }else {

        $sql  = "INSERT INTO user (u_name,u_email,u_pass)
                 VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $res  = $stmt->execute([$name,$email,$password]);

         if ($res) {
             # success message
             $sm = "Successfully created!";
            header("Location: ../User/userreg.php?success=$sm");
            exit;
         }else{
             # Error message
             $em = "Unknown Error Occurred!";
            header("Location: ../User/userreg.php?error=$em");
            exit;
         }
    }
}else {
  header("Location: ../User/userreg.php");
  exit;
}
    

?>