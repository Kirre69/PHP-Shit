<?php
session_name('Website');
session_start();
$host = "localhost";
$user = "kridan23";
$pwd = "_MnNbjaALZ";
$db = "kridan23_db";
$mysqli = new mysqli($host, $user, $pwd, $db);
$head = <<<END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <Title>Webshop</Title>
    <link rel="stylesheet" property="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
END;
$navigation = <<<END
<nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
END;
$foot = <<<END
</body>
</html>
END;
$shit = <<<END
    <p>Hehe you funny, trying to use this edit page with no id XD?</p>
END;
$what = <<<END
    <p>What are you doing here when there is no message to be sent???</p>
END;
if (isset($_SESSION['userid']) && $_SESSION["username"] == "admin")
{
    $navigation .= <<<END
    <a href="register.php">Register new user</a>
    <a href="add_product.php">Add Product</a>
    <a href="products.php">Products for Sale</a>
    <a href="logout.php">Logout</a>
    Logged in as {$_SESSION['username']}
END;
} else if (isset($_SESSION['userid'])) {
    $navigation .= <<<END
    <a href="products.php">Products for Sale</a>
    <a href="logout.php">Logout</a>
    Logged in as {$_SESSION['username']}
END;
} else {
    $navigation .= <<<END
    <a href="login.php">Login</a>
END;
}
$navigation .= '</nav>';
echo $head;
?>