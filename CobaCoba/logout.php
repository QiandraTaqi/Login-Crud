<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect pengguna ke halaman login atau halaman lain yang sesuai
header("location: login.php"); // Ubah ini sesuai dengan halaman login Anda
exit();
?>
