<?php
include_once("Controller/cChap.php");
$p =  new cChap();
if (isset($_REQUEST["Com"])) {
    $com = $_REQUEST["Com"];
    $tbl = $p->getByCom($com);
} elseif (isset($_REQUEST["btnSubmit"])) {
    $search = $_REQUEST["search"];
    $tbl = $p->getSearch($search);
} elseif (isset($_REQUEST["btnPrice"])) {
    $max = $_REQUEST["pricefiler"];
    $tbl = $p->getPrice($max);
} else {
    $tbl = $p->getAllChap();
}
if ($tbl) {
    if (mysql_num_rows($tbl) > 0) {
        $dem = 0;
        echo "<table style='width:100%'>";
        while ($row = mysql_fetch_assoc($tbl)) {
            if ($dem == 0) {
                echo "<tr>";
            }
            $row['ChapPrice'] = number_format($row['ChapPrice'], 0, ",", ".");
            echo "<td class='tdsanpham' style='width:25%; height:150px'>";
            echo "<img width:100px; height=100px src='image/" . $row['ChapImage'] . "'/>";
            echo "<br>" . $row['ChapName'] . "<br><span style='color:red; font-size:18px;'>" . $row['ChapPrice'] . " VND" . "</span><br>" . "<input type='submit' value='Mua' name='muahang'>";
            echo "</td>";
            $dem++;
            if ($dem % 4 == 0) {
                echo "</tr>";
                $dem = 0;
            }
        }
        echo "</table>";
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Error";
}
