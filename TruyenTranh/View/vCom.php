<?php
include_once("Controller/cCom.php");
$p = new cCom();
$tbl = $p->getCom();
if ($tbl) {
    if (mysql_num_rows($tbl) > 0) {
        $stt = 1;
        while ($row = mysql_fetch_assoc($tbl)) {
            echo "<a href='index.php?Com=" . $row["ComID"] . "'>" . $row["ComID"] . "." . $row["ComName"] . "</a><br>";
        }
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Error";
}
