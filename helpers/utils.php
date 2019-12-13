<?php
class Utils
{
  public static function saveImage($imagen){

    $result = false;

     if (isset($imagen)) {

       //el nombre de el archivos
       $filename = $imagen['name'];

       //el tipo de archivo,la extension png....
       $mimetype = $imagen['type'];

       //la locacion temporal de el archivo
       $tempfile=$imagen['tmp_name'];

       if ($mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/png'|| $mimetype == 'image/gif') {

         if (!is_dir('images')) {

           mkdir('images',0007,true);
         }

         move_uploaded_file($tempfile,'images/'.$filename);

         $result = true;
     }//check image type
   }//check if image exist
   return $result;
    } //fin function saveImage


    public static function deleteSession($session){

      if (isset($_SESSION[$session])) {

        $_SESSION[$session]=null;

        unset($_SESSION[$session]);
      }
      return $session;
    }

  }//fin Class Utils

 ?>
