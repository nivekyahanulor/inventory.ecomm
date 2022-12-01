<?php
//$strVal = getInput("Please input a phone number : ");
$strVal =$_GET["number"];
if (isset($strVal)) {
    $l = strlen($strVal);
    $strPhone = substr($strVal, $l, ($l - 4)) . "****";
    $NumberPrefix = substr($strVal, 0, ($l - 5));
    echo "Masked Number is : " . $NumberPrefix.$strPhone;
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple PHP Form Demo</title>
</head>
<body>
 
  <form id="number" method="get" action=".">
   <p><label>number: <br />
    <input type="text" name="number" class="textfield" value=" <?php echo htmlentities($NumberPrefix ); ?>" />
    </label></p>
 
    <p><input type="submit" name="submit" class="button" value="Submit" /></p>
  </form>
 
</body>
</html>