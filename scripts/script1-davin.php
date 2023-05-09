<?php 
    /**
     * Funciones para la súbida de ficheros al servidor a través de formulario y su eliminación 
     * @version 1.0.1
     * @author Migue Davín Jones
     */

    /**
     * Cargar ficheros al servidor
     * 
     * Pasar los ficheros subidos por el usuario mediante formulario de la carpeta temporal a una permanente del servidor
     * 
     * @param string $uploadDir - Directorio al que se va a subir el fichero de forma permanente dentro del servidor
     * @param array $fileInputName - Datos del fichero subido por el usuario
     * @return boolean - Resultado positivo o negativo de la operación
     * @example url://localhost/distancia23/scripts/script1-davin.php
     * @version 1.0.1
     * @copyright CC BY-NC-SA 4.0
     * 
     */
    function UploadFile($uploadDir, $fileInputName){

        $filename = $fileInputName['name'];
        $temp_name = $fileInputName['tmp_name'];
        $path_filename = $uploadDir.$filename;

        if (!file_exists($path_filename)){
            move_uploaded_file($temp_name, $path_filename);
            return true;
        } else { 
            return false;
        }
    }


    /**
     * Borrar fichero del servidor
     * 
     * Asegurar el borrado permanente del fichero guardado dentro del servidor
     * 
     * @param string $pathToFile - Ruta completa al fichero que se desea borrar
     * @return boolean - Resultado positivo o negativo de la operación
     * @example url://localhost/distancia23/scripts/script2-davin.php
     * @version 1.0.1
     * @copyright CC BY-NC-SA 4.0
     * 
     */
    function DeleteFile($pathToFile){
        if (strripos($pathToFile, $_SERVER['DOCUMENT_ROOT']) === false){
            unlink($_SERVER['DOCUMENT_ROOT'].$pathToFile);
            return false;
        } else {
            unlink($pathToFile);
            return true;
        }
    }
?>