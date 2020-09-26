<?php 
session_start();
$update = false;
$updateimportir = false;
include "config.php";

$photo="";
//define variable Importir
$importirid="";
$importirName = "";
$importirAddress = "";
$importirPhone = "";

if(isset($_POST['addproduct'])){
    $productName =$_POST['productname'];
    $productImportir=$_POST['productimportir'];
    $productQuantity=$_POST['productquantity'];
    $productPrice=$_POST['productprice'];

    $photo = $_FILES['image']['name'];
    $upload = "images/".$photo;

    $query = "INSERT INTO product_tb (name, importir_id, photo, qty, price) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss",$productName,$productImportir,$upload,$productQuantity,$productPrice);
    $stmt->execute();
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);
    
   header('location:index.php');
    $_SESSION['response'] = "Data Product Successfully Added !";
    $_SESSION['res_type'] = "success";
}

//importir action 
if(isset($_POST['addimportir'])||isset($_POST['addindeximportir']))
{
    $importirName = $_POST['importirname'];
    $importirAddress = $_POST['importiraddress'];
    $importirPhone = $_POST['importirphone'];

    $query = "INSERT INTO importir_tb(name, address, phone) VALUES(?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss",$importirName,$importirAddress,$importirPhone);
    $stmt->execute();
    
    if(isset($_POST['addindeximportir'])){
        header('location:importir.php');
        $_SESSION['response'] = "Data Importir Successfully Added !";
        $_SESSION['res_type'] = "success";
    }
    else{
        header('location:index.php');
        $_SESSION['response'] = "Data Importir Successfully Added !";
        $_SESSION['res_type'] = "success";
    }
    
}

if(isset($_GET['deleteimportir'])){
    $id = $_GET['deleteimportir'];

    //Delete Importir Record
    $query = "DELETE FROM importir_tb WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location:importir.php');
    $_SESSION['response']="Data Importir Succesfully Deleted!";
    $_SESSION['res_type']="danger";

}

if(isset($_GET['editimportir'])){
    $id = $_GET['editimportir'];
    $query="SELECT * FROM importir_tb WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $importirid=$row['id'];
    $importirName=$row['name'];
    $importirAddress=$row['address'];
    $importirPhone=$row['phone'];
    $updateimportir = true;
}

if(isset($_POST['updateImportir'])){
    $importirid = $_POST['idimportir'];
    $importirName = $_POST['importirname'];
    $importirAddress = $_POST['importiraddress'];
    $importirPhone = $_POST['importirphone'];

    $query="UPDATE importir_tb set name=?,address=?,phone=? WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssi",$importirName,$importirAddress,$importirPhone,$importirid);
    $stmt->execute();

    $_SESSION['response']="Updated Data Importir Successfully!";
    $_SESSION['res_type']="primary";
    header('location:importir.php');

}
//end importir data action

if(isset($_POST['updateproduct'])){
    $productid = $_POST['productid'];
    $productname=$_POST['productname'];
    $productimportir=$_POST['productimportir'];
    $productquantity=$_POST['productquantity'];
    $productoldimage=$_POST['productoldimage'];
    $productprice=$_POST['productprice'];

    if(isset($_FILES['productimage']['name'])&&($_FILES['productimage']['name'] !="")){
        $newimage="images/".$_FILES['productimage']['name'];
        unlink($productoldimage);
        move_uploaded_file($_FILES['productimage']['tmp_name'], $newimage);
    }
    else {
        $newimage=$productoldimage;
    }

    $query="UPDATE product_tb set name=?,importir_id=?,photo=?,qty=?,price=? WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sisiii",$productname,$productimportir,$newimage,$productquantity,$productprice,$productid);
    $stmt->execute();

    $_SESSION['response']="Updated Product Successfully!";
    $_SESSION['res_type']="primary";
    header('location:index.php');

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    //delete photo
    $sql = "SELECT photo FROM product_tb WHERE id=?";
    $stmt_del_photo = $conn->prepare($sql);
    $stmt_del_photo->bind_param("i",$id);
    $stmt_del_photo->execute();
    $result_photo = $stmt_del_photo->get_result();
    $row=$result_photo->fetch_assoc();

    $imagepath = $row['photo'];
    unlink($imagepath);
    //Delete Record
    $query = "DELETE FROM product_tb WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location:index.php');
    $_SESSION['response']="Product Succesfully Deleted!";
    $_SESSION['res_type']="danger";

}

?>