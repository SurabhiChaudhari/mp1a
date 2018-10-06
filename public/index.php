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
        $table = html_table::open_htmlTable($records);
        //$table = html::generateTable($records);
    }
}

// create html body
class html_body{
    public static function open_HtmlBody(){
        return '<body>';
    }
    public static function close_HtmlBody(){
        return '</body>';
    }
}

// Create HTML TABLE
class html_table{
    public static function open_htmlTable(){
        return '<table class="table table-bordered">';
    }
    public static function close_htmlTable(){
        return '</table>';


    }
}
// create table headings
class html_tableHead{
    public static function open_TableHead(){
        return '<thead class="table-active">';
    }
    public static function close_TableHead(){
        return '</thead >';
    }
}

// create table header
class create_table_Header{
    public static function createHeader ($value){
        return '<th>'. $value . '</th>';
    }
}

// create table rows
class create_table_Rows{
    public static function open_tableRow(){
        return '<tr>';
    }
    public static function close_tableRow(){
        return '</tr>';
    }
}

// get table data
class tableData{
    public static function printTabledata ($value){
        return '<td>'. $value . '</td>';
    }
}

// get html header
class html_header{
    public static function getHtmlHeader(){
        $html_header = '<head>';
        $html_header .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        $html_header .= '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>';
        $html_header .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>';
        $html_header .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
        $html_header .= '</head>';
        return $html_header;
    }
}

class csv {

    public static function getRecords($filename){

        $file = fopen($filename,"r");
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

class record
{
    public function __construct(Array $fieldNames = null, Array $values = null)
    {
        //print_r($record);

        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
        print_r($this);
    }

    public function returnArray(){
        $array = (array) $this;
        return $array;
    }


    public function createProperty($name = "FirstName", $value = "Surabhi")
    {

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



