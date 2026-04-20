<?php
require_once '../config/config.php';
$_SESSION['last_activity'] = time();
title_bar("Members area",['css/style.css']);

requireAuthorisation();
$stmt = $pdo->query("SELECT name,surname, email, password FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <section class="container" id="main">
        <table>
            <tbody>
                <tr>

                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Options</th>

                </tr>
              

                    <?php
                    foreach ($rows as $row) {
                        echo "<tr><td>";
                        echo htmlspecialchars($row['name']);
                        echo ("</td><td>");
                        echo htmlspecialchars($row['surname']);
                        echo ("</td><td>");
                        echo htmlspecialchars($row['email']);
                        echo ("</td><td><div class='password-cell'>");
                        echo htmlspecialchars($row['password']);
                        echo '</div></td>';
                        echo ("<td>");
                        echo '<a class="btn2" href="deleteuser.php?deleteid=' . urlencode($row['email']) . '">Delete user</a>';
                        echo ("</td></tr>");
                    }
                    ?>

                
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
    <script src="../js/main.js"></script>
</body>

</html>