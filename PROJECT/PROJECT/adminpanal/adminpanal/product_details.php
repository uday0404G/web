<?php
include "config.php";
$limit = 5;

if(isset($_POST['page_no'])) {
    $page = ($_POST['page_no'] - 1) * $limit;
} else {
    $page = 0;
}

$sql = "SELECT * FROM `product_detail` LIMIT $page, $limit";
$res = mysqli_query($con, $sql);

if($res) {
    if(mysqli_num_rows($res) > 0) {
        $output = "";

        while($row = mysqli_fetch_assoc($res)) {
            $last_id = $row['id'];
            $output .= "
            <tr class='animate__animated animate__slideInDown'>
                <td><img src='img/{$row['img']}' style='height:50px;' alt=''></td>
                <td>{$row['name']}</td>
                <td>{$row['nameid']}</td>
                <td>{$row['price']}</td>
            </tr>";
        }

        $output .= "<tr id='tr'><td><button type='button' id='btn'  class='btn btn-secondary rounded-pill m-3' data-id='{$last_id}'>Shop All Products</button></td></tr>"; 
        echo $output;
    } else {
        echo ""; // No data found
    }
} else {
    echo "Error: " . mysqli_error($con); // Output error message
}
?>
