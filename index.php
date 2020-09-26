<?php 
    include "config.php";
    include "action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepeda Dumbways</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
 </head>
<body>
    <div class="header mb-5">
        <div class="container">
            <div class="row p-4">
                <div class="col logo text-light">
                  <b><font color="white">DW-</font><font color="red">Bicycle</font></b>
                </div>
                <div class="col text-right">
                    <a href="importir.php" type="button" class="btn btn-danger">Data Importir</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addImportirForm">
                        Add Importir
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ProductForm">
                        Add Product
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- notifikasi -->
    <?php if(isset($_SESSION['response'])) {?>
        <div class="container">
            <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b><?= $_SESSION['response'];?></b>        
            </div> 
        </div>
                 
    <?php } unset($_SESSION['response']);?>

    <!-- Modal Form Add Importir -->
    <div class="modal fade" id="addImportirForm" tabindex="-1" role="dialog" aria-labelledby="addImportirFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Importir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="action.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name Importir</label>
                    <input name="importirname" class="form-control" id="exampleFormControlInput1" placeholder="Enter Importir Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea name="importiraddress" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input name="importirphone" class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" name="addimportir" class="btn btn-primary" value="Save Data"/>
            </div>
            </form>
            </div>
    </div>
    </div>
    <!-- end of Form Add Importir -->
    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProduct" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
    <!-- End Edit Form Modal -->
    <!-- Modal View Product -->
    <div class="modal fade" id="viewProduct" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="fetched-data"></div>
        </div>
    </div>
    <!-- End Modal View Product -->
    <!-- Modal Form Add Product -->
    <div class="modal fade" id="ProductForm" tabindex="-1" role="dialog" aria-labelledby="productFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="action.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product Name</label>
                    <input type="text" class="form-control" name="productname" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Importir</label>
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
                            echo "<option value='$importirid'>$importirname</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="image" class="custom-file" id="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity Product</label>
                    <input type="text" class="form-control" name="productquantity" placeholder="Enter Product Quantity">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <span>Rp. </span><input type="text" name="productprice" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php 
                    if($update == true){
                ?>
                <input type="submit" name="updateproduct" class="btn btn-primary" value="Update Data"/>
                <?php
                    } else {
                ?>
                <input type="submit" name="addproduct" value="Add Record" class="btn btn-primary">
                <?php } ?>
            </div>
            </form>
            </div>
    </div>
    </div>

    <!-- end of Form Add Importir -->

    <div class="container">
        <div class="row">
        <?php 
            $query = "SELECT * FROM product_tb INNER JOIN importir_tb where product_tb.importir_id = importir_tb.id ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
            while($row = $result->fetch_array()) 
            { 
                $productimportir = substr($row[7], 0, 9)."...";
                $price = number_format($row[5], 0, ',', '.');
         ?>
            <div class="col-md-3">
                <div class="card p-2 card-product">
                    <img src="<?= $row['photo'];?>" width="100%" height="180px" class="card-img-bottom" alt="product-image">
                    <div class="row">
                        <div class="col productname text-light"><b><?= $row[1];?></b></div>
                        <div class="col product-importir text-right"><?= $productimportir;?></div>
                    </div>
                    <div class="row">
                        <div class="col product-price text-danger"><b>Rp. <?= $price;?></b></div>
                        <div class="col product-stock text-right">Stock : <?= $row[4];?></div>
                    </div>
                    <a href="#viewProduct" class="btn btn-primary mb-2" data-toggle="modal" data-id ="<?= $row['0'];?>">View Detail</a>
                    <a href="#editProduct" class="btn btn-success mb-2" data-toggle="modal" data-id ="<?= $row['0'];?>">Edit</a>
                    <a href="action.php?delete=<?= $row['0'];?>" class="btn btn-danger " onclick="return confirm('Do you want to delete this record ? \n Product Name : <?= $row['1']?> ');">Delete</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<script>
$(document).ready(function(){
    $('#editProduct').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetchupdateproduct.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });

     $('#viewProduct').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetchviewproduct.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});

</script>
</body>
</html>