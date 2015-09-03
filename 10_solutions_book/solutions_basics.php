<!doctype html>

<html>
    <head>
        <title>Solutions Basics</title>
    </head>

    <body>

        <?php
        $timeNow = new DateTime();
        $westCoastZone = new DateTimeZone("America/Los_Angeles");

        echo $timeNow->getTimestamp() . "<br />";
        echo $timeNow->format("Y-m-d g:i:s") . "<br />";
        $timeNow->setTimezone($westCoastZone);
        echo $timeNow->format("Y-m-d G:i:s") . "<br />";
        ?>

    </body>
</html>
