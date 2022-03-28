<?php
function displayNotification(){
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT * FROM notification WHERE id_user=?');
        $stm->bindParam(1, $_SESSION['id_user']);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            echo '<div class="modal-body">';
            foreach ($row as $value) {
                echo '<div class="toast full show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"><span class="badge bg-primary"><i class="fa-solid fa-circle-info"></i> Information</span> ' . $value[1] . '</strong>
                <small>' . $value[3] . '</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">' . $value[2] . '</div>
        </div>';
            }

            echo '</div>';
        } else {
            echo '<div class="modal-body">
        <p class="small">No new notification</p>
    </div>';
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}