<?php 

/* ====================================================== 
   PHP Calculator example using "sticky" form (Version 1) 
   ====================================================== 

   Author : P Chatterjee (adopted from an original example written by C J Wallace)

   Purpose : To multiply 2 numbers passed from a HTML form and display the result.

   input: 
      x, y : numbers 
      calc : Calculate button pressed 


   Date: 15 Oct 2007 

*/ 

// grab the form values from $_HTTP_POST_VARS hash 
extract($_GET); 
$prod = 0;

// first compute the output, but only if data has been input 
   if(isset($calc)) { // $calc exists as a variable 
      calculate($x, $y, $op, $prod);
   } 
   else { // set defaults 
      $x=0; 
      $y=0; 
       $op = "";
      $prod=0;
   }

function calculate($x, $y, $op, &$prod) {
    switch($op) {
        case '+':
            $prod = $x + $y;
            break;
        case '-':
            $prod = $x - $y; 
            break;
        case '*':
            $prod = $x * $y; 
            break;
        case '/':
            if ($y==0) {
                $prod = "INF";
            } else {
                $prod = $x / $y; 
            }
            break;
        default:
            $prod = 0;
            break;
    }
}
?> 

<html> 
   <head> 
      <title>PHP Calculator Example</title> 
   </head> 

   <body> 

      <h3>PHP Calculator (Version 1)</h3>  

      <form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>"> 

         x = <input type="text" name="x" size="5" value="<?php print $x; ?>"/> 
         
          op =
        <select name="op" value="<?php print $op; ?>">
            <option value=""></option>
             <option value="+">+</option>
             <option value="-">-</option>
             <option value="*">*</option>
             <option value="/">/</option>
         </select>
         
         y =  <input type="text" name="y" size="5" value="<?php  print $y; ?>"/> 


         <input type="submit" name="calc" value="Calculate"/> 
         <input type="reset" name="clear" value="Clear"/> 
      </form> 

      <!-- print the result --> 
      <?php if(isset($calc)) { 
         if ($op != "") {
             print "<p>x $op y = $prod</p>";
         } else {
             print "Operator not chosen";
         }

      } ?> 

   </body> 
</html> 