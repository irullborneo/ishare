<?php
    session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";

    $detail=getDetailFiles($_POST['id'], $_POST['type']);
    $detail=mysql_fetch_array($detail);
?>

<div style="text-align: center;">
    <?php
        if($detail[1]==1){
    ?>
    <img class="img" src="asset/img/folder.png" style="min-width: 50px; height: 150px; max-width:150px; min-height:50px" />
    <h4><?php echo $detail[0]; ?></h4>

    <table class="table table-bordered" style="font-size: 9px">
       <tbody>
            <tr>
                <td style="text-align: left; font-weight: bold">FILE NAME</td>
                <td style="text-align: left;"><?php echo $detail[0]; ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">TYPE</td>
                <td style="text-align: left;"><?php echo getTypeFile($detail[1]); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">DATE CREATED</td>
                <td style="text-align: left;"><?php echo $detail[2]; ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">DATE MODIFIED</td>
                <td style="text-align: left;"><?php echo $detail[3]; ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">CREATED BY</td>
                <td style="text-align: left;"><?php echo getUsers($_SESSION['id_user'],"name"); ?></td>
            </tr>
            <tr style="">
                <td style="text-align: left;font-weight: bold">SIZE</td>
                <td style="text-align: left;">
                    -
                </td>
            </tr>
        </tbody>
    </table>
    <?php
        }
        else{
            if($detail[1]==2){
                echo "<img class=\"img\" src=\"$detail[4]\" style=\"min-width: 50px; max-height: 150px; max-width:150px; min-height:50px\" />";
            }
            else{
                echo "<img class=\"img\" src='".getIconDetail($detail[1])."' style=\"min-width: 50px; height: 150px; max-width:150px; min-height:50px\" />";
            }
    ?>
    <h4><?php echo $detail[0]; ?></h4>
    <table class="table table-bordered" style="font-size: 9px">
       <tbody>
            <tr>
                <td style="text-align: left; font-weight: bold">FILE NAME</td>
                <td style="text-align: left;"><?php echo $detail[0]; ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">TYPE</td>
                <td style="text-align: left;"><?php echo getTypeFile($detail[1]); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">DATE DOWNLOAD</td>
                <td style="text-align: left;"><?php echo $detail[2]; ?></td>
            </tr>
            <tr>
                <td style="text-align: left;font-weight: bold">DOWNLOAD BY</td>
                <td style="text-align: left;"><?php echo getUsers($detail[3],"name"); ?></td>
            </tr>
            <tr style="">
                <td style="text-align: left;font-weight: bold">SIZE</td>
                <td style="text-align: left;">
                    <?php echo getSizeFile($detail[5]); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
        }
    ?>
</div>