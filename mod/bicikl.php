<?php
class bicikl{
	var $_template="";
	function __construct(){}
	function add(){}
	function edit(){}
	function start(){
		$this->_template="view_bicikl.php";
		$v=array("a"=>"TREK","b"=>"NAKAMURA","c"=>"GIANT","d"=>"FUJI");
		return $v;
	}
}
?>