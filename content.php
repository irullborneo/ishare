<?php
    switch ($_GET['p']) {
        case 'folder':
            include "module/folder/folder.php";
            break;
            
        case 'upload':
            include "module/upload/upload.php";
            break;

        case 'account':
            //include "module/account/tampil.php";
            break;

        default:
            include "404.php";
            break;
    }
?>