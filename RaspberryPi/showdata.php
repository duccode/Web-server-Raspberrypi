<?php
    $link =new mysqli('localhost','vietduckmt98','duccode1709','home') or die ("Kết nối thất bại!!");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="css/show.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/query.js"></script>
    <title>Danh Sách Thiết Bị</title>
</head>
<body>
    <div id ="main">
        <div id ="head">
            <h1>Web Server IOT Với Raspberry PI</h1>
        </div>
        <div id ="menu">
            <ul>
                <li><a href="/lazy2/index.php">Trang chủ</a></li>
                <li><a href="/lazy2/chart.php">Biểu đồ</a></li>
            </ul>
        </div>
        <div id="maincontent">
            <div id = "content">
                <div class="dinhdang">
                    <h1>Danh sách thiết bị</h1>
                    <div class="noidung">
                        <table width="100%">
                            <tr>
                                <th>Stt</th>
                                <th>Tên thiết bị</th>
                                <th>icon</th>
                                <th>Xử lý</th>
                            </tr>
                        
                            <?php
                                $query = "SELECT * FROM device";
                                $result = mysqli_query($link, $query);
                                if(mysqli_num_rows($result)>0){
                                $i =0;
                                while($r = mysqli_fetch_assoc($result))
                                {    
                                   $i++;
                                   $Name = $r['name'];
                                   $icon = $r['icon'];
                                   echo "<tr>";
                                   echo "<td>$i</td>";
                                   echo "<td>$Name</td>";
                                   echo "<td>$icon</td>";
                                   
                                   echo "<td><a href='delete.php?id=$Name'>Xóa</a></td>";

                                 }
                                }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php
                include "function/add.php";
            ?>
        </div>
    </div>
</body>
</html>
