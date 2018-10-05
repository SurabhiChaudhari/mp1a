<?php
echo "<h1>CSV TO TABLE CONVERTER</h1>";
echo "<hr>";
echo"<p> Converting CSV file into table</p>";
main::start("example.csv");
class main {
public static function start($filename)
{
    $records=csv::getRecords($filename);
    $record = recordFactory::create();
    print_r($record);
}
}

class csv{
static public function getRecords($filename)    {
//reading the csv file and putting it in an array
    $file = fopen($filename, "r");

    while (!feof($file)) {
        $record[]=fgetcsv($file);
        $records[]= $record;
    }

    fclose($file);
    return $records;


}

}

class record{

}

class recordFactory
{
    public static function create(Array $array = null)
    {
        $record = new record();
        return $record;
        }
}