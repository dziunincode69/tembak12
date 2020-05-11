<?php
//Watch
require 'class-tembak.php';
error_reporting(0);
$o =0;
echo "? File token list ";
$file = trim(fgets(STDIN));
$list = file_get_contents($file);
$pemisah = explode("\n", $list);
$jumlah = count($pemisah);
for ($i=0; $i < $jumlah; $i++) 
{
$token = $pemisah[$o];
$poin_awal = cek_Poin($token);
echo "\n $token \n"; echo "[+]Poin awal : $poin_awal \n Process.. \n";
$isi_Quiz = isi_Quiz($token);
echo "[+]Poin Akhir : ".cek_Poin($token)." \n";
$o++;
}
