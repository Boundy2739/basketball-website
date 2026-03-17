<?php
require_once "pdo.php";

if (
    isset($_POST['reviewemail']) &&
    isset($_POST['review']) &&
    isset($_POST['star_radio'])
) {
    $sql = "INSERT INTO reviews (email, subject, review, rating,created_at)
            VALUES (:reviewemail, :subject, :review, :star_radio,:date)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':reviewemail' => $_POST['reviewemail'],
        ':subject'    => $_POST['subject'] ?? null,
        ':review'      => $_POST['review'],
        ':star_radio'  => $_POST['star_radio'],
        ':date'  => date("Y-m-d H:i:s"),
    ]);
}
$stmt = $pdo->query("SELECT email, subject, review, rating,created_at FROM reviews");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>





<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>review</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section id="container">
        <?php require 'project_header.php';
        title_bar("") ?>
        <h1>Reviews</h1>
        <form method="post" class="review-form">
            <div class="email-subject">
                <label for="reviewemail">Email</label>
                <input type="text" id="reviewemail" name="reviewemail" placeholder="Please add your email" required>
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Insert the subject">
            </div>

            <div class="star-wrap">
                <fieldset class="star-wrap">
                    <legend>Star rating</legend>

                    <input type="radio" id="st-5" name="star_radio" value="5">
                    <label for="st-5">★</label>

                    <input type="radio" id="st-4" name="star_radio" value="4">
                    <label for="st-4">★</label>

                    <input type="radio" id="st-3" name="star_radio" value="3">
                    <label for="st-3">★</label>

                    <input type="radio" id="st-2" name="star_radio" value="2">
                    <label for="st-2">★</label>

                    <input type="radio" id="st-1" name="star_radio" value="1" required>
                    <label for="st-1">★</label>
                </fieldset>
            </div>
            <label for="review">review</label>
            <textarea type="text" id="review" name="review" placeholder="Please add your review" required></textarea>
            <button type="submit">post review</button>
        </form>
        <table border="1" class="reviews-table">

            <?php
            foreach ($rows as $row) {
                $rating = (float)$row["rating"];
                $meterId = 'rating_' . md5($row['email']);
                echo "<tr><td>";
                echo (htmlentities($row['email']));
                echo ("</td><td>");
                echo (htmlentities($row['subject']));
                echo ("</td><td>");
                echo (htmlentities($row['review']));
                echo ("<td>");
                echo ("</td><td>");
                echo '<label for=' . $meterId . '>Rating:</label>';
                echo "<meter id=\"$meterId\" value=\"$rating\" min=\"0\" max=\"5\" low=\"2\" high=\"4\" optimum=\"5\"></meter>";
                echo ("<td>");
                echo ("</td><td>");
                echo (htmlentities($row['created_at']));
                echo ("<td>");
                echo ("</td></tr>");
            }
            ?>
        </table>
    </section>
    <script src="js/review.js"></script>


</body>

</html>