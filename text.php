<?php
include "includes/header.php";
$page ="LogIn";
include "includes/menu.php";

if(isset($_POST["log"])){
    $user =$_POST["user"];
	$pwd =md5($_POST["pwd"]);

	$query = mysql_query("SELECT*FROM members WHERE Username ='$user' and Password = '$pwd'") or mysql_error("Error in query");
	$result = mysql_num_rows($query);

	if($result>0){
	  $row = mysql_fetch_assoc($query);
	  $_SESSION["ID"] = $row["id"];
	  $_SESSION["IdNo"] = $row["IdNo"];
	  $_SESSION["name"] = $row["name"];
	  $_SESSION["Dob"] =$row["Dob"];
	  $_SESSION["gender"] =$row["gender"];
	  $_SESSION["MobNo"] = $row["MobNo"];
	  $_SESSION["Email"] = $row["Email"];
	  $_SESSION["Role"] = $row["Role"];
	  $_SESSION["Address"] = $row["Address"];
	  $_SESSION["City"] = $row["City"];
	  $_SESSION["photo"] = $row["photo"];
	  $_SESSION["Username"] = $row["Username"];
	  $_SESSION["DateEntr"] = $row["DateEntr"];

	  echo "<script>alert('Login Successiful');location.href='index.php';</script>";
	}

	else{
	  echo "<script>alert('Sorry. Login failed');</script>";
	}
}
?>

<h4>LogIn</h4>
<form action="LogIn.php" method="post">
<table>
  <tr>
      <td>Username</td>
	  <td> <input type="text" name="user" required></td>
  </tr>

  <tr>
      <td>Password</td>
	  <td><input type="password" name="pwd" required></td>
  </tr>

  <tr>
     <td colspan="2">
	 <input type="submit" name="log" value="Login"></td>
  </tr>
</table>
</form>

<?php
include "includes/footer.php";
