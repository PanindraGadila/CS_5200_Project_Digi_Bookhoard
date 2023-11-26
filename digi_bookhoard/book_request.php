<?php
require_once('includes/config.php');
if (!empty($_POST["bookid"])) {
    $sql = "SELECT * FROM tblbooks WHERE ISBNNumber LIKE  ? ORDER BY BookName LIMIT 0,5";
    $query = $pdo->prepare($sql);
    $value = $_POST["bookid"];
    $query->bindValue(1, "%$value%", PDO::PARAM_STR);
    // $query->bindParam(':s', $value, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($results)) {
?>
        <ul id="book-list">
            <?php
            foreach ($results as $book) {
                $new_str = $book["ISBNNumber"] . " - " . $book["BookName"];
            ?>
                <li onClick="selectBook('<?php echo $book["ISBNNumber"]; ?>');">
                    <?php echo $new_str; ?>
                </li>
            <?php
            } // end for
            ?>
        </ul>
<?php
    } // end if not empty
}
?>