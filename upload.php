<?php
if(isset($_FILES['fileUploaded'])){  
  $myfile = fopen("anything.h", "w");
   $flag = 3;
    
    $file_ext = pathinfo($_FILES['fileUploaded']['name'], PATHINFO_EXTENSION); 

    if(strtolower($file_ext) !== 'hex') 
    {
      echo "Please choose a HEX file.";
      $flag = 1;
    }

    if( $_FILES['fileUploaded']['size'] > 50000)
    {
      echo 'File exceeded 50K BIT.';
      $flag = 1;
    }

    if($flag == 3)
    {
      $file_content = file_get_contents($_FILES['fileUploaded']['tmp_name']);
      fwrite($myfile, $file_content);
      fclose($myfile); 
      header("Location: done_upload.html");
      exit; 
    }

  }
  else{
    header("Location: index.html");
    exit; 
  }
?>
