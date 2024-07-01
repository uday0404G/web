<?php
include "config.php";
$limit = 8;

if(isset($_POST['page_no'])) {
    $page = ($_POST['page_no'] - 1) * $limit;
} else {
    $page = 0;
}

$sql = "SELECT * FROM `product_detail` LIMIT $page, $limit";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
    $output = "";

    while($row = mysqli_fetch_assoc($res)) {
        $last_id=$row['id'];
        $output .= " 
        <div class='col-md-6 col-lg-4 col-xl-3 aaa'>
        <a href='shop-detail.php?id={$row['id']}' >
                        <div class='rounded position-relative fruite-item'>
                            <div class='fruite-img '>
                                <img src='img/{$row['img']}' class='img-fluid  rounded-top imgh'  alt=''>
                            </div>
                            <div class='text-white px-3 py-1 rounded position-absolute' style='top: 10px; left: 10px; background-color: #ffb524;'>Fruits</div>
                            <div class='p-4 border border-secondary text-dark border-top-0 rounded-bottom'>
                                <h4>{$row['name']}</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class='d-flex justify-content-between flex-lg-wrap'>
                                    <p class='text-dark fs-5 fw-bold mb-0'>$ {$row['price']} /kg</p>
                                    <a href='shop-detail.php?id={$row['id']}' class='btn border  aa rounded-pill px-3' style='color: #81c408;'>
                                        <i class='fa fa-shopping-bag me-2' style='color: #81c408;'></i> Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    ";
    }

    $output .= "<button type='button' id='btn' class='btn btn-secondary rounded-pill m-3' data-id='{$last_id}'>Shop All Products</button>"; 
    echo $output;
} else {
    echo "";
}
?>
