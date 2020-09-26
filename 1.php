<?php 
function strigToBinary($string)
{
    $characters = str_split($string);
 
    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }
 
    return implode(' ', $binary);    
}
 
function binaryToString($binary)
{
    $binaries = explode(' ', $binary);
 
    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }
 
    return $string;    
}
echo "<html><body><center>";
echo "<form action='1.php' method='POST'>
        <input type='text' name='input' placeholder='Masukkan String'>
        <input type='submit' name='submit' value='POST'>
</form>";

if(isset($_POST['submit']))
{
    $string = $_POST['input'];
    echo 'STRING: '.$string.PHP_EOL;
    echo '<br>BINARY: '.$binary = strigToBinary($string).PHP_EOL;
    echo '<br>STRING: '.binaryToString($binary).PHP_EOL;
}
?>
