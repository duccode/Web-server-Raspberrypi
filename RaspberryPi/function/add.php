<?php
$link =new mysqli('localhost','vietduckmt98','duccode1709','home') or die ("Kết nối thất bại!!");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="css/form.css">
</head>
<body>
    <form  method="post">
        <table>
            <tr>
            <label for="type">Add New Device</label>
            <td colspan="2">
                <label for="type">Choose type: </label>
                    <select name="type" id="type">
                        <option value="obj-button">Mode Switch</option>
                        <option value="obj-slider">Mode Dimmer</option>

                    </select>
                    </td>
            </tr>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" placeholder="Name device.."></td>
            </tr>
            <tr>
                <td> State : </td>
                <td><input type="text" name="state" placeholder="State device.."></td>
            </tr>
            <tr>
                <td colspan="2" >
                    <label for="type">Choose color: </label>
                        <select name="color" id="color">
                            <option value="flavor-green"> Green</option>
                            <option value="flavor-orange">Orange</option>
                            <option value="flavor-violet">Violet</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td> Amplitude : </td>
                <td><input type="text" name="amplitude" placeholder="Value amplitude.."></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="type">Choose icon: </label>
                            <select name="icon" id="icon">
                            <option value="fa-lightbulb-o">Light</option>
                            <option value="fa-wrench">Device</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit"  name="add" class = "button"   value="Finish"></td>
            </tr>
        </table>
        
    </form>
    <?php
    if(isset($_POST['add']))
    {   
        $type = $_POST['type'];
        $name = $_POST['name'];
        $state = $_POST['state'];
        $flavor = $_POST['color'];
        $amplitude = $_POST['amplitude'];
        $icon = $_POST['icon'];
        $query = "INSERT INTO `device` ( `type`, `name`, `state`, `flavor`, `amplitude`, `icon`) 
        VALUES ('$type', ' $name', '$state', '$flavor', '$amplitude', ' $icon')";
        mysqli_query($link,$query) or die ('Thêm thiết bị thất bại!!');
        //header('location:showdata.php');
    }
    ?>

</body>
</html>
