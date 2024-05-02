<?php
include('template.php');
if (isset($_POST['username']) and isset($_POST['password'])) {
    $name = $mysqli->real_escape_string($_POST['username']);
    $pwd = $mysqli->real_escape_string($_POST['password']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $fname = $mysqli->real_escape_string($_POST['fname']);
    $lname = $mysqli->real_escape_string($_POST['lname']);
    $query = <<<END
    INSERT INTO users(username,password,email,fname,lname)
    VALUES('{$_POST['username']}','{$_POST['password']}','{$_POST['email']}','{$_POST['fname']}','{$_POST['lname']}')
END;
  if ($mysqli->query($query) !== TRUE) {
    die("Could not query database". $mysqli->errno . " : " . $mysqli->error);
    header('Location:index.php');
  }
}
$content = <<<END
<form method="post" action="register.php">
<input type="text" name="username" placeholder="Username"><br>
<input type="password" name="password" placeholder="Password"><br>
<input type="text" name="email" placeholder="Email"><br>
<input type="text" name="fname" placeholder="First name"><br>
<input type="text" name="lname" placeholder="Last name"><br>
<input type="submit" value="Register">
<input type="Reset" value="reset">
</form>
END;
echo $navigation;
echo $content;
echo $foot;
?>