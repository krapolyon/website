<?php 
/* SVN FILE: $Id$ */
/* ContratsController Test cases generated on: 2008-10-28 22:10:02 : 1225228862*/
App::import('Controller', 'Contrats');

class TestContrats extends ContratsController {
	var $autoRender = false;
}

class ContratsControllerTest extends CakeTestCase {
	var $Contrats = null;

	function setUp() {
		$this->Contrats = new TestContrats();
		$this->Contrats->constructClasses();
	}

	function testContratsControllerInstance() {
		$this->assertTrue(is_a($this->Contrats, 'ContratsController'));
	}

	function tearDown() {
		unset($this->Contrats);
	}
}
?>