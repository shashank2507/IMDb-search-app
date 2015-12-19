<?php
include 'header.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Movie Time</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
</head>
<body>

    <div id="layout">

        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>

        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <!-- <a class="pure-menu-heading" href="#">Company</a> -->

                <ul>
                    <li  class="menu-item-divided pure-menu-selected"><a href="#">Home</a></li>
                    <li><a href="./displayMovies.php">Movies</a></li>
                 
                    <li><a href="./logout.php">Logout</a></li>
                   
                    
                    </ul>
                </div>
            </div>

            <div id="main">
                <div class="header">
                    <h1>Movie Time</h1>
                    <h2>Online IMDb search App</h2>
                </div>

                <div class="content">
				<h2>Enter only genuine names for proper results: <h2>
				<form class="pure-form" method="post" action="scraping_process.php">
				<input placeholder="Actor/Actress name" name="id" type="text" />
				<input name="login" type="submit" class="pure-button pure-button-primary" value="Submit" />
				
			</form>
					<h4>Processing time is set to 15secs due to slow internet.<h4>
                    <h2 class="content-subhead">About:</h2>
                    <p>
                        1:)		I created a webapp in which a user types the name of an actor/actress in a search box and the application performs a search on IMDb.<br><br>
						2:)		Then this app fetch top 3 movies of the actor/actress, each with the top 3 user reviews (most helpful) of the movie.<br><br>
							3:)	Also, Clicking on a movie name will open that movie's IMDb page in a new browser tab.
 <br/>
                        <br/>
                        PS: To use this, Login to system is necessary.
                    </p>
                </div>
            </div>
        </div>
        <script src="js/ui.js"></script>
    </body>
    </html>
