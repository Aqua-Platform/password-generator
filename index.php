<?php
 
require_once("class.password_generator.php");
 
/*
|-----------------
| Class Instance
|------------------
*/
 
$args = array(
    'length'                =>   24,
    'alpha_upper_include'   =>   TRUE,
    'alpha_lower_include'   =>   TRUE,
    'number_include'        =>   TRUE,
    'symbol_include'        =>   FALSE,
    );
$object = new password_generator( $args );
 
/*
|-----------------
| Generate Password
|------------------
*/
 
$password = $object->get_password();
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1250">
<title>Random Secure Password</title>
<script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>
</head>
<body style="font-family: Estrangelo Edessa, Trebuchet MS, Arial">

<h1>Random Secure Password</h1>
<p>Here is a randomly generated secure password:</p> 

<textarea cols="20" rows="1" readonly id="password" onClick="SelectAll('password');">
<?php
echo $password;
?>
</textarea>

<p>Click the text above and press Ctrl-C on the keyboard to copy it to the clipboard.</p>

<p>You don't like this password? No problem! <a href=".">Generate a new password</a></p>

<p>You still don't like this password? <a href="advanced.php">Advanced Password generator</a></p>

<p>There is also a <a href="https://github.com/PlatformIQ/password-generator" target="_blank">Github page for this password generator</a></p>

</body>
</html>
