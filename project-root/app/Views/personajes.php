<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>CRUD PERSONAJES!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <!-- cdn bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- estilos -->
    <style>
    .inicial
    {
        width: 80%;
        margin:  0 auto;
        padding: 2% 0 4% 0;
    }    
    .inicial-sec
    {
        width: 100%;
        margin:  0 auto;

    }
    
    #btnCrud
    {
        color: white;
        position: fixed;
        bottom: 8%;
        right: 1%;
        z-index: 100;
    }
    </style>
    
</head>
<body>

   
<h2 class="text-center alert alert-warning pt-4 pb-4 shadow-lg">Marvel personajes</h2>
<div class="inicial">

    <div class="row col-md-12 inicial-sec" id="sec-personajes">
        <!--Renderizamos  los resultados del controlador personajes Controller-->
        <?php for($b =0; $b < count($personajes); $b++){ ?>
            <div class="col-md-3 mb-4" data-id="<?php echo $personajes[$b]["id_personaje"]; ?>">
                <div class="card shadow-lg" style="width: 18rem; " >
                    <img src="<?php echo $personajes[$b]["url"]; ?>" class="card-img-top" width="100%" height="350px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $personajes[$b]["name"]; ?>  </h5>
                    </div>
                    <div class="card-footer">
                         <button type="submit" onclick="editar('<?php echo $personajes[$b]["id_personaje"]; ?>','<?php echo $personajes[$b]["name"]; ?>','<?php echo $personajes[$b]["url"]; ?>')"  class="btn btn-warning text-white">Editar</button>
                          <button onclick="eliminar('<?php echo $personajes[$b]["id_personaje"]; ?>')"  class="btn btn-outline-warning">Eliminar</button>
                    </div>
                </div>
            </div>
        <?php } ?>    
    </div>
</div>

<!-- Modal  Formuliario añadir-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Personaje</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="submitForm">

                           <div class="form-group p-2">
                            <label class="label-gp">Nombre </label>
                            <input type="text" id="nombre" class="form-control" required />
                        </div>
                        <div class="form-group p-2">
                            <label class="label-gp">Url imagen</label>
                            <input type="url" id="urlImg" class="form-control" required />
                        </div>
                        <div class="form-group p-2">
                            <button type="submit" class="btn btn-warning" >Guardar</button>
                        </div>
         </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal  Formuliario editar-->
<div class="modal fade" id="exampleModalb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Personaje</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="editForm" >
                          <input type="hidden" id="idUser"  />
                           <div class="form-group p-2">
                            <label class="label-gp">Nombre </label>
                            <input type="text" id="nombreE" class="form-control" required />
                        </div>
                        <div class="form-group p-2">
                            <label class="label-gp">Url imagen</label>
                            <input type="url" id="urlImgE" class="form-control" required />
                        </div>
                        <div class="form-group p-2">
                            <button type="submit" class="btn btn-warning"  >Editar</button>
                        </div>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning shadow-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnCrud" >
  Añadir Personaje
</button>
<button type="button" style="display: none;" class="btn btn-warning shadow-lg" data-bs-toggle="modal" data-bs-target="#exampleModalb" id="btnEditar"  >
  Editar Personaje
</button>

 <!-- script logica uso de fetch para los eventos asyncronos --> 
<script>
                function removerPersonaje(dataId) //funcion para remover del dom personaje
                {
                const characterElement = document.querySelector(`#sec-personajes .col-md-3[data-id="${dataId}"]`);
                if (characterElement) {
                    characterElement.remove();
                }
                }

             function editar(dataId,nombre,imgUrl) //funcion para mostrar form editar
             {

                      document.getElementById("btnEditar").click();
                      document.getElementById("nombreE").value = nombre;
                      document.getElementById("urlImgE").value = imgUrl;
                      document.getElementById("idUser").value = dataId;
            }


              

            document.getElementById("submitForm").addEventListener("submit",function(e){
                e.preventDefault();

  
                         const dataForm = {
                        'nombre': document.getElementById('nombre').value,
                        'urlImg': document.getElementById('urlImg').value
                            }

                            const envioApi = fetch(window.location +'/api/insert', {
                                    method: 'POST',
                                    body: JSON.stringify(dataForm),
                                    headers: {
                                            'content-type': 'application/json'
                                    }
                            });

                            envioApi.then((respuesta) => {

                            if (respuesta.status == 200) {

                            location.reload();

                            }

                            }).catch((error) => {
                                    console.log(error)
                            })


            })

            document.getElementById("editForm").addEventListener("submit",function(e){
                e.preventDefault();

  
                         const dataForm = {
                        'nombre': document.getElementById('nombreE').value,
                        'url': document.getElementById('urlImgE').value,
                        'id_personaje': document.getElementById('idUser').value
                            }

                            const envioApi = fetch(window.location +'api/update', {
                                    method: 'POST',
                                    body: JSON.stringify(dataForm),
                                    headers: {
                                            'content-type': 'application/json'
                                    }
                            });

                            envioApi.then((respuesta) => {

                            if (respuesta.status == 200) {
                            location.reload();

                            }

                            }).catch((error) => {
                                    console.log(error)
                            })


            })

         function eliminar(e)
         {


                if (confirm(`¿Desea eliminar el personaje?`)) {

                        const envioApi = fetch(window.location +'/api/delete', {
                        method: 'POST',
                        body: JSON.stringify({
                         "id_personaje" : e   
                        }),
                        headers: {
                                'content-type': 'application/json'
                        }
                });

                envioApi.then((respuesta) => {

                if (respuesta.status == 200) {

                removerPersonaje(e);
                }

                }).catch((error) => {
                        console.log(error)
                })
                   
                }
            }
</script>

</body>
</html>
