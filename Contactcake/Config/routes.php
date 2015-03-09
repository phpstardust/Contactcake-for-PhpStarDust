<?php

Router::connect('/send', array(
	'plugin'=>'contactcake', 
	'controller' => 'contactcakes', 
	'action' => 'send'
));

?>