<?php
  class ParseCSV {
    public $fileName;
    private $header;
    private $data = [];
    private $rowCount = 0;

    //It is used to select the delimiter to parse out the used_bicycles.csv file
    public static $delimiter = ',';

    public function __construct($fileName = '') {
      if($fileName != '')
        $this->file($fileName);
    }

    //This file function checks if a given $fileName exists and is readable. If not, it outputs an appropriate error message. If valid, it sets the instance's fileName property and returns true.
    public function file($fileName) {
      if(!file_exists($fileName)) {
        echo 'File does not exist.';
        return false;
      }
      elseif(!is_readable($fileName)) {
        echo 'File is not readable.';
        return false;
      }
      else {
        $this->fileName = $fileName;
        return true;
      }
    }

    //The parse function processes a CSV file specified by fileName. If the file isn't set, it outputs an error message. If the file is set, the function reads its contents, treating the first row as headers and subsequent rows as data. It combines each row's data with the headers to form associative arrays and stores them in the data property. The function also maintains a count of rows parsed. After processing, it returns the parsed data.
    public function parse() {
      if(!isset($this->fileName)) {
        echo 'File is not set.';
        return false;
      }

      $this->reset();

      $file = fopen($this->fileName, 'r');
      while(!feof($file)) {
        $row = fgetcsv($file, 0, self::$delimiter);
        if($row == [NULL] || $row === FALSE) { continue; }
        if(!$this->header)
          $this->header = $row;
        else
          $this->data[] = array_combine($this->header, $row);
          $this->rowCount++;
      }
      fclose($file);
      return $this->data;
    }

    //The last_results function returns the parsed data stored in the data property of the instance.
    public function last_results() {
      return $this->data;
    }

    //The row_count function returns the number of rows parsed from the CSV file, stored in the rowCount property of the instance.
    public function row_count() {
      return $this->rowCount;
    }

    //The reset function initializes or resets the header, data, and rowCount properties of the instance to their default values, preparing the instance for a new parsing operation.
    private function reset() {
      $this->header = NULL;
      $this->data = [];
      $this->rowCount = 0;
    }
  }
?>