
<html>
<head>
<script type="text/javascript">

</script>
</head>
<body>
<form name="frm" method="post" onsubmit="return validation()">
<p> <input type="text" name="first_name" placeholder="first_Name"> </p>
<p><input type="text" name="last_name" placeholder="last_Name"> </p>
<p><input type="number" name="phone_number" placeholder="phone_Number" > </p>
<p> <input type="submit" name="submit" value="submit"> </p>
</form>
</body>
</html>
<?php

$con = mysqli_connect("remotemysql.com","4lOcsZwv9W","mbwxG3vBOo","4lOcsZwv9W");

if(!$con) {
	echo mysql_connect_error();
	die();
}

if(isset($_POST['submit']))
{
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number= $_POST['phone_number'];
//if (!preg_match('/^[1-9][0-9]{10,10}$/', $value2))
if(strlen($phone_number)!=10)
{
echo 'Please enter a valid phone number';
}
else {
		$stmt = $con->prepare("insert into form(first_name, last_name, phone_number) values(?, ?, ?)");
		$stmt->bind_param("ssi", $first_name, $last_name, $phone_number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$con->close();
	}
}
?>
