<?php
if (isset($_POST['download'])) {
  $file = ".{$_POST['path']}/{$_POST['file']}";
  $fileToDownloadEscaped = str_replace("&nbsp;", " ", htmlentities($file, null, 'utf-8'));

  ob_clean();
  ob_start();
  header('Content-Description: File Transfer');
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename=' . basename($fileToDownloadEscaped));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Pragma: public');
  header('Content-Length: ' . filesize($fileToDownloadEscaped)); // kiek baitų browseriui laukti, jei 0 - failas neveiks nors bus sukurtas
  ob_end_flush();

  readfile($fileToDownloadEscaped);
  exit;
}
