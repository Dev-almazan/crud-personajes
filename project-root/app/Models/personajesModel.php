<?php

namespace App\Models;
use CodeIgniter\Model;

class personajesModel extends Model
{

     public static function insertarDbregistros($data,$table)
    {
            $db = \Config\Database::connect();
            $db->table($table)->insert($data);  // Insertar datos en la tabla
    }

    public static function validarDbregistros($table,$idRegistro)
    {
        $db = \Config\Database::connect();  
        $query = $db->query("SELECT DISTINCT id_personaje FROM {$table} WHERE id_personaje = {$idRegistro}");// traernos todos los registros unicos de la tabla 
        return $query->getNumRows(); // Obtenemos y retornamos los resultados

    }

    public static function getDbregistrosUnicos($table,$columna)
    {
 
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM {$table} GROUP BY {$columna}");// traernos todos los registros unicos de la tabla 
            return $query->getResultArray(); // Obtenemos y retornamos los resultados
    }

    public static function eliminarDbregistros($table,$id)
    {
 
            $db = \Config\Database::connect();
            $db->query("DELETE  FROM {$table} WHERE id_personaje = {$id}");// eliminamos el registro de la tabla 
    }

    public static function actualizarDbregistros($table,$id,$name,$url)// actualizamos el registro de la tabla 
    {
 
            $db = \Config\Database::connect();
            $sql = "UPDATE {$table} SET name = '" . $name . "', url = '" . $url . "' WHERE id_personaje = " . $id;
            $db->query($sql);
    }



    public function getDatosApi(){
            //pendiente de optimizar key y guardarlas en archivo env
            $time = date("Y:m:d");
            $publicKey = "b30cbb296e6e7132bc34a48dab488b2f";
            $privateKey = "250578af658dcc032836936e52de8501a56fd18c";
            //creamos y pasamos keys en la url de acuerdo al auth de marvel
            $endPoint = "http://gateway.marvel.com/v1/public/characters?ts={$time}&apikey={$publicKey}&hash=".md5($time.$privateKey.$publicKey);
            //invocamos api
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);

           $jsonResponse = json_decode($response); // decodifico respuesta del api tipo json

            if (isset($jsonResponse->data->results)) 
            {
                $results = $jsonResponse->data->results;
                $dataResult = []; 

                foreach ($results as $character) // seteamos el array solo con la info necesaria
                {

                    $characterData = [
                        'id' => $character->id,
                        'nombre' => $character->name,
                        'img' => $character->thumbnail->path .".".$character->thumbnail->extension
                    ];

                    $dataResult[] = $characterData;
                }
            }
            else 
            {

                $results = "Error: Hubo un problema al conectarse a la base";
            }
             
            return $dataResult; // retornamos datos
    }

}



?>