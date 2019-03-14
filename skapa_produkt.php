<?php require_once "connect.php"; 




//Generera nytt id till varje produkt som skapas

$getId = $pdo->prepare("SELECT MAX(productCode) FROM products");
        $getId->execute();
        $result = ($getId->fetchColumn());      
        $text =  substr($result, 0, 4);     
        $int =  substr($result, 4);
        $int += 1;
        $nyttId = $text.$int;

        //echo $nyttId;

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The C of CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="produktlista.css">
</head>
<body>
    <?php require_once "dbprocess.php" ?>

<h1>Create new product</h1>
    
<form action="dbprocess.php" method="POST">
    <label>Product Code</label><br>
    <input type="text" name="productCode" readonly value="
<?php
    echo $nyttId;
?>

    "><br><br>
    <label>Product Name</label><br>
    <input type="text" name="productName" placeholder="Product name"><br><br>
    <label>Product line</label><br>
    <select name="productLine">
        <option name="productLine ">Motorcycles</option>
        <option name="productLine ">Classic Cars</option>
        <option name="productLine ">Planes</option>
        <option name="productLine ">Ships</option>
        <option name="productLine ">Trains</option>
        <option name="productLine ">Trucks & Buses</option>
        <option name="productLine ">Vintage Cars</option>
    </select><br><br>
    <label>Product scale</label><br>
    <input type="text" name="productScale" placeholder="Product scale"><br><br>
    <label>Product vendor</label><br>
    <input type="text" name="productVendor" placeholder="Vendor"><br><br>
    <label>Product description</label><br>
    <input type="text" rows="10"; name="productDescription"><br><br>
    <label>Quantity in stock</label><br>
    <input type="number" name="quantityInStock" placeholder="Quantity in stock"><br><br>
    <label>Buyprice</label><br>
    <input type="number" name="buyPrice" placeholder="Buyprice"><br><br>
    <label>Manufacturer's suggested retail price</label><br>
    <input type="number" name="MSRP" placeholder="MSRP"><br><br>
    <button type="submit" name="save">Save</button><br><br>
</form>


</body>
</html>






<!-- <!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The C of CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="produktlista.css">
</head>
<body>
    <?php require_once "dbprocess.php" ?>

<h1>Create new product</h1>
    
<form action="dbprocess.php" method="POST">
    <label>Product Name</label><br>
    <input type="text" name="productName" placeholder="Product name"><br><br>
    <label>Product line</label><br>
    <select name="productLine">
        <option value="productLine ">Motorcycles</option>
        <option value="productLine ">Classic Cars</option>
        <option value="productLine ">Planes</option>
        <option value="productLine ">Ships</option>
        <option value="productLine ">Trains</option>
        <option value="productLine ">Trucks & Buses</option>
        <option value="productLine ">Vintage Cars</option>
    </select><br><br>
    <label>Product scale</label><br>
    <input type="text" name="productScale" placeholder="Product scale"><br><br>
    <label>Product vendor</label><br>
    <input type="text" name="productVendor" placeholder="Vendor"><br><br>
    <label>Product description</label><br>
    <input type="text" rows="10"; name="productDescription"><br><br>
    <label>Quantity in stock</label><br>
    <input type="number" name="quantityInStock" placeholder="Quantity in stock"><br><br>
    <label>Buyprice</label><br>
    <input type="number" name="buyPrice" placeholder="Buyprice"><br><br>
    <label>Manufacturer's suggested retail price</label><br>
    <input type="number" name="MSRP" placeholder="MSRP"><br><br>
    <button type="submit" name="save">Save</button><br><br>
</form>


</body>
</html> -->