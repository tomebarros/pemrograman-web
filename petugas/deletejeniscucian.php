<?php
include "restrick.php";
include "../koneksi.php";

include '../cekinput.php';


$idjeniscucian = input($_GET['idjeniscucian']);

mysqli_query($koneksi, "DELETE FROM jeniscucian WHERE idjeniscucian = '$idjeniscucian'");

header("location:jeniscucian.php");
