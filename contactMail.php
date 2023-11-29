<?php
$errors = '';
$myemail = 'mayurpasare@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['comment'])||
   empty($_POST['mobileNo']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$contact = $_POST['mobileNo'];
$email_address = $_POST['email'];
$comment = $_POST['comment'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}



if( empty($errors))
{

		
		$to = $myemail;
		$email_subject = "Enquiry from Make New Life Website";
		$email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
		table td {
			font-size: 14px;
			font-family: Verdana, Geneva, sans-serif;
			line-height: 22px;
			color: #683613;
			background-color: #f2f2f2;
		}
		</style>
		</head>
		<body style="padding: 0px; margin: 0px;">
			<div style="width: 830px; margin: auto;">
				<div
					style="width: 100%; font-size: 14px; font-family: Verdana, Geneva, sans-serif; line-height: 22px; color: #683613;">
					<div
						style="color: #333; font-size: 18px; font-weight: bold; margin-bottom: 5px; height: 12px; text-align: center; margin-top: 5px;">
						<h2>MAKE NEW LIFE</h2>
					</div>
					<p>
						<h2 align="center">Enquiry Details</h2>
					</p></br>
					<p style="margin-left: 150px">
						Dear Admin,<br /> New Enquiry has been received from website, below
						are the lead details: <br />
						
						<br />Name: CustomerName
					    <br />Contact No: CustomerContact
					    <br />Email ID: CustomerEmail_address
					    <br />Message: CustomerComment
					    <br />
					</p>
					</p>
					<p style="margin-left: 150px">
						With Best Regards,<br /> 
						<span style="">Make New Life</span>
					</p>
					<p>
						<br />
					</p>
				</div>
			</div>
		</body>
		</html>';
		
		$email_body = str_replace("CustomerName",$name, $email_body);
		$email_body = str_replace("CustomerComment",$comment, $email_body);
		$email_body = str_replace("CustomerEmail_address",$email_address, $email_body);
		$email_body = str_replace("CustomerContact",$contact, $email_body);

		
		// To send HTML mail, the Content-type header must be set
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		$headers[] = 'Cc: shriganeshv@gmail.com, sagar@angularminds.com';
		$headers[] = "From: $myemail";
		$headers[] = "Reply-To: $email_address";
		mail($to,$email_subject,$email_body, implode("\r\n", $headers));
		//redirect to the 'thank you' page
		header('Location: thankyou.html');	
}
?>