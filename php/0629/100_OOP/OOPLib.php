<?php
class media {
	private  $name;
	protected  $size;
	public $desc;

	function __construct($fname){
		$this->name = $fname;
		//echo '<h2>new image constrct<br>';
	}

	function echoDesc(){
		echo "<h1>$this->name description: $this->desc<br>";
	}

	function __destruct(){
		echo "<h2>this image($this->name) has been desctrct";
	}
}

class image extends media {
	function __construct($fname){
		parent::__construct($fname . "(image)");
	}
}