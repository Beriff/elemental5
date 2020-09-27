<?php
    session_start();

    if(!isset($_COOKIE["user"])) {
        echo "<script type='text/javascript'>location.href = 'login/';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: "Open Sans", sans-serif;
        }

        html {
            height: 100%;
        }

        #wrapper {
            display: flex;
            height: 100vh;
        }

        #elems {
            width: 75%;
            height: 100vh;
            background-color: #525252;
            padding: 2em;

        }
        #new {
            width: 25%;
            height: 100vh;
            background-color: #808080;
            flex-grow: 1;
            padding: 1em;
        }
        .element {
            background-color: #272727;
            border: 2px solid black;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            color: white;
            padding: 1em;
            margin: 0.3em;
            display: block;
            transition: .2s;
            width: 10%;
        }

        .element:hover {
            transition: .2s;
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
            margin-left: 0.6em;
        }
        .color {
            border: 2px solid black;
            padding: 0.3em;
            margin: 0.3em;
            border-radius: 40px;
            margin-left: 0px;
        }

    </style>
    <script src="script.js"></script>
    <body>
        <div style="width: 100%; height:100%;">
            <div id="wrapper">
                <div id="elems">
                    <div class="element">
                        <span class="color" style="background-color:brown;">
                                
                        </span>
                        Earth
                    </div>
                    <div class="element">
                        <span class="color" style="background-color:cyan;">
                                
                        </span>
                        Air
                    </div>

                    <div class="element">
                        <span class="color" style="background-color:blue;">
                                
                        </span>
                        Water
                    </div>
                    <div class="element">
                        <span class="color" style="background-color:red;">
                                
                        </span>
                        Fire
                    </div>
                </div>
                <div id="new">
                    yes
                </div>
            </div>
        </div>
    </body>
</html>
