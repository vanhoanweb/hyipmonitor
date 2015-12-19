<?php

    /*if ($_POST['key']!='5eed0128a54112ab1fc6506fb52d9bca' && $_GET['key']!='5eed0128a54112ab1fc6506fb52d9bca') {
        echo "Wrong ID"; 
        exit;
    }*/
    $key = isset($_GET['key']) ? $_GET['key'] : null;
    if ($key!='5eed0128a54112ab1fc6506fb52d9bca') {
        echo "Wrong ID";
        exit;
    }

    $conn = mysql_connect("localhost", "hteamers_hoan", "hoan123$%") or die("can't connect database");
    mysql_select_db("hteamers_h_sharehyip",$conn);
    $sql = "select id,title,url,status,plan,date_added from listings";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)):
        while($row = mysql_fetch_array($query)):
            $domain = str_ireplace('www.', '', parse_url($row['url'], PHP_URL_HOST));
            $status = 5-$row['status'];
            $last_payment = '';
            //Last payment
            $sql2 = "select created from statistics where listing_id={$row['id']} and type=2 order by created desc limit 1";
            $query2 = mysql_query($sql2);
            if(mysql_num_rows($query2)):
                while($row2 = mysql_fetch_array($query2)):
                    $last_payment = $row2['created'];
                endwhile;
            endif;
            $last_payment = ($last_payment) ? $last_payment : '';
            echo "{$row['id']}|$domain|{$row['title']}|$status|{$row['date_added']}|$last_payment|{$row['plan']}\n";
        endwhile;
    endif;
