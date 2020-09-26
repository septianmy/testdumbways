<?php
$awal  = new DateTime('10:25:21');
$akhir = new DateTime('12:00:00'); // Waktu sekarang
$diff  = $awal->diff($akhir);

echo 'Selisih waktu: ';
echo $diff->h . ' jam, ';
echo $diff->i . ' menit, ';
echo $diff->s . ' detik, ';


$jam = $diff->h;
$menit = $diff->i;
$detik = $diff->s;

$totaldetik = ($jam*60*60) + ($menit*60) + $detik;
echo "<br>Jumlah Detik : $totaldetik detik";

$total10menit = $totaldetik / 600;
$sisabagidetik = $totaldetik % 600;

//total detik : 5679
$kecepatan = 6; //kecepatan awal
$jaraktempuh = 0;
$detiktempuh = 0;
for($i=1;$i<=round($total10menit);$i++){
   
    $jarak = $kecepatan * 600;
    $jaraktempuh = $jaraktempuh + $jarak;
    $detiktempuh = $detiktempuh + 600;
    $kecepatan = $kecepatan + 1;
}

$sisajarak = $sisabagidetik * $kecepatan ;
$jaraktotal = $jaraktempuh + $sisajarak;
$jarakkm = $jaraktotal/1000;

echo "<br>Total Jarak Tempuh : $jaraktotal meter atau ".$jarakkm." Km";
?>