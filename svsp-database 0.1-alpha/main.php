<!-- © Fonteyn German - svsp - 2022 -->
<?php
if($_GET['r'] == 'parol' && $_GET['user'] == 'admin'){
  $dir = $_SERVER['DOCUMENT_ROOT']."/svsp-database/".$_GET['tableName']."/".$_GET['column'].".txt";
  
  if(file_exists($dir)){
  
    if($_GET['f'] == 'getCell'){
      $file = file($dir, FILE_IGNORE_NEW_LINES);
      $cell = $file[$_GET['num']];
      echo $cell;
    }
  
    if($_GET['f'] == 'repCell'){
      $file = file($dir, FILE_IGNORE_NEW_LINES);
  
        if($file[$_GET['num']] != null){
          $file[$_GET['num']] = $_GET['content'];
          file_put_contents($dir, implode(PHP_EOL, $file));
          echo 'true';
        } 
    else echo 'false';
  
    }

    if($_GET['f'] == 'setCell'){
      $file = file($dir, FILE_IGNORE_NEW_LINES);
      $file[] = $_GET['content'];
      file_put_contents($dir, implode(PHP_EOL, $file));
    }

    if($_GET['f'] == 'getArray'){
      $file = file($dir, FILE_IGNORE_NEW_LINES);
      echo $file;
    }
    
  } else echo 'false';
  
}
?>
