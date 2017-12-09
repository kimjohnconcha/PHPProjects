<?php

$rand = 0; //rand(1,100);
$numguess = 0;
$message = "";

if (isset($_GET["numtobeguessed"])) {
  $numguess = $_GET["numtobeguessed"];
  if($numguess == 0)
    $numguess = rand(1,100);
    //$rand = rand(1,100);
}

$count = isset($_GET['count']) ? $_GET['count'] : 0;

if (isset($_GET["number_entered"])) {

  $number= $_GET['number_entered'];

  if($number > $numguess)
    $message = "Your guess is higher, make it lower!";
  else if ($number < $numguess) {
    $message = "Your guess is lower, make it higher!";
  }
  else if(!is_numeric($number)){
    $message = "Input is not a number";
  }
  else
    $message = "Congrats!! Your guess is right!! Number to be guess is {$numguess}";

  if ($number > 100 || $number < 0) {
    $message = "Please guess a number between 1 and 100";
  }
  
  

  $count++;

  if($count == 10)
  {
    $message = "Sorry the number to be guessed is {$numguess}. Please try again";
    $numguess = 0;
    $count = 0;
    $number = 0;
  }

}
else
  $message = "Please input a value!";


?>



<form action="" method="GET">

  Guess a Number Between 1 and 100:

  <input type="text" name="number_entered" value=''/>

  <input type="submit" name="submit" value="Guess"/><br><br>

  <input type="hidden" name="count" value="<?php echo $count; ?>" >

  <input type="hidden" name="numtobeguessed" value="<?php echo $numguess ?>" >

  <?php

  if (isset($_GET["number_entered"])) {

    //$number= $_POST['number_entered'];

    echo "You entered: {$number} ";
    echo "<br><br>";
    echo "You tried: {$count} out of 10 ";
    echo "<br><br>";
    echo $message;
  }

  ?>
  
</form>















