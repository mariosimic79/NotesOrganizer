<?php
        $user = $_POST['user'];
        $nazivDat = $_POST['nazivDoc'];  
        $sadrzajDat = $_POST['myTextArea'];
         
         $tmp = fopen('files/'.$user.'/doc/'.$nazivDat.'.html', 'w');
         fwrite($tmp,$sadrzajDat);
         fclose($tmp);
         
         $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         $link= str_replace("/save.php", "",$actual_link);
         header("Location: ".$link.'/editor/'.$nazivDat);
         
         