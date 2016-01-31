$errors = '';
// $myemail = 'manikhandhan@rmgmachines.com';
$myemail = 'brlalithkumar@gmail.com';

if(empty($_POST['name'])  ||
   empty($_POST['phonenumber']) ||
   empty($_POST['companyname']) ||
   empty($_POST['adress']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$phonenumber = $_POST['$phonenumber'];
$companyname = $_POST['$companyname'];
$address = $_POST['address'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Enquiry for RMG Machines from $name";
$email_body = "You have received a new message.".
" Here are the details:\n Name: $name \n ".
"Phone Number: $phonenumber\n".
"Company Name: $companyname\n".
"Address: $address\n".
"Message: $message\n";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: contact-form-thank-you.html');
}
