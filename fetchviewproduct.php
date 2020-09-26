<?php
//Include database connection
include "config.php";
//SELECT * FROM product_tb INNER JOIN importir_tb where importir_tb.id = product_tb.importir_id AND product_tb.id = '1'

if($_POST['rowid']) {
    $productid = $_POST['rowid'];
    $query="SELECT product_tb.name, product_tb.photo, product_tb.qty, product_tb.price, importir_tb.name
                    FROM product_tb INNER JOIN importir_tb where importir_tb.id = product_tb.importir_id AND product_tb.id = ?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$productid);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_array();

    $productname=$row[0];
    $productimage=$row[1];
    $productquantity=$row[2];
    $productprice=number_format($row[3], 2, ',', '.');
    $productimportir=$row[4];
    
 }
?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><?= $productname ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="text-center">
            <img src="<?= $productimage; ?>" height="300" class="img-thumbnail">
        </div>
        <h6 class="text-dark">Price : Rp <?= $productprice ?></h6>
        <h6 class="text-dark">Quantity : <?= $productquantity ?></h6>
        <h6 class="text-dark">Importir : <?= $productimportir ?></h6>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
</div>