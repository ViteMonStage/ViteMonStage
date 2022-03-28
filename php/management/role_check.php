<?php
if(session_id() == '') {
    session_start();
}
print_r($_SESSION['email']);
print_r($_SESSION['role']);

if(($_SESSION['role'])==1 || ($_SESSION['role']==5))
{
    header('HTTP/1.0 403 Forbidden');
}
