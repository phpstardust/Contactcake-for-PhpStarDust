<?php

App::uses('AppHelper', 'View/Helper');

class ContactcakeHelper extends AppHelper {
	
	public $components = array('Session','Cookie','RequestHandler');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	
	
	
	public function renderform() {
		
		$url = Configure::read('Psd.url') .'/send';
		
		if (Configure::read('Contactcake.includeJquery')) 
		echo $this->Html->script('/contactcake/js/jquery.js') ."\r\n";
		
		?>
        <script type="text/javascript">
		
		function isValidEmail(email) {
		if (email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) != -1)
		return true;
		else
		return false;
		}

		function sendContactForm() {
			
			$('#emailHelp').hide();
			$('#fieldsHelp').hide();
			$('#contactSuccess').hide();
			
			var goSubmit = true;
			var name = $('#name').val();
			var email = $('#email').val();
			var subject = $('#subject').val();
			var message = $('#message').val();
			
			if (name=="" || email=="" || subject=="" || message=="") {
				goSubmit = false;
				$('#fieldsHelp').fadeIn(400);
			}
			
			if (!isValidEmail(email)) {
				goSubmit = false;
				$('#emailHelp').fadeIn(400);
			}
			
			if (goSubmit) {
				
				$('#name').attr('disabled', 'disabled');
				$('#email').attr('disabled', 'disabled');
				$('#subject').attr('disabled', 'disabled');
				$('#message').attr('disabled', 'disabled');
				
				$.ajax({
				type: "POST",
				url: "<?php echo $url; ?>",
				data: { name: name, email: email, subject: subject, message: message }
				})
				.done(function( response ) {
					if (response=="ok") {
						$('#name').attr('disabled', false);
						$('#name').val('');
						$('#email').attr('disabled', false);
						$('#email').val('');
						$('#subject').attr('disabled', false);
						$('#subject').val('');
						$('#message').attr('disabled', false);
						$('#message').val('');
						$('#contactSuccess').fadeIn(400);	
					}
				});
				
			}
			
		}
		
		</script>
        <?php
		
		echo '<div class="row">';
		echo '<div class="col-lg-12">';
		echo '<div class="form-group">';
		echo $this->Form->input('name',array(
			'autofocus'=>'autofocus',
			'id'=>'name',
			'placeholder' => 'Enter name',
			'class' => 'form-control'
		));
		echo '</div>';
		echo '<div class="form-group">';
		echo $this->Form->input('email',array(
			'id'=>'email',
			'placeholder' => 'Enter email',
			'class' => 'form-control'
		));
		echo '</div>';
		echo '<div class="form-group">';
		echo $this->Form->input('subject',array(
			'id'=>'subject',
			'placeholder' => 'Enter subject',
			'class' => 'form-control'
		));
		echo '</div>';
		echo '<div class="form-group">';
		echo $this->Form->input('message',array(
			'type' => 'textarea',
			'id'=>'message',
			'placeholder' => 'Enter message',
			'class' => 'form-control'
		));
		echo '</div>';
		echo '<div class="form-group">';
		echo '<div id="fieldsHelp" class="alert alert-warning" style="display:none">All fields required.</div>';
		echo '<div id="emailHelp" class="alert alert-warning" style="display:none">Insert a valid email.</div>';
		echo '<div id="contactSuccess" class="alert alert-success" style="display:none">Email sent.</div>';
		echo $this->Form->button('Send',array(
			'type'=>'button',
			'onclick'=>'javascript:sendContactForm();',
			'class'=>'btn btn-default'
		));
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}
	
	
	
	
}

?>