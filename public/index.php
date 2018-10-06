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

        $fieldNames = array();
        $count = 0;

        while(! feof($file)){

            $record = fgetcsv($file);

            if($count==0){

                $fieldNames = $record;
            }

            else{

                $records[] = recordFactory::create($fieldNames,$record);
            }
            $count++;
        }

        fclose($file);
        return $records;
    }
}

class record{
    public function __construct(Array $fieldNames =null, Array $values = null)
    {
        $record = array_combine($fieldNames,$values);
        foreach ($record as $property => $value){
            $this->createProperty($property,$value);
        }
        print_r($this);
    }




    public function createProperty($name = "FirstName", $value = "Surabhi"){

        $this->{$name} = $value;
    }
}



class recordFactory
{

    public static function create(Array $fieldNames = null, Array $values = null)
    {

        //print_r($fieldNames);
       // print_r($record);
        $record = new record($fieldNames,$values);

        return $record;

    }
}



