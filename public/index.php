<?php


echo "<h1>CSV TO TABLE CONVERTER</h1>";
echo "<hr>";
echo"<p> Converting CSV file into table</p>";

main::start("example.csv");

class main
{

    static public function start($filename)
    {
        $records = csv::getRecords($filename);


    }
}

class csv {

    public static function getRecords($filename){

        $file = fopen($filename, "r");

        while(! feof($file)){

            $record = fgetcsv($file);
            $records[] = recordFactory::create($record);
        }

        fclose($file);
        return $records;
    }
}

class record{

    public function __construct($record =null)
    {
        print_r($record);
        $this->createProperty();

    }


    public function createProperty($name = "FirstName", $value = "Surabhi"){

        $this->{$name} = $value;
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

