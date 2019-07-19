<?php




 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>WebServices</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        </head>
        <body>

          <div class="container">
            <div class="head">
              <h1>Formulario</h1>
            </div>


            <div class="col-md-8">


              <form action="" method="post">
                <div class="form-group row">
                  <label for="nombre" class="col-4 col-form-label">Nombre de pila</label>
                  <div class="col-8">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-address-book"></i>
                        </div>
                      </div>
                      <input id="nombre" name="nombre" placeholder="nombre" type="text" required="required" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido1" class="col-4 col-form-label">Primer apellido</label>
                    <div class="col-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-address-book"></i>
                          </div>
                        </div>
                        <input id="apellido1" name="apellido1" placeholder="primer apellido" type="text" required="required" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="apellido2" class="col-4 col-form-label">Segundo apellido</label>
                      <div class="col-8">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-address-book"></i>
                            </div>
                          </div>
                          <input id="apellido2" name="apellido2" placeholder="segundo apellido" type="text" required="required" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="cedula" class="col-4 col-form-label">Cédula</label>
                        <div class="col-8">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                              </div>
                            </div>
                            <input id="cedula" name="cedula" placeholder="ejemplo 114850096" type="text" required="required" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="phone" class="col-4 col-form-label">Teléfono</label>
                          <div class="col-8">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fa fa-phone"></i>
                                </div>
                              </div>
                              <input id="phone" name="phone" placeholder="ejem: 87041136" type="text" required="required" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="provincia" class="col-4 col-form-label">Provincia</label>
                            <div class="col-8">
                              <select id="provincia" name="provincia" required="required" class="custom-select"><option>
                                Seleccione</option></select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="canton" class="col-4 col-form-label">Cantón</label>
                            <div class="col-8">
                              <select id="canton" name="canton" class="custom-select" required="required"></select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="distrito" class="col-4 col-form-label">Distrito</label>
                            <div class="col-8">
                              <select id="distrito" name="distrito" class="custom-select" required="required"></select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="direccion" class="col-4 col-form-label">Dirección Exacta</label>
                            <div class="col-8">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fa fa-map"></i>
                                  </div>
                                </div>
                                <input id="direccion" name="direccion" placeholder="dirección exacta" type="text" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </form>

                        </div>
                      </div>
                    </body>

                    <script>
                      $("#cedula").keyup(function(){

                        if ($("#cedula").val().length == 9 ){
                          $.getJSON( "https://apis.gometa.org/cedulas/"+$("#cedula").val() )
                              .done(function( data, textStatus, jqXHR ) {
                                  if ( console && console.log ) {
                                      console.log( "La solicitud se ha completado correctamente." );
                                      console.log( data.results[0] );
                                      $("#nombre").val((data.results[0].firstname1));
                                      $("#apellido1").val((data.results[0].lastname1));
                                      $("#apellido2").val((data.results[0].lastname2));
                                  }
                              })
                              .fail(function( jqXHR, textStatus, errorThrown ) {
                                  if ( console && console.log ) {
                                      console.log( "Algo ha fallado: " +  textStatus);
                                  }
                                });
                            }



                      });
                    </script>
                    <script>
                        $(document).ready(function () {

                                $.ajax({
                                    dataType: "json",
                                    url: "https://ubicaciones.paginasweb.cr/provincias.json",
                                    data: {},
                                    success: function (data) {
                                        var html = "<select><option> Seleccione </option>";
                                        for(key in data) {
                                            html += "<option value='"+key+"'>"+data[key]+"</option>";
                                        }
                                        html += "</select";
                                        $('#provincia').html(html);
                                    }
                                });

                                $("#provincia").on('change', function(){
                                  $.ajax({
                                      dataType: "json",
                                      url: "https://ubicaciones.paginasweb.cr/provincia/"+$("#provincia").val()+"/cantones.json",
                                      data: {},
                                      success: function (data) {
                                          var html = "<select><option> Seleccione </option>";
                                          for(key in data) {
                                              html += "<option value='"+key+"'>"+data[key]+"</option>";
                                          }
                                          html += "</select";
                                          $('#canton').html(html);
                                      }
                                  });
                                });

                                $("#canton").on('change', function(){
                                  $.ajax({
                                      dataType: "json",
                                      url: "https://ubicaciones.paginasweb.cr/provincia/"+$("#provincia").val()+"/canton/"+$("#canton").val()+"/distritos.json",
                                      data: {},
                                      success: function (data) {
                                          var html = "<select><option> Seleccione </option>";
                                          for(key in data) {
                                              html += "<option value='"+key+"'>"+data[key]+"</option>";
                                          }
                                          html += "</select";
                                          $('#distrito').html(html);
                                      }
                                  });
                                });







                        })
                    </script>
                  </html>