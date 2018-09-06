<?php
    $dbconnect = mysqli_connect("localhost","greengift","1234", "givethenget");

    if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    
    if(trim($_POST["firstname"]) == "")
    {
        echo "Please input Firstname!";
        exit(); 
    }
    
    if(trim($_POST["lastname"]) == "")
    {
        echo "Please input Lastname!";
        exit(); 
    }

    if(trim($_POST["username"]) == "")
    {
        echo "Please input Username!";
        exit(); 
    }   
        
    if(trim($_POST["psw"]) == "")
    {
        echo "Please input Password!";
        exit(); 
    }   

    if($_POST["psw"] != $_POST["confpsw"])
    {
        echo "Password not Match!";
        exit();
    }
    
    
    if(trim($_POST["bd"]) == "")
    {
        echo "Please input Birthdate!";
        exit(); 
    }

    if(trim($_POST["adr"]) == "")
    {
        echo "Please input Adress!";
        exit(); 
    }

    $strSQL = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' ";
    $objQuery = mysqli_query($strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if($objResult)
    {
            echo "Username already exists!";
    }
    else
    {   
        
        mysqli_query($dbconnect,"INSERT INTO user (firstname,lastname,username,password,birthdate,address) VALUES ('".$_POST["firstname"]."', 
        '".$_POST["lastname"]."','".$_POST["username"]."','".$_POST["psw"]."','".$_POST["bd"]."','".$_POST["adr"]."')");
        $objQuery = mysqli_query($strSQL);
        
        echo "Register Completed!<br>";     
    
        echo "<br> Go to <a href='login.php'>Login page</a>";

    }

    mysqli_close();
?>