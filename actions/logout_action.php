<?php 
  declare(strict_types = 1);

  session_start(['cookies_samesite' => 'Lax']);
  session_destroy();

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>