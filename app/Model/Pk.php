<?php

class Pk extends AppModel{
	
	public $validate = array(
		'prix' => array(
			'rule' => array('comparison', '>=', 0),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Pour rappel, le prix est un nombre supérieur ou égale à 0.'
		),
		'nom' => array(
			'rule' => 'alphaNumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Un nom alphanumérique doit être entré.'
		)
	);
	
}
?>