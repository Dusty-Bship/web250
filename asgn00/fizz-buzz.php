<?php
$i = 1;

while ($i <= 100) {
  if ($i % 15 == 0) {
    print 'FizzBuzz';
  }
  elseif ($i % 5 == 0) {
    print 'Buzz';
  }
  else if ($i % 3 == 0) {
    print 'Fizz';
  }
  else {
    print $i;
  }
  $i++;
  print '<br>';
}
?>