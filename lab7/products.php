<?php
require_once('template.php');
$content = '<h1>Products</h1>';
$query = <<<END
SELECT * FROM products
ORDER BY created_at DESC
END;
$res = $mysqli->query($query);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
        if (isset($_SESSION['userid']) && $_SESSION["username"] == "admin") {
            $content .= <<<END
            {$row->name}|
            {$row->price}
            <br>
            <a href="product_details.php?id={$row->id}">Description</a>|<a href="delete_product.php?id={$row->id}" onclick="return confirm('Are you sure?')">Remove Product</a>|<a href="edit_product.php?id={$row->id}">Edit product</a><br>
            <hr>
END;
} else {
    $content .= <<<END
    {$row->name}|
    {$row->price}
    <br>
    <a href="product_details.php?id={$row->id}">Description</a>
    <hr>
END;
        }
    }
}
echo $navigation;
echo $content;
echo $foot;
?>