<?php
if(isset($_POST['submit']))
{
    include_once '../onek.php';

    $update = "UPDATE alternatif SET nama='$_POST[nama]', kelamin='$_POST[kelamin]', ttl='$_POST[ttl]' ";

    if (mysqli_query($dbcon, $update))
    {
        header("Location: ../alternatif.php");
        exit();
    }
    else
    {
        header("Location: ./order_detail.php?update=failed");
        exit();
    }
}

