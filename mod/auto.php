<?php
class auto{
	var $_template="";
	function __construct(){}
	function add(){}
	function edit(){}
	function start(){
		$this->_template="view.php";
		$v=array("1"=>"Ivan","2"=>"Ante","3"=>"Ema");
		return $v;
	}
}
?>