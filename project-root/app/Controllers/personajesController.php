<?php

namespace App\Controllers;

use App\Models\personajesModel;

class personajesController extends BaseController
{

public function index() {

  $personajesModel = new personajesModel();
  $personajes = $personajesModel->getDatosApi(); //obtenemos los registros del api
          for($b =0; $b < count($personajes); $b++)//generemos el bucle para almacenas registros en mysql
          { 

             $validacion = $personajesModel->validarDbregistros("users",$personajes[$b]["id"]);  //CONSULTAMOS SI el registro ya existe en nuestra tabla

              if($validacion == 0) //si no existe es un nuevo registro que tiene el api -> proceder a guardarlo
              {
                $data = [
                          'id_personaje' => $personajes[$b]["id"],
                          'name' => $personajes[$b]["nombre"],
                          'url' => $personajes[$b]["img"],
                          
                      ];
                    $personajesModel->insertarDbregistros($data,"users");//Ejecutamos funcion para almacenar cada registro
              }

        } 
  $personajes = $personajesModel->getDbregistrosUnicos("users","id_personaje"); //mandamos a llamar los registros unicos  de la tabla 
  return view("personajes",['personajes' => $personajes ]);//llamamos la vista y le pasamos el array de la tabla 

}

public function insertar() {

 $datos = json_decode(file_get_contents('php://input'));
  $data = [
                          'id_personaje' => "",
                          'name' => $datos->nombre,
                          'url' => $datos->urlImg
                      ];
                   
  personajesModel::insertarDbregistros($data,"users");
}

public function eliminar() {

  $datos = json_decode(file_get_contents('php://input'));          
  personajesModel::eliminarDbregistros("users",$datos->id_personaje);
}

public function actualizar() {
  $datos = json_decode(file_get_contents('php://input'));          
   personajesModel::actualizarDbregistros("users",$datos->id_personaje,$datos->nombre,$datos->url);
}



}