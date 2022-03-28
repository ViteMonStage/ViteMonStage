<?php
if(isset ($_SESSION['email']))
{
    echo 'prout';
}
echo $_SESSION['role'];
if(($_SESSION['role'])==1 || ($_SESSION['role']==5))
{
    header('HTTP/1.0 403 Forbidden');
}
