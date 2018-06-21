<?php

Class CSV {
	protected $file;
	protected $processed;

	public function __construct($file){
		if (!$file) {
		    throw new Exception('File not found: ' . $file);
		}
		$this->file = $file;
	}

	public function read()
	{
		foreach(file($this->file) as $key => $line) 
        {
        	$row = str_getcsv($line);
        	if($key == 0){
        		$this->processed[] = $row;
        		continue;
        	}

        	if(!isset($this->processed[$row[0]][0])){
        		$this->processed[$row[0]][0] = $row[0];
        	}

        	if(!isset($this->processed[$row[0]][1])){
        		$this->processed[$row[0]][1] = $row[1];
        	} else {
        		$this->processed[$row[0]][1] += $row[1]; 
        	}
        }
	}

	public function display()
	{
		foreach ($this->processed as $key => $value) {
			echo join($value, ',');
			echo '<br>';
		}
	}
}

$csv = new CSV('3.csv');
$csv->read();
$csv->display();