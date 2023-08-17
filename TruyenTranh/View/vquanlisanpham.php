<?php
include_once("Controller/cChap.php");
$p = new cChap();
$tbl = $p->getAllChap();
if ($tbl) {
    if (mysql_num_rows($tbl) > 0) {
        echo "<table style='width:100%; background-color:lightyellow;'>";
        echo "<tr style='width:100%'>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th style='width:20%'>Mô Tả</th>
                    <th>Giá</th>
                    <th>Action</th>
                </tr>";
        while ($row = mysql_fetch_assoc($tbl)) {
            echo "<tr>";
            $row['ChapPrice'] = number_format($row['ChapPrice'], 0, ",", ".");
            echo "<td>" . $row["ChapID"] . "</td>";
            echo "<td>" . "<img style='width: 100px;height:100px;' src='image/" . $row['ChapImage'] . "'/>" . "</td>";
            echo "<td>" . $row['ChapName'] . "</td>";
            echo "<td>" . $row['ChapDescription'] . "</td>";
            echo "<td>" . $row['ChapPrice'] . "</td>";
            $id = $row['Chap'];
            echo "<td> <a href='admin.php?xoa&id=" . $row['ChapID'] . "' onclick='return confirm(\"" . "Bạn có chắc xóa!" . "\")'>Xóa</a> | <a href='admin.php?sua&idsp=$id'>Sửa</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có giá trị";
    }
} else {
    echo "Error";
}
