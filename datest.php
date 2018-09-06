<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php

$objConnect = mysqli_connect("localhost","root","");

if($objConnect)
{
    echo "MySQL Connected";
}
else
{
    echo "MySQL Connect Failed : Error : ".mysql_error();
}

mysql_close($objConnect);
?>
</body>
</html>