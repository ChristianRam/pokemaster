

    <?php include("conexion/conexion.php");  ?>

        <div class="container">
            <h2>Agregar Entrenador</h2>

            <script src="js/validar_agg.js"></script>

            <div class="card card-body">
                <form action="procesos/agg_entrenador.php" method="post">    
                    <div>
                        <table class="table table-dark">
                            <tr>
                            <td>Nombre</td>
                            <td><input type="text" id="nombre" name="nombre" class="form-control input_user" onkeypress="return soloLetras(event)" required></td>
                            <td rowspan="2">Descripción</td>
                            <td rowspan="2"><textarea id="descripcion" name="descripcion" cols="30" rows="4" class="form-control input_user" required></textarea></td>
                            </tr>
                            <tr>
                            <td>Apellido</td>
                            <td><input type="text" id="apellido" name="apellido" class="form-control input_user" onkeypress="return soloLetras(event)" required></td>
                            </tr>
                            <tr>
                            <td>Alias</td>
                            <td><input type="text" id="alias" name="alias" class="form-control input_user" required></td>
                            <td>Experiencia(en años)</td>
                            <td><input type="number" id="experiencia" name="experiencia" class="form-control input_user" onkeypress="return soloNumeros(event);" 
                            maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></td>
                            </tr>
                            <tr>
                                <td>Region</td>
                                <td>
                                    <select class="form-control" id="region" name="region" required>
                                        <option value=''>Seleccione una región</option>
                                        <?php 
                                            $sql = $base_de_datos->prepare('SELECT nombre_region FROM pokemaster.regiones;');
                                            $sql->execute();
                                            $regiones = $sql->fetchAll(PDO::FETCH_OBJ);
                                            $contador = 0;
                                            foreach($regiones as $region){
                                                $contador = $contador + 1;
                                                echo "<option value='".$contador."'>".$region->nombre_region."</option>";
                                            }

                                        ?>
                                    </select>
                                </td>
                                <td>Distincion</td>
                                <td>
                                <select class="form-control" id="distincion" name="distincion" required>
                                        <option value=''>Seleccione una distinción</option>
                                        <?php 
                                            $sql = $base_de_datos->prepare('SELECT nombre_distincion FROM pokemaster.distincion;');
                                            $sql->execute();
                                            $distinciones = $sql->fetchAll(PDO::FETCH_OBJ);
                                            $contador = 0;
                                            foreach($distinciones as $distincion){
                                                $contador = $contador + 1;
                                                echo "<option value='".$contador."'>".$distincion->nombre_distincion."</option>";
                                            }

                                        ?>
                                </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="float:center;">
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="agregar" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
            
    </div>