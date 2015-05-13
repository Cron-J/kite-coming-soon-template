<?php
	function spamcheck($field){ //filter_var() sanitizes the e-mail
	  //address using FILTER_SANITIZE_EMAIL
	  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
	  //filter_var() validates the e-mail
	  //address using FILTER_VALIDATE_EMAIL
	  if(filter_var($field, FILTER_VALIDATE_EMAIL)) return TRUE;
	  else return FALSE;
	}
	
	if (isset($_REQUEST['email'])){//if "email" is filled out, proceed
	  //check if the email address is invalid
		$mailcheck = spamcheck($_REQUEST['email']);
		if ($mailcheck==FALSE){
			echo "Invalid input";
		}
		else{//send email
			$email = $_REQUEST['email'] ;
			$subject = $_REQUEST['subject'] ;
			$message = "<br/>\n\r Name: " . $_REQUEST['name'] ;
			$message .= "<br/>\n\r Email: " . $_REQUEST['email'];
			$message .="<br/>\n\r Message: ".$_REQUEST['message'] ;
			mail("contac@cronj.com", "Subject: $subject",	$message, "From: $email" );
			echo "success";
			//echo "Thank you for using our mail form";
		}
	}
?>
