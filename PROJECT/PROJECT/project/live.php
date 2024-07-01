<?php
$conn = mysqli_connect("localhost", "root", "", "project") or die("Connection Failed");

// Check if search input is provided
if(isset($_POST["search"]) && !empty($_POST["search"])) {
    $search_value = $_POST["search"];

    $sql = "SELECT * FROM product_detail WHERE `name` LIKE '%$search_value%' OR `nameid` LIKE '%$search_value%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $output = "";
    if(mysqli_num_rows($result) > 0 ){
        $output .= "<table width='70%' class='p-5 text-center'><tr><th>ID</th><th>Name</th><th>Price</th><th></th></tr>";

        while($row = mysqli_fetch_assoc($result)){
            // Create link to shop detail page with product ID
            $output .= "<tr>
                <td><a href='shop-detail.php?id={$row['id']}' style='color: #81c408;'><img src='img/{$row['img']}' style='height:50px;' alt=''></a></td>
                <td><a href='shop-detail.php?id={$row['id']}' style='color: #81c408;'>{$row['name']}</a></td>
                <td>{$row['price']}</td>
            </tr>";
        }
        $output .= "</table>";
    } else {
        $output = "<h2>No Record Found.</h2>";
    }

    echo $output;
} else {
    // If no search input provided, don't display any data
    echo "";
}

mysqli_close($conn);
?>
