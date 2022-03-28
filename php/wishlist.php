<?php
function displayWishlist($id_user)
{
    try {
        include dirname(__FILE__) . "./db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT * FROM wish WHERE id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $value) {
                echo $value[0].'<br>';
            }
        } else {
        echo '<p class="small">No wishlist</p>';
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}