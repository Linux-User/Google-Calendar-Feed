<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Listing calendar contents</title>
        <style>
            body {
                font-family:Verdana,Geneva, sans-serif;
            }
            li {
                border-bottom: solid black 1px;
                margin: 5px;
                font-size:10px;
                padding: 0.5px;

                padding-bottom: 5px;
            }
            h2 {
                color: #000066;
                text-decoration: none;
            }
            span.attr {
                font-weight: bolder;
            }
            h1 {
                font: bold 150%/100% "Verdana";

                position: relative;
                color: #FFCC00;

            }
            h1 span {
                background: url() repeat-x;
                font:Verdana,Geneva,sans-serif;
                position: left;
                display: block;

                height: 10px;
            }
            .address-item {
                float: left;
            }
            div { border: 1px solid red;}

            h4 {
                font: bold 100%/100% "Verdana";

                position: relative;
                color: #FFCC00;

            }

        </style>
    </head>
    <body>
        <?php
        $magicCookie4 = 'cookie';
        $magicCookie = date("Y-m-d");
        $starttime = ("T00:00:00");
        $endtime = ("T23:59:59");
        //we need this for the date
        // build feed URL
        //Google Feed
        $feedURL = " ";
       
        $feedURL2 = " ";
        //if you wish for it to only show one day put this after the full start-min=$magicCookie$starttime&start-max=$magicCookie$endtime
        $feedURL3 = " ";

        // read feed into SimpleXML object
        $sxml = simplexml_load_file($feedURL);
        $sxml2 = simplexml_load_file($feedURL2);
        $sxml3 = simplexml_load_file($feedURL3);
        ?>
        <div style="background-color:#000066;border:1px solid black; ">
            <h1><?php
                echo $sxml->title;
                echo "&nbsp;";
                echo date('D, d-M-Y');
                ?></h1>
        </div>
        <p/>
        <?php
        // iterate over entries in category
        // print each entry's details
        foreach ($sxml->entry as $entry) {
            // echo '<div class="address-item">';
            $title = stripslashes($entry->title);
            $content = stripslashes($entry->content);
            $summary = stripslashes($entry->gcalevent);
            $array = array($content);


            echo "<li>\n";
            echo "<h2>$title</h2>";
            echo "<h3>$content</h3>\n";
            echo "<h3>$summary</h3>\n";
            echo "</li>\n";
        }
        ?>


        <div style="background-color:#000066;border:0px;">
            <h1>Feed </h1>
        </div>
        <?php
        // iterate over entries in category
        // print each entry's details
        foreach ($sxml2->entry as $entry2) {
            $title2 = stripslashes($entry2->title);
            $content2 = stripslashes($entry2->content);
            $summary2 = stripslashes($entry2->gcalevent);

            echo "<li>\n";
            echo "<h2>$title2</h2>";
            echo "<h3>$content2</h3>\n";

            echo "</li>\n";
        }
        ?>

        <div style="background-color:#000066;border:0px;">
            <h1>Feed </h1>
        </div>
        <?php
        // iterate over entries in category
        // print each entry's details

        foreach ($sxml3->entry as $entry3) {
            $startTime = $entry3->children('http://schemas.google.com/g/2005')->when->attributes()->startTime;
            $startTime = new DateTime($startTime);
            $today = new DateTime();
            if ($startTime->format('Y-m-d') != $today->format('Y-m-d')) {
                continue;
            }
            $title3 = stripslashes($entry3->title);
            $content3 = stripslashes($entry3->content);
            $content33 = stripslashes($entry3->isAllDay);
            $summary3 = stripslashes($entry3->gcalevent);
            //$array = array($content);
            echo "<li>\n";
            echo "<h2>$title3</h2>\n";
            echo "<h3>$content3</h3>\n";
            echo "<h3>$content33</h3>\n";
            echo "</li>\n";
        }
        ?>
        </ol>
    </body>
</html>
