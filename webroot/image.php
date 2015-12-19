<?php

if(isset($_GET['id'])):
    $conn = mysql_connect("localhost", "root", "") or die("can't connect database");
    mysql_select_db("sharehyip",$conn);
    $sql = "select * from listings where id=$_GET[id]";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) == 0):
        $img = imagecreatefromgif(__DIR__.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'logo-125.png');

        header('Content-Type: image/png');
        imagegif($img);
        imagedestroy($img);
    else:
        while($row = mysql_fetch_array($query)):

            $sql2 = "select created from statistics where listing_id={$row['id']} and type=2 order by created desc limit 1";
            $query2 = mysql_query($sql2);
            if(mysql_num_rows($query2)):
                while($row2 = mysql_fetch_array($query2)):
                    $last_payment = date('M d, Y', strtotime($row2['created']));
                endwhile;
            else:                
                $last_payment = 'N/A';
            endif;

            $img = imagecreatefrompng(__DIR__.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'buttonmonitor.png');

            // Create some colors
            $white  = imagecolorallocate($img, 255, 255, 255);
            $black  = imagecolorallocate($img, 0, 0, 0);

            $font = __DIR__.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'Raleway-Bold.ttf';
            $fontbold = __DIR__.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'Anton.ttf';

            // Get data to display
            switch ($row['status']) {
                case '1':
                    $status = 'PAYING';
                    $colors = imagecolorallocate($img, 0, 153, 0);
                    break;
                case '2':
                    $status = 'WAITING';
                    $colors = imagecolorallocate($img, 85, 85, 85);
                    break;
                case '3':
                    $status = 'PROBLEM';
                    $colors = imagecolorallocate($img, 255, 102, 0);
                    break;
                case '4':
                    $status = 'SCAM';
                    $colors = imagecolorallocate($img, 255, 0, 0);
                    break;
            }
            $name = (strlen($row['title'])>16) ? substr($row['title'], 0,16).'...' : $row['title'] ;
            $date_started       = new DateTime($row['date_started']);
            $date_added         = new DateTime($row['date_added']);
            $date_closed        = new DateTime($row['date_closed']);
            $today              = new DateTime();
            $lifetime           = ($row['date_closed']) ? $date_started->diff($date_closed) : $date_started->diff($today);
            $monitored          = ($row['date_closed']) ? $date_added->diff($date_closed) : $date_added->diff($today);

            // Get image Width
            $image_width = imagesx($img);

            // Get Bounding Box Size
            $text_box_name = imagettfbbox(18, 42, $font, $name);
            $text_box_status = imagettfbbox(18, 0, $fontbold, $status);

            // Get your Text Width
            $text_width_name = $text_box_name[2] - $text_box_name[0];
            $text_width_status = $text_box_status[2] - $text_box_status[0];

            // Add the text
            imagettftext($img, 14, 0, ($image_width/2) - ($text_width_name/2), 68, $black, $font, $name);
            imagettftext($img, 20, 0, ($image_width/2) - ($text_width_status/2), 132, $colors, $fontbold, $status);
            imagettftext($img, 8, 0, 87, 166, $white, $font, date('M d, Y',strtotime($row['date_added'])));
            imagettftext($img, 8, 0, 87, 184, $white, $font, $lifetime->format('%a DAYS'));
            imagettftext($img, 8, 0, 87, 202, $white, $font, $monitored->format('%a DAYS'));
            imagettftext($img, 8, 0, 87, 220, $white, $font, $row['rating'].'/5');
            imagettftext($img, 8, 0, 87, 238, $white, $font, $last_payment );

            header('Content-Type: image/png');
            imagepng($img);
            imagedestroy($img);
        endwhile;
    endif;
else:
    header("Location: http://sharehyip.com/");
    die();
endif;