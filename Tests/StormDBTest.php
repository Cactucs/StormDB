<h1>StormDB Testing</h1>
<?php

require 'localSetup.php';

require __DIR__.'/../StormDB/StormLoader.php';


$db = new StormDB('google', './../Databases/', 'r+', true);
//$db->add(mt_rand());

$collName = 'Users';
if(isset($db->$collName)) {
	echo "Collection '".$collName."' allready exists.";
} else {
	echo "Collection '".$collName."' isn't set. I'm adding it";
	$db->add($collName);
}
$coll = $db->collection($collName);
Debugger::dump(array('Collection '.$collName => $coll));

Debugger::dump(array('Results from coll' => $coll->find()));
/*
$data = array(
		'name' => 'Vojta',
		'mail' => 'blb@blc.cz',
		'pass' => 'Strong pass'
	);

$id[] = $db->collection('collection')->insert($data);

$otherData = array(
		'surname' => 'Novák',
		'telephone' => '908 093 038',
		'address' => 'Street 18, London'
	);
$id[] = $db->collection('collection')->insert($otherData);

$result = $db->collection('collection')->find();

/*
$result = array(
		12345 => array(
			'name' => 'Vojta',
			'mail' => 'blb@blc.cz',
			'pass' => 'Strong pass'
		),
		56789 => array(
			'surname' => 'Novák',
			'telephone' => '908 093 038',
			'address' => 'Street 18, London'
		),
	);

$id = array(
		0 => 12345,  
		1 => 56789
	);


$secondResult = $db->collection('collection')->where(array('id' => $id[1], 'telephone' => '908 093 038'))->find(array('id', 'name', 'address'));
// $secondResult = NULL*/