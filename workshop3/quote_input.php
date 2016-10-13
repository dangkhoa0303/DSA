<?php 

include 'quote_input.html';

if (isset($_POST['submit'])) {

    $quote = $_POST['quote'];
    $source = $_POST['source'];
    $dobdod = $_POST['dob-dod'];
    $wplink = $_POST['wplink'];
    $wpimage = $_POST['wpimage'];
    
    switch($_POST['quoteType']) {
        case "Romantic":
            $category="Romantic";
            break;
        case "Educational":
            $category="Educational";
            break;
        default:
            $category="Romantic";
            break;
    }        

    // use 'a' instead of 'w' to append text to file, otherwise, it will erase the previous content to add the new one
    $file = fopen("quotes.dat", 'a') or die("Error");
    $data = $quote .  "|" .
            $source . "|" .
            $dobdod . "|" .
            $wplink . "|" .
            $wpimage . "|" .
            $category . "\n";
    fwrite($file, $data);
    fclose($file);
}



?>