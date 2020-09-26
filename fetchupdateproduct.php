<?php
//Include database connection
include "config.php";

if($_POST['rowid']) {
    $id = $_POST['rowid']; 
    $query="SELECT * FROM product_tb WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $productid=$row['id'];
    $productname=$row['name'];
    $productimportirid=$row['importir_id'];
    $productimage=$row['photo'];
    $productqty=$row['qty'];
    $productprice=$row['price'];
 }
?>
<form action="action.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="productid" value="<?= $productid ?>">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control" name="productname" value="<?= $productname ?>"placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label for="productimportir">Select Importir</label>
            <select class="form-control" name="productimportir">
            <?php 
                $queryImportir = "SELECT id, name FROM importir_tb";
                $stmtImportir =$conn->prepare($queryImportir);
                $stmtImportir->execute();
                $resultImportir=$stmtImportir->get_result();
                while($rowImportir = $resultImportir->fetch_array()) 
                { 
                    $importirid = $rowImportir['id'];
                    $importirname = $rowImportir['name'];
                    ?>
                    <option <?php if($productimportirid == $importirid) {echo "selected "; } ?>value='<?= $importirid ?>'> <?= $importirname ?></option>
                    <?php 
                }               
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Photo</label>
            <input type="hidden" name="productoldimage" value="<?= $productimage; ?>">
            <input type="file" name="productimage" class="custom-file" id="">
            <img src="<?= $productimage; ?>" width="120" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Quantity Product</label>
            <input type="text" class="form-control" name="productquantity" value="<?= $productqty ?>" placeholder="Enter Product Quantity">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <span>Rp. </span><input type="text" name="productprice" class="form-control" value="<?= $productprice ?>" placeholder="Enter Product Price">
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="updateproduct" class="btn btn-success" value="Update Data"/>
        </div>
</form>