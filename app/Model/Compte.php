<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Compte extends AppModel {
    
    public function beforeSave($options = array()) {
    	if (isset($this->data[$this->alias]['password'])) {
        	$passwordHasher = new SimplePasswordHasher();
        	$this->data[$this->alias]['password'] = $passwordHasher->hash(
            	$this->data[$this->alias]['password']
            );
        }
        return true;
    }
    
    public function beforeFind($query) {
    	if (isset($query['conditions']['Compte.password'])) {
    	    $password = $query['conditions']['Compte.password'];
        	$passwordHasher = new SimplePasswordHasher();
        	$query['conditions']['Compte.password'] = $passwordHasher->hash(
            	$password
            );
        }
        return $query;
    }
    
}

?>