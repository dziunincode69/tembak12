<?php
//Watch
require 'class-tembak.php';
error_reporting(0);
system('ls token');
$o =0;
echo "? File ";
$file = trim(fgets(STDIN));
$list = file_get_contents($file);
$pemisah = explode("\n", $list);
$jumlah = count($pemisah);
for ($i=0; $i < $jumlah; $i++) 
{
$mailpass = explode("|", $pemisah[$o]);
$email = $mailpass[0]; $password = $mailpass[1]; $token = $mailpass[2];
$poin_awal = cek_Poin($token);
echo "\n $email | $token \n"; echo "[+]Poin awal : $poin_awal \n";
$isi_Quiz = isi_Quiz($token);
echo "[+]Poin Akhir : ".cek_Poin($token)." \n";
$o++;
}
