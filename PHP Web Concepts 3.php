<?php
   if( $_POST["name"] || $_POST["age"] ) {
      if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
         die ("invalid name and name should be alpha");
      }
      
      echo "Welcome ". $_POST['name']. "<br />";
      echo "You are ". $_POST['age']. " years old.";
      
      exit();
   }
?>
<html>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>
      
   </body>
</html>
private function numbers_only($value, $custom)
{
    return preg_match('/^(['.$custom.'0-9_]*)$/i', $value);
}
private function alphanumeric($value, $custom)
{
    return preg_match('/^(['.$custom.'a-z0-9_]*)$/i', $value);
}
private function numbers_only($value)
{
    return preg_match('/^([0-9]*)$/', $value);
}

===============================================================================
With DateTime you can make the shortest date&time validator for all formats.

<?php

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

var_dump(validateDate('2012-02-28 12:12:12')); # true
var_dump(validateDate('2012-02-30 12:12:12')); # false
var_dump(validateDate('2012-02-28', 'Y-m-d')); # true
var_dump(validateDate('28/02/2012', 'd/m/Y')); # true
var_dump(validateDate('30/02/2012', 'd/m/Y')); # false
var_dump(validateDate('14:50', 'H:i')); # true
var_dump(validateDate('14:77', 'H:i')); # false
var_dump(validateDate(14, 'H')); # true
var_dump(validateDate('14', 'H')); # true

var_dump(validateDate('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP')); # true
# or
var_dump(validateDate('2012-02-28T12:12:12+02:00', DateTime::ATOM)); # true

var_dump(validateDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O')); # true
# or
var_dump(validateDate('Tue, 28 Feb 2012 12:12:12 +0200', DateTime::RSS)); # true
var_dump(validateDate('Tue, 27 Feb 2012 12:12:12 +0200', DateTime::RSS)); # false
# ...

=======================================================================
checkdate ( int $month , int $day , int $year ) : bool
