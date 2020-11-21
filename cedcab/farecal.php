<?php
$distance = array(
    "charbagh" => "0",
    "indiranagar" => "10",
    "BBD" => "30",
    "barabanki" => "60",
    "faizabad" => "100",
    "basti" => "150",
    "gorakhpur" => "210"
);
if (isset($_POST))
{
    $pickup = isset($_POST['pick']) ? $_POST['pick'] : '';
    $drop = isset($_POST['drop']) ? $_POST['drop'] : '';
    $cabtype = isset($_POST['car']) ? $_POST['car'] : '';
    $luggage = isset($_POST['luggage']) ? $_POST['luggage'] : '';
    foreach ($distance as $loc => $dis)
    {
        if ($loc == $pickup)
        {
            $p = $dis;
        }
        if ($loc == $drop)
        {
            $d = $dis;
        }
    }
    $measure = abs($d - $p);
    if ($measure != 0)
    {
        echo ("<strong>Travel " . $measure . " km in just: Rs ");
        if ($cabtype == "CedMicro")
        {
            $amount = 0;
            $amount = $amount + 50;
            if ($measure <= 10)
            {
                $amount = $amount + ($measure * 13.5);
            }
            if ($measure > 10 && $measure <= 60)
            {
                $amount = $amount + (10 * 13.5);
                $measure = $measure - 10;
                $amount = $amount + ($measure * 12);
            }
            if ($measure > 60 && $measure <= 160)
            {
                $amount = $amount + (10 * 13.5);
                $amount = $amount + (50 * 12);
                $measure = $measure - 60;
                $amount = $amount + ($measure * 10.20);
            }
            if ($measure > 160)
            {
                $amount = $amount + (10 * 13.5);
                $amount = $amount + (50 * 12);
                $amount = $amount + (100 * 10.20);
                $measure = $measure - 160;
                $amount = $amount + ($measure * 8.5);

            }
            echo ($amount . "</strong>");
        }
        else if ($cabtype == "CedMini")
        {
            $amount = 0;
            $amount = $amount + 150;
            if ($measure <= 10)
            {
                $amount = $amount + ($measure * 14.50);
            }
            if ($measure > 10 && $measure <= 60)
            {
                $amount = $amount + (10 * 14.5);
                $measure = $measure - 10;
                $amount = $amount + ($measure * 13);
            }
            if ($measure > 60 && $measure <= 160)
            {
                $amount = $amount + (10 * 14.5);
                $amount = $amount + (50 * 13);
                $measure = $measure - 60;
                $amount = $amount + ($measure * 11.20);
            }
            if ($measure > 160)
            {
                $amount = $amount + (10 * 14.5);
                $amount = $amount + (50 * 13);
                $amount = $amount + (100 * 11.20);
                $measure = $measure - 160;
                $amount = $amount + ($measure * 9.5);
            }
            if ($luggage > 0 && $luggage <= 10)
            {
                $amount = $amount + 50;
            }
            if ($luggage > 10 && $luggage <= 20)
            {
                $amount = $amount + 100;
            }
            if ($luggage > 20)
            {
                $amount = $amount + 200;
            }
            echo ($amount . "</strong>");
        }
        else if ($cabtype == "CedRoyal")
        {
            $amount = 0;
            $amount = $amount + 200;
            if ($measure <= 10)
            {
                $amount = $amount + ($measure * 15.5);
            }
            if ($measure > 10 && $measure <= 60)
            {
                $amount = $amount + (10 * 15.5);
                $measure = $measure - 10;
                $amount = $amount + ($measure * 14);
            }
            if ($measure > 60 && $measure <= 160)
            {
                $amount = $amount + (10 * 15.5);
                $amount = $amount + (50 * 14);
                $measure = $measure - 60;
                $amount = $amount + ($measure * 12.20);
            }
            if ($measure > 160)
            {
                $amount = $amount + (10 * 15.5);
                $amount = $amount + (50 * 14);
                $amount = $amount + (100 * 12.20);
                $measure = $measure - 160;
                $amount = $amount + ($measure * 10.5);

            }
            if ($luggage > 0 && $luggage <= 10)
            {
                $amount = $amount + 50;
            }
            if ($luggage > 10 && $luggage <= 20)
            {
                $amount = $amount + 100;
            }
            if ($luggage > 20)
            {
                $amount = $amount + 200;
            }
            echo ($amount . "</strong>");
        }
        else if ($cabtype == "CedSUV")
        {
            $amount = 0;
            $amount = $amount + 250;
            if ($measure <= 10)
            {
                $amount = $amount + ($measure * 16.5);
            }
            if ($measure > 10 && $measure <= 60)
            {
                $amount = $amount + (10 * 16.5);
                $measure = $measure - 10;
                $amount = $amount + ($measure * 15);
            }
            if ($measure > 60 && $measure <= 160)
            {
                $amount = $amount + (10 * 16.5);
                $amount = $amount + (50 * 15);
                $measure = $measure - 60;
                $amount = $amount + ($measure * 13.20);
            }
            if ($measure > 160)
            {
                $amount = $amount + (10 * 16.5);

                $amount = $amount + (50 * 15);

                $amount = $amount + (100 * 13.20);
                $measure = $measure - 160;
                $amount = $amount + ($measure * 11.5);
            }
            if ($luggage > 0 && $luggage <= 10)
            {
                $amount = $amount + (50 * 2);
            }
            if ($luggage > 10 && $luggage <= 20)
            {
                $amount = $amount + (100 * 2);
            }
            if ($luggage > 20)
            {
                $amount = $amount + (200 * 2);
            }
            echo ($amount . "</strong>");
        }
    }
}
?>
