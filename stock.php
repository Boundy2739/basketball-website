<?php
session_start();       
require_once "pdo.php";


if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
 
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
    if ( isset($_POST['itemname']) && isset($_POST['quantity'])&& isset($_POST['price'])){

        $sql = "INSERT INTO items (name, quantity,price) 
        VALUES (:name, :quantity, :price)";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['itemname'],
            ':quantity' => $_POST['quantity'],
            ':price' => $_POST['price']));
        
    }

    $stmt = $pdo->query("SELECT * FROM items");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<html>
    <head>
    <title>Stock</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <table border="1">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Ratings</th>
            <th>Options</th>
        </tr>
        <?php
        foreach ( $rows as $row ) {
            if($row['name'] == NULL){
                $row['name'] = "Missing name!";
            }
            if($row['description'] == NULL){
                $row['description'] = "Missing description!";
            }
            if($row['price'] == NULL){
                $row['price'] = "Missing price!";
            }
            if($row['quantity'] == NULL){
                $row['quantity'] = 0;
            }
            if($row['ratings'] == NULL){
                $row['ratings'] = "No ratings!";
            }
            if($row['image'] == NULL){
                echo "<tr><td>";
                echo'<div class="options">';
                echo'<a clas="btn1" href="upload.php?itemid=' . $row['id'] . '">Upload image</a>';
                echo'</div>';
                echo"</td><td>";}
            else{
                echo "<tr><td>";
                echo'<div class="options">';
                echo'<img src="uploaded_images/'.$row['image'] . '" alt="" width="20%">';
                echo '<a class="btn2" href="deleteimages.php?imageid='.$row['id'].'">Delete image</a>';
                echo'</div>';
                echo"</td><td>";}
            echo(htmlentities($row['name']));
            echo"</td><td>";
            echo(htmlentities($row['description']));
            echo"</td><td>";
            echo(htmlentities($row['quantity']));
            echo"</td><td>";
            echo(htmlentities($row['price']));
            echo"</td><td>";
            echo(htmlentities($row['ratings']));
            echo"</td><td>";
            echo'<div class="options">';
            echo '<a class="btn1" href="updateitem.php?itemid=' . $row['id'] . '">Update item</a>';
            echo '<a class="btn2" href="deleteitem.php?itemid=' . $row['id'] . '">Delete item</a>';
            echo'</div>';
            echo"</td></tr>";
            }
            
        
        ?>
        </table>
    </div>


   
    <p>Add items </p>
    <form method="post" class="login-form">
    <label for="itemname">Item name</label>
    <input type="text" name="itemname" id="itemname" required>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" required>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" required>
    <input type="submit" value="Add New"/>
    <button id="back">Go back to member area</button> 
    <script>
        const goBack = document.getElementById("back");
        goBack.onclick =  () => {
        location.href = "membersarea.php";
    };
    </script>
    </body>
</html>