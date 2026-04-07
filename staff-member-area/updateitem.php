<?php
session_start();
require_once "pdo.php";
if (!isset($_SESSION['authorised']) || $_SESSION['authorised'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
else{
$rows = null;

if(!empty($_POST['newname'])){
    $sql = "UPDATE items
            set name =:name
            WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_GET['itemid'],
        ':name' => $_POST['newname']
        
    ));
}
if(!empty($_POST['newprice'])){
        $sql = "UPDATE items
                set price =:price
                WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':price' => $_POST['newprice']
            
        ));    
}
if(!empty($_POST['description'])){
    $sql = "UPDATE items
            set description =:description
            WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_GET['itemid'],
        ':description' => $_POST['description']
        
    ));    
}
if(isset($_GET['itemid'])){
    $sql = "SELECT * from items  where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_GET['itemid']
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update item</title>
</head>
<body>
    <table border="1">
        <?php
        foreach($rows as $row){
        echo("<tr><td>");
        echo(htmlentities($row['name']));
        echo("</td><td>");
        echo(htmlentities($row['quantity']));
        echo("</td><td>");
        echo(htmlentities($row['price']));
        echo("</td>");
        echo("</tr>");
        }
        ?>
    </table>

    <form method="post"> 
        <?php
        foreach($rows as $row){
        echo"<label for='newname'>Rename</label>";
        echo"<input type='text' name='newname' id='newname' value='".$row['name']."' required>";
        echo"<label for='description'>Change description</label>";
        echo"<textarea name='description' id='description' cols='70' rows='10' required>".$row['description']."</textarea>";
        echo"<label for='newprice'>Change price</label>";
        echo"<input type='number' name='newprice' id='newprice' value='".$row['price']."' required>";
        echo"<input type='submit' value='update'>";}
        ?>
    </form>
    <button id="back">go back</button>
    <button id="logout">logout</button>
    <script>
        const btn = document.getElementById("logout");
        btn.onclick =  () => {
        location.href = "logout.php";
    };
        const goBack = document.getElementById("back");
        goBack.onclick =  () => {
        location.href = "stock.php";
    };
    </script>

</body>
</html>