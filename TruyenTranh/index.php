<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <table style="margin:0 10%; width:80%" border="1px solid">
        <tr>
            <td colspan="2">
                <img src="./image/banner.png" style="width:100%; height:300px">
            </td>
        </tr>
        <tr style="height:50px;">
            <td style="background-color:lawngreen;">
                <a href="index.php">Trang Chủ</a>
                <a href="admin.php">Quản Lý</a>
            </td>
            <td style="background-color:lawngreen; text-align:right;">
                <div style="display: flex">
                    <form name="filter" method="get" action="#">
                        Lọc theo giá: 0 <input type="range" name="pricefiler" min=0 max=25500>25.500
                        <input type="submit" value="Lọc" name="btnPrice">
                        <?php
                        if (isset($_REQUEST['btnPrice'])) {
                            $max = $_REQUEST['pricefiler'];
                            echo $max;
                        }



                        ?>
                    </form>
                    <form action="#" method="get" name="searchfrm" style='margin-left: 100px;'>
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" style="height:30px; border-radius:20px;">
                        <input type="submit" value="Tìm" style="height: 30px; background-color:orange;border-radius:10px;" name="btnSubmit">
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:30%; background-color:lightblue; text-align:left;">
                <?php
                include("View/vCom.php");
                ?>
            </td>
            <td style="width:70%;  text-align:center;">
                <?php
                include("View/vChap.php");

                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; background-color:pink">
                <p>Nguyễn Thị Thúy An</p>
                <p>20018201</p>
            </td>
        </tr>
    </table>
</body>

</html>