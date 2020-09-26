<?php 
echo "<html><body><center>";
echo "<form action='3.php' method='POST'>
        <input type='text' name='input' placeholder='Masukkan jumlah bintang'>
        <input type='submit' name='submit' value='Buat Pola'>
</form>";
if(isset($_POST['submit'])){
    $input = $_POST['input']; // Definisi Jumlah BintangNya
    //9 = 5
    echo "Jumlah Bintang : $input";
    echo "<hr/>";
    $x = $input / 2;
    //6 = 
    for ($i=0; $i <= $x; $i++)
    {
    $y = $i;
    for ($j=0; $j < $y; $j++)
    {
        if(($j > 0) && ($j < ($y - 1))){
            echo "&nbsp;&nbsp;&nbsp;";
        } else {
            echo "&nbsp;*&nbsp;";
        } 
        }
    echo "<br/>";
    }

    for ($a = $x; $a >= 0; $a--)
    {
    $y = $a;
    for ($b = 0; $b < $y; $b++)
    {
        if(($b > 0) && ($b < ($y - 1))){
            echo "&nbsp;&nbsp;&nbsp;";
        } else {
            echo "&nbsp;*&nbsp;";
        } 
    }
    echo "<br/>";
    }
}
echo "</center><body></html>";


?>