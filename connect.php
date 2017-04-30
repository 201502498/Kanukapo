<?

$errors = '';
$myemail = 'kcc@gmail.com';.
if(empty($_POST&#91;'name'&#93;)  || 
empty($_POST&#91;'email'&#93;) || 
empty($_POST&#91;'message'&#93;))
{
$errors .= "\n Error: all fields are required";
}
$name = $_POST&#91;'name'&#93;; 
$email_address = $_POST&#91;'email'&#93;; 
$message = $_POST&#91;'message'&#93;; 
if (!preg_match(
"/^&#91;_a-z0-9-&#93;+(\.&#91;_a-z0-9-&#93;+)*@&#91;a-z0-9-&#93;+(\.&#91;a-z0-9-&#93;+)*(\.&#91;a-z&#93;{2,3})$/i", 
$email_address))
{
$errors .= "\n Error: Invalid email address";
}
&#91;/php&#93;
if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: index.html');
}
?>