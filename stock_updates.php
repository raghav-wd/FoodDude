<?php

    include "includes/config.php";
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');


    //Fetching the net stock of items
    $sql = "SELECT * FROM site_status WHERE id = '1'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $maggi_stk = $row['maggi_stock'];
    $oreo_stk = $row['oreo_stock'];
    $kurkure_stk = $row['kurkure_stock'];
    $lays_stk = $row['lays_stock'];
    $site_status = $row['site_status'];

    //Fetching total sale of items from DB
    $sql =  "SELECT SUM(maggi) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $maggi_sum = $row['SUM(maggi)'];

    $sql =  "SELECT SUM(oreo) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $oreo_sum = $row['SUM(oreo)'];

    $sql =  "SELECT SUM(kurkure) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $kurkure_sum = $row['SUM(kurkure)'];

    $sql =  "SELECT SUM(lays) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $lays_sum = $row['SUM(lays)'];

    //Calculation In Stocks of each items
    $maggi_instk_upd = $maggi_stk - $maggi_sum;
    $oreo_instk_upd = $oreo_stk - $oreo_sum;
    $kurkure_instk_upd = $kurkure_stk - $kurkure_sum;
    $lays_instk_upd = $lays_stk - $lays_sum;

    echo "data:";
    echo '{"name":"Maggi","instock":"'.$maggi_instk_upd.'"}>>';
    echo '{"name":"Oreo","instock":"'.$oreo_instk_upd.'"}>>';
    echo '{"name":"Kurkure","instock":"'.$kurkure_instk_upd.'"}>>';
    echo '{"name":"Lays","instock":"'.$lays_instk_upd.'"}>>';
    echo '{"sitestatus":"'.$site_status.'"}';
    echo "\n\n";
    ob_end_flush();
    flush();
    sleep(6);
?>