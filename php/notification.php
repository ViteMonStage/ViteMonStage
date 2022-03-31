<?php
function displayNotification($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT * FROM notification 
        INNER JOIN notification_type on notification.id_notification_type = notification_type.id_notification_type
        WHERE id_user=? AND beenread=0');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
?><div class="modal-body" id="notif-modal-body">
                <?php foreach ($row as $value) : ?>
                    <div class="toast full show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto"><?php echo $value[8]." ".$value[1] ?></strong>
                            <small><?php echo $value[3] ?></small>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" href="notification.php?markasread=<?php //echo $value[0] ?>"></button>-->
                            <button class="markasread" data-bs-dismiss="toast" aria-label="Close" id="btnmarkasread_<?php echo $value[0]?>"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="toast-body"><?php echo $value[2] ?></div>
                    </div>
                <?php endforeach;
                ?>
            </div><?php
                } else { ?>
            <div class="modal-body" id="notif-modal-body">
                <p class="small">No new notification</p>
            </div>
<?php }
            } catch (\PDOException $e) {
                echo $e->getMessage();
                echo "   ";
                echo (int)$e->getCode();
            }
        }

        function getNumberNotification($id_user)
        {
            try {
                include dirname(__FILE__) . "/db.php"; //Used to get global pdo
                $stm = $pdo->prepare('SELECT * FROM notification WHERE id_user=? AND beenread=0');
                $stm->bindParam(1, $id_user);
                $stm->execute();
                $row = $stm->fetchAll();
                return sizeof($row);
            } catch (\PDOException $e) {
                echo $e->getMessage();
                echo "   ";
                echo (int)$e->getCode();
            }
        }

        function markAsRead($id_notification)
        {
            try {
                include dirname(__FILE__) . "/db.php"; //Used to get global pdo
                $stm = $pdo->prepare('UPDATE notification SET beenread = 1 WHERE id_notification=?');
                $stm->bindParam(1, $id_notification);
                $stm->execute();
            } catch (\PDOException $e) {
                echo $e->getMessage();
                echo "   ";
                echo (int)$e->getCode();
            }
        }

        function markAllAsRead($id_user)
        {
            try {
                include dirname(__FILE__) . "/db.php"; //Used to get global pdo
                $stm = $pdo->prepare('UPDATE notification SET beenread = 1 WHERE id_user=?');
                $stm->bindParam(1, $id_user);
                $stm->execute();
            } catch (\PDOException $e) {
                echo $e->getMessage();
                echo "   ";
                echo (int)$e->getCode();
            }
        }

        function addNotification($id_user, $id_notification_type, $title, $description){
            try {
                include dirname(__FILE__) . "/db.php"; //Used to get global pdo
                $stm = $pdo->prepare('INSERT INTO notification (title, description, date, beenread, id_notification_type, id_user) VALUES (?,?,?,?,?,?)');
                $stm->bindParam(1, $title);
                $stm->bindParam(2, $description);
                $time = date('Y-m-d', time());
                $stm->bindParam(3, $time);
                $val4 = 0;
                $stm->bindParam(4, $val4);
                $stm->bindParam(5, $id_notification_type);
                $stm->bindParam(6, $id_user);
                $stm->execute();
            } catch (\PDOException $e) {
                echo $e->getMessage();
                echo "   ";
                echo (int)$e->getCode();
            }
        }

if(isset($_GET["markasread"])){
    markAsRead($_GET["markasread"]);
}
if(isset($_GET["markallasread"])){
    session_start();
    markAllAsRead($_SESSION["id_user"]);
}