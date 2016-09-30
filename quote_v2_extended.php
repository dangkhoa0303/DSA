<!DOCTYPE html> 
<html lang="en"> 
<head>
    <title>Quote of the day : Version 2</title> 
</head> 
<body> 
<h4>Quote of the day ... [version 2]</h4> 

<?php 
echo "<h4>".date("D M d Y")."</h4>"; 

$content = file('quotes.dat'); 

// count how many lines in the file  
$numLines = count($content); 

// generate a random number between 1 and $numLines 
$line = rand(0, ($numLines-1)); 

// get the data into an array 
//$data = explode("|", $content[$line]); 
// $content[i] is a string split by "|". explode function will split that string into substring separated by "|" and store in $data.
    
// associative array
$data = array(
    "quote"=>explode("|", $content[$line])[0],
    "author"=>explode("|", $content[$line])[1],
    "year"=>explode("|", $content[$line])[2],
    "link"=>explode("|", $content[$line])[3]) ;
         
// print out the quote 
echo "<p>"; 
echo htmlentities($data['quote']); 
echo "</p>"; 

$link = $data['link'];
$author = $data['author'];
$year = $data['year'];
    
echo "<p style=\"text-align:right\"><a href=\"$link\">$author</a> ($year)</p>"; 
?> 
</body> 
</html> 
