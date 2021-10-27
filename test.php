<?php
$zip = new ZipArchive;
$res = $zip->open('./vendor/webmozart.zip');
if ($res === TRUE) {
  $zip->extractTo('./vendor/');
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}
?>