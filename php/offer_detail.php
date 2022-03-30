<?php
include_once "wishlist.php";
if (!isset($_GET["id_offer"]) || !offerExists($_GET["id_offer"])) {
    header('HTTP/1.0 404 Not Found');
    $contents = file_get_contents('./error/404.php', TRUE);
    exit($contents);
}

function displayOfferdetail()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT offer_name,company.company_name,cityname,zipcode,offer_date,number_interns, 
        intership_start,intership_end,offers.description,offers.skills,promotion_type from offers
        INNER JOIN company on offers.id_company = company.id_company
        INNER JOIN address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN concern on concern.id_offer = offers.id_offer
        LEFT JOIN promotion_type on promotion_type.id_promotion_type = concern.id_promotion_type
        WHERE offers.id_offer = ?');
        $sql->bindParam(1, $_GET['id_offer']); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            foreach ($row as $value) : ?> <!-- go through the tab and assign a value to each row -->
                <div class="off_desc">
                    <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    <div class="off_desc_txt">
                        <h2 class="big"> <?php echo $value[0] ?></h2> <!-- replace the html with the value 0 (first column) of the first row the table   -->
                        <h4 class="small">Name of the company : <?php echo $value[1] ?></h4>
                        <h4 class="small">City : <?php echo  $value[2]?> (<?php echo $value[3] ?>)</h4>
                        <h4 class="small">Promotion type : <?php echo $value[10] ?></h4>
                        <h4 class="small"> Skills requiered : <?php echo $value[9] ?></h4>
                        <h4 class="small">Offer date  :<?php echo $value[4]  ?></h4>
                        <h4 class="small"> Number of interns : <?php echo  $value[5]  ?></h4>
                        <h4 class="small">Starting date : <?php echo  $value[6]  ?> - End date : <?php echo  $value[7]  ?></h4>
                    </div>
                    <?php if (!isInWishlist($_SESSION["id_user"], $_GET["id_offer"])) : ?>
                        <div class="wish">
                            <a class="addlink" href="/php/wishlist.php?add=<?php echo $_GET["id_offer"]?>">
                                <div class="wish_d1">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="wish_d2">
                                    <h5 class="mini"> Add to wishlist</h5>
                                </div>
                            </a>
                        </div>
                </div>
            <?php else : ?>
                <div class="wish">
                    <a class="removelink" href="/php/wishlist.php?remove=<?php echo $_GET["id_offer"] ?> ">
                        <div class="wish_d1">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="wish_d2">
                            <h5 class="mini"> Remove from wishlist</h5>
                        </div>
                    </a>
                </div>
                </div>
            <?php endif;?>       
                <div class="off_det">
                    <h3 class="medium"> Offer description </h3>
                    <p class="mini"> <?php echo $value[8]  ?> </p>
                </div>
<?php endforeach;
            }
        } catch (\PDOException $e) { // displays an error if the try fails
            echo $e->getMessage();
            echo "   ";
            echo (int)$e->getCode();
        }
    }
