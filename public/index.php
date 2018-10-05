<?php
echo "<h1>CSV TO TABLE CONVERTER</h1>";
echo "<hr>";
echo"<p> Converting CSV file into table</p>";
main::start();
class main {
public static function start()
{
    //reading the csv file and putting it in an array
    $file = fopen("example.csv", "r");

    while (!feof($file)) {
        print_r(fgetcsv($file));
    }

    fclose($file);
}
}