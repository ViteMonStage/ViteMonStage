$(document).ready(function () {
    $('.markasread').click(function () {
        let id_notification  = this.id.split("_")[1];
        $.ajax({
            type: "POST",
            url: "/php/notification.php?markasread="+id_notification,
        });
        document.getElementById('notifAmount').innerHTML=parseInt(document.getElementById('notifAmount').innerHTML)-1;
        if(parseInt(document.getElementById('notifAmount').innerHTML)==0){
            document.getElementById('notif-modal-body').innerHTML = '<p class="small">No new notification</p>'
        }
    });
    $('.markallasread').click(function () {
        $.ajax({
            type: "POST",
            url: "/php/notification.php?markallasread=1",
        });
        document.getElementById('notifAmount').innerHTML=0;
        if(parseInt(document.getElementById('notifAmount').innerHTML)==0){
            document.getElementById('notif-modal-body').innerHTML = '<p class="small">No new notification</p>'
        }
    });
});