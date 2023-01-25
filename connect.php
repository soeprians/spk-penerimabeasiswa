<?php
$konek=new mysqli('localhost','root','','spkbeasiswa');
if ($konek->connect_errno){
    "Database Error".$konek->connect_error;
}
?>