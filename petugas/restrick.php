<?php
session_start();

if ($_SESSION['status'] != "login") {
  header("location:index.php?pesan=belumlogin");
}
