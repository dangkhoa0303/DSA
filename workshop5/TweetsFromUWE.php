<!DOCTYPE>
<html>
<head>
<title>Tweets</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Scope+One" rel="stylesheet">  
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/main.css" rel="stylesheet">
</head>

<body>
 <div class="container">

 <header>
    <div class="row">
        <div class="col-md-12">
            <h1 class='text-center'>Tweets from UWE</h1>
        </div>
    </div>
 </header>

        <?php
        //Based on code by James Mallison, see https://github.com/J7mbo/twitter-api-php
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        
        header('Content-Type: text/html; charset="UTF-8"');
        
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "789437912895090688-SJdQkq9OL4XrM4ilVELR24uI5PigIkc",
            'oauth_access_token_secret' => "4CdLE3xN8mjvzNWXEsqUIgle66BuJ9bggor78hZCPEObx",
            'consumer_key' => "nmKMsMFJPdlMeLHl5ihWxKeBf",
            'consumer_secret' => "tHrdDHMKd0j33YcbgeofwKwu1Yhn7pfCiu9L1kNYvr9LLZUtwW"
        );
        
        /** Perform a GET request and echo the response **/
        /** Note: Set the GET field BEFORE calling buildOauth(); **/
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=&geocode=10.8231,106.6297,2km';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $data=$twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        
        //Use this to look at the raw JSON
        //echo($data);
        
        // Read the JSON into a PHP object
        $phpdata = json_decode($data, true);
        
        // Debug - check the PHP object
        //var_dump($phpdata)
        
        //Loop through the status updates and print out the text of each
        foreach ($phpdata["statuses"] as $status){
            $find = array("fuck", "damn", "shit");
            $text = $status["text"];
            $text = str_replace($find, "****", $text);
            
            $created_at =  $status["created_at"];
            $user = $status["user"];
            $name = $user["name"];
            $profile_img = $user["profile_background_image_url"];

            echo ("<article>");
            echo ("<div class='row line'>");

            echo ("<div class='col-md-3 profile-img'>");
            echo ("<img class='img-responsive img' src=' ");
            echo ($profile_img . "'" . ">");
            echo ("</div>");

            echo ("<div class='col-md-9'>");
            echo ("<p class='name'>");
            echo ($name . "</p>");

            echo ("<p class='time_created'>");
            echo ($created_at . "</p>");

            echo ("<p>");
            echo ($text . "</p>");
            echo ("</div>");

            echo ("</div>");

            echo ("<div class='row'>");
            echo ("<div class='col-md-12'>");
            echo ("<hr>");
            echo ("</div>");
            echo ("</div>");
            echo ("</article>");
        }
        ?>
 </div>
</body>
</html