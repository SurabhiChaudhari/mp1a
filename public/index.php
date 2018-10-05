<?php
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