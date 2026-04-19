<?php
require_once "./functions/pdo.php";
require './templates/project_header.php';
title_bar("Reviews");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['review']) &&
        isset($_POST['star_radio']) &&
        $_POST['star_radio'] >= 1 &&
        $_POST['star_radio'] <= 5
    ) {
        $firstname = trim($_POST['reviewfname'] ?? '');
        $lastname  = trim($_POST['reviewlname'] ?? '');
        $rating = (int) $_POST['star_radio'];
        $review = trim($_POST['review']);

        if ($review === '') {
            header('Location: review.php');
            exit;
        } elseif (strlen($review) < 10) {
            header('Location: review.php');
            exit;
        } elseif (strlen($review) > 500) {
            header('Location: review.php');
            exit;
        }

        if ($firstname === '') {
            $firstname = "Anonymous";
        }
        if ($lastname === '') {
            $lastname = "Uset";
        }
        $sql = "INSERT INTO reviews (firstname, lastname, review, rating,created_at)
                VALUES (:reviewfname, :reviewlname, :review, :star_radio,:date)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':reviewfname' => $firstname,
            ':reviewlname'    => $lastname,
            ':review'      => $_POST['review'],
            ':star_radio'  => $rating,
            ':date'  => date("Y-m-d H:i:s"),
        ]);
    }
}
$stmt = $pdo->query("SELECT firstname, lastname,subject, review, rating,created_at FROM reviews");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>review</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <main id="main">
        <h1 class="review-title">Leave a review!</h1>
        <form method="post" class="review-form">
            <div class="names-input-fields">
                <label for="reviewfname">Firstname:</label>
                <input type="text" id="reviewfname" name="reviewfname" placeholder="Add your Firstname">
                <label for="reviewlname">Lastname:</label>
                <input type="text" id="reviewlname" name="reviewlname" placeholder="Add your Lastname">
            </div>

            <div class="star-div">
                <fieldset class="star-wrap">
                    <legend>Rate us!</legend>

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

            <div class="textarea-div">
                <label for="review">Your reveiw:</label>
                <textarea type="text" id="review" name="review" placeholder="Please add your review" required></textarea>
            </div>

            <button type="submit">post review</button>
        </form>

        <section class="reviews-section">
            <?php
            foreach ($rows as $row) {
                echo '<article class="user-reviews-box">';
                echo '<header class="review-header">';
                echo '<div class="profile-pic">👤</div>';
                echo '<p class="user-name">';
                echo (htmlentities($row['firstname']));
                echo ' ';
                echo (htmlentities($row['lastname']));
                echo '</p>';
                echo '<section>';
                for ($x = 1; $x <= $row['rating']; $x++) {
                    echo '<span class="fa fa-star checked"></span>';
                }
                echo '</section></header>';

                echo '<p class="user-review">';
                echo (htmlentities($row['review']));
                echo '</p>';

                echo '<footer class="review-footer">
                      <time datetime="' . $row['created_at'] . '">
                        Uploaded date: ' . $row['created_at'] . '
                      </time>
                      </footer>';
                echo '</article>';
            }
            ?>
        </main>

</body>

</html>