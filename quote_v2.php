<!DOCTYPE html> 
<html lang="en"> 
<head>
    <title>Quote of the day : Version 2</title> 
</head> 

<style>
/* get this box style from https://css-tricks.com/snippets/css/simple-and-nice-blockquote-styling */
blockquote {
  background: #f9f9f9;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
  font-size: 18px;
  max-width: 600px;}
blockquote:before {
  color: #ccc;
  content: open-quote;
  font-size: 4em; /*size of the big quote*/
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}

p {
    margin-left: 300px;
}

h4 {
    font-size: 20px;
    margin: 1.0em 10px;
}

</style>

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
// $content[$line] is a string split by "|".
// explode function will split that string into substring separated by "|" and store in $data.
    
// associative array
$data = array(
    "quote"=>explode("|", $content[$line])[0],
    "author"=>explode("|", $content[$line])[1],
    "year"=>explode("|", $content[$line])[2],
    "link"=>explode("|", $content[$line])[3]) ;
         
$link = $data['link'];
$author = $data['author'];
$year = $data['year'];

// print out the quote 
echo "<blockquote p>"; 
echo htmlentities($data['quote']) 
        . "<br>" . "<br>" 
        . "<p><a href=\"$link\">$author</a> ($year)</p>"; 
echo "</blockquote p>"; 
?> 
</body> 
</html> 