<?php


/**
 * Clase para la gestión de peticiones a la API de la NASA
 * @author José Luis Fernández Yagües
 * @version 1.0.1
 */
class ModeloFotosNasa{
    
    private $nasa_api_key = "jZfL6ZSZFwZu6ELnSTrRn0btViwhLywNvffMsLao";
    private $nasa_api_end_point = "https://api.nasa.gov/planetary/apod";
    
    /**
     * Constructor de la clase ModeloFotosNasa
     */
    public function __construct(){
    }
    
    /**
     * Getter para la obtención de parámetro $nasa_api_key
     * @return string Punto de entrada de la API de la NASA
     */
    public function getNasaEndPoint(){
      return $this->nasa_api_end_point;
    }

    /**
     * Getter para la obtención de la key de la API
     * @return string Key de la API
     */
    public function getNasaApiKey(){
      return $this->nasa_api_key;
    }
    
    /**
     * Getter para obtener los bloques de datos solicitados a la API de la NASA+
     * 
     * Getter que mediante CURL realiza una petición a la API de la NASA mediante el 
     * uso de la Key y pasando como parámetro el número de bloques de información que desea
     * 
     * @param integer - Número de fotos o de bloques de contenido solicitados
     * @return array - Colección de información 
     * @author José Luis Fernández Yagües
     * @version 1.0.1
     * @copyright CC BY-NC-SA 4.0
     * 
     */
    public function getNFotos($numero_fotos){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->nasa_api_end_point.'?api_key='.$this->getNasaApiKey().'&count='.$numero_fotos);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);

        curl_close($ch);

        return json_decode($data, true);
    }
}