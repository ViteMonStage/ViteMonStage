<?php
function displayWishlist($id_user)
{
    function shortenString($string)
    {
        if (strlen($string) > 150) {
            $string = substr($string, 0, 150) . "...";
        }
        return $string;
    }
    try {
        include dirname(__FILE__) . "./db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT offers.description, offer_name, offers.id_company, company_name, sector_activity, 
        visible, company.description,id_address,address.id_city, 
        zipcode, cityname,offer_date,offers.id_offer
        FROM wish
        INNER JOIN offers ON wish.id_offer = offers.id_offer
        INNER JOIN company ON company.id_company = offers.id_company
        INNER JOIN address ON company.id_company = address.id_company
        INNER JOIN city ON address.id_city = city.id_city
        WHERE wish.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $value) : ?>
                <div class="result">
                    <img src="./assets/pictures/logo2.jpg" alt="Logo 2" class="logoentreprise">
                    <div class="in_desc">
                        <h3 class="medium"><?php echo $value[3] ?> • <?php echo $value[1] ?></h3>
                        <p class="mini">Description : <?php echo shortenString($value[0]) ?></p>
                        <h4 class="mini loca"><?php echo $value[10] ?> (<?php echo $value[9] ?>) - Publication date : <?php echo $value[11] ?> - <?php echo $value[4] ?></h4>
                    </div>
                    <a href="offers_detail.php?id_offer=<?php echo $value[12] ?>" role="button" class="small btn offer">See offer</a>
                </div> ;
            <?php endforeach;
        } else { ?>
            <p class="small">No wishlist</p>
<?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function isInWishlist($id_user, $id_offer)
{
    include dirname(__FILE__) . "./db.php"; //Used to get global pdo
    $stm = $pdo->prepare('SELECT offers.id_company, visible,offers.id_offer,wish.id_user
        FROM wish
        INNER JOIN offers ON wish.id_offer = offers.id_offer
        INNER JOIN company ON company.id_company = offers.id_company
        INNER JOIN address ON company.id_company = address.id_company
        INNER JOIN city ON address.id_city = city.id_city
        WHERE wish.id_user=? AND wish.id_offer=?');
    $stm->bindParam(1, $id_user);
    $stm->bindParam(2, $id_offer);
    $stm->execute();
    $row = $stm->fetchAll();
    if (isset($row[0]) == 1) {
        return true;
    }
    return false;
}
function addInWishlist($id_user, $id_offer)
{
    try {
        if (!offerExists($id_offer)) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $id_offer);
        } else {
            //header("Location: http://".$_SERVER['HTTP_HOST'].'/offers_detail.php?offdder_id='.$offer_id);
        }
        include dirname(__FILE__) . "./db.php"; //Used to get global pdo
        $stm = $pdo->prepare('INSERT INTO wish VALUES (?,?)'); //prepared statement to verify email and password
        $stm->bindParam(1, $id_offer);
        $stm->bindParam(2, $id_user);
        $stm->execute();
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $id_offer);
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function removeFromWishlist($id_user, $id_offer)
{
    try {
        if (!offerExists($id_offer)) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $id_offer);
        } else {
            //header("Location: http://".$_SERVER['HTTP_HOST'].'/offers_detail.php?offdder_id='.$offer_id);
        }
        include dirname(__FILE__) . "./db.php"; //Used to get global pdo
        $stm = $pdo->prepare('DELETE FROM wish  WHERE id_offer=? AND id_user=?'); //prepared statement to verify email and password
        $stm->bindParam(1, $id_offer);
        $stm->bindParam(2, $id_user);
        $stm->execute();
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $id_offer);
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}
if (isset($_GET["add"])) {
}

function offerExists($id_offer)
{
    try {
        include dirname(__FILE__) . "./db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT id_offer FROM offers WHERE id_offer=?');
        $stm->bindParam(1, $id_offer);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


if (isset($_GET["add"])) {
    session_start();
    addInWishlist($_SESSION["id_user"], $_GET["add"]);
} else if (isset($_GET["remove"])) {
    session_start();
    removeFromWishlist($_SESSION["id_user"], $_GET["remove"]);
}
