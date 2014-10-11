<?php
class Operation extends AppModel{
	
	public function beforeSave($options = array()) {
	// Mettre la date dans les opérations
		date_default_timezone_set('Europe/Paris');
		$this->data[$this->alias]['date'] = date('Y-m-d h:i:s');
	}
	
	public $validate = array(

	);
	
}