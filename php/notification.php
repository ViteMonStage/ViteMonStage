<?php
function displayNotification($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT * FROM notification WHERE id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
        ?><div class="modal-body">
                <?php foreach ($row as $value) : ?>
                    <div class="toast full show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto"><span class="badge bg-primary"><i class="fa-solid fa-circle-info"></i> Information</span> <?php echo $value[1] ?></strong>
                            <small><?php echo $value[3] ?></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body"><?php echo $value[2] ?></div>
                    </div>
                <?php endforeach;
                ?></div><?php
                    } else { ?>
            <div class="modal-body">
                <p class="small">No new notification</p>
            </div>
        <?php }
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                    echo "   ";
                    echo (int)$e->getCode();
                }
            }
function getNumberNotification($id_user){
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $stm = $pdo->prepare('SELECT * FROM notification WHERE id_user=?');
    $stm->bindParam(1, $id_user);
    $stm->execute();
    $row = $stm->fetchAll();
    return sizeof($row);
}