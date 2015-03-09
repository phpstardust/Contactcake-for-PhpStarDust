<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactcakesController extends AppController {
	
	public $uses = array();
	
	public $components = array('Session','Cookie','RequestHandler');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	
	
	
	public function send() {
		
		$this->autoRender = false;
		
        if ($this->request->is('post') && $this->request->is('ajax')) {
			
			$name = $this->request->data["name"];
			$email = $this->request->data["email"];
			$subject = $this->request->data["subject"];
			$message = $this->request->data["message"];
			
			$name = $this->cleanVars($name);
			$email = $this->cleanVars($email);
			$subject = $this->cleanVars($subject);
			$message = $this->cleanVars($message);
			
			$Email = new CakeEmail();
			$Email->config('default');
			$Email->emailFormat('html');
			$Email->from(array($email => $name));
			$Email->to(Configure::read('Contactcake.to'));
			$Email->subject($subject);
			$Email->send($message);
			
			echo "ok";
			
        }
		
    }
	
	
	
	
	public function cleanVars($data) {
		
		if (is_array($data)) {
			
		foreach ($data as $key => $var) {
			$data[$key] = $this->cleanVars($var);
		}
		} else {
			$data = strip_tags($data);
		}
		
		return $data;
	
	}
	
	
	
	
}

?>