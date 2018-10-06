<?php
echo "<h1>CSV TO TABLE CONVERTER</h1>";
echo "<hr>";
echo"<p> Converting CSV file into table</p>";
main::start("example.csv");
class main {
public static function start($filename)
{
    $records=csv::getRecords($filename);
    //$record = recordFactory::create();
   // print_r($records);
}
}

class csv{
static public function getRecords($filename)    {
//reading the csv file and putting it in an array
    $file = fopen($filename, "r");

    while (!feof($file)) {
        $record[]=fgetcsv($file);
        $records[]= recordFactory::create($record);
    }

    fclose($file);
    return $records;


}

}

class record{
//creation of constructor
public function __construct(Array $record=null){
   //print_r($record);
    $this->createProperty();
    print_r($this);
}

public function createProperty($name='first',$value='Keith'){
    $this->{$name}=$value;
}
}

class recordFactory
{
    public static function create(Array $array = null)
    {
        $record = new record($array);
        return $record;
        }
}