<?php 
    include "config.php";
    include "action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OOP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">Toko Sepeda</h3>
                <hr/>
                <?php if(isset($_SESSION['response'])) {?>
                <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <b><?= $_SESSION['response'];?></b>
                </div>   
                <?php } unset($_SESSION['response']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3 class="text-center text-info">
                    <?php 
                        if($updateimportir == true){
                            echo "Update Data Importir";
                        }
                        else {
                            echo "Add Data Importir";
                        }
                    ?>
                    </h3>
                <form action="action.php" method="post">
                    <input type="hidden" name="idimportir" value="<?= $id; ?>">
                    <div class="form-group">
                        <input type="text" value="<?= $importirName; ?>" name="importirname" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="importiraddress" class="form-control" placeholder="Enter Address" required><?= $importirAddress; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $importirPhone; ?>" name="importirphone" class="form-control" placeholder="Enter Phone" required>
                    </div>  
                    <div class="form-group">
                    <?php 
                        if($updateimportir == true){
                    ?>
                         <input type="submit" name="updateImportir" value="Update Record" class="btn btn-success btn-block">
                    <?php
                        } else {
                    ?>
                        <input type="submit" name="addindeximportir" value="Add Record" class="btn btn-primary btn-block">
                    <?php } ?>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <?php 
                    $query = "SELECT * FROM importir_tb";
                    $stmt=$conn->prepare($query);
                    $stmt->execute();
                    $result=$stmt->get_result();
                ?>
                <h3 class="text-center text-info">Data Importir</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($row = $result->fetch_assoc()) 
                    {      
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['address']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td>
                                <a href="importir.php?editimportir=<?= $row['id'];?>" class="badge badge-success p-2">Edit</a> |
                                <a href="action.php?deleteimportir=<?= $row['id'];?>" class="badge badge-danger p-2" 
                                    onclick="return confirm('Do you want to delete this record ? \n Name : <?= $row['name']?> ');">Delete</a>
                            </td>
                        </tr>
                        <?php 
                        $no++;
                    } ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary">Data Product</a>
            </div>
        </div>
    </div>
</body>
</html>