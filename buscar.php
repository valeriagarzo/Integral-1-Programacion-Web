<html>
    <head>
        <title>Buscador</title>
    </head>
    <body>
<!--form pa recibir datos y dps comparar-->
        <form action="buscar.php" method="get">
            Nombre:
            <input type="text" name="nombre" id="nombre"/>
            Apellido:
            <input type="text" name="apellido" id="apellido"/>
            Ciudad:
            <input type="text" name="ciudad" id="ciudad"/>
            Categoria:
            <input type="text" name="categoria" id="categoria"/>
            <input type="submit" value="buscar"/>
        </form>
        <?php
        //si tira pa error 
            if(isset($_GET['error'])){
        ?>
            <b>ERROR</b>
        <?php
            }
        ?>
    </body>
    
    <?php
    //solo va a hacer la busqueda si se activa el get
        if (isset($_GET['nombre'])) {
        //recibe los datos y los guarda en variables
            $NombreP = $_GET['nombre'];
            $ApellidoP = $_GET['apellido'];
            $CiudadP = $_GET['ciudad'];
            $CategoriaP = $_GET['categoria'];

            //creo los particimantes
            //lo q tengo mal pq tenias q hacer eso tu aparte </3
            $participantes = [
                [
                    'nombre' => 'Universidad',
                    'apellido' => 'Playa Ancha',
                    'ciudad' => 'Valparaiso',
                    'categoria' => 'Grupo A'
                ],
                [
                    'nombre' => 'Ryland',
                    'apellido' => 'Grace',
                    'ciudad' => 'Erid',
                    'categoria' =>'Grupo B'
                ],
                [
                    'nombre' => 'Jason',
                    'apellido' => 'todd',
                    'ciudad' => 'Gotham',
                    'categoria' =>'Grupo B'
                ],
                [
                    'nombre' => 'Zohran',
                    'apellido' => 'Mamdani',
                    'ciudad' => 'New York',
                    'categoria' =>'Grupo A'
                ]
            ];

            $encontrado = false;

            //foreach es un for q no una i basicamente
            foreach ($participantes as $p) {
                // Comparamos las 4 cosas al mismo tiempo usando strcasecmp
                //strcasecmp compara las variables sin tener en cuenta las mayus o minus
                if (strcasecmp($NombreP, $p['nombre']) == 0 && 
                    strcasecmp($ApellidoP, $p['apellido']) == 0 && 
                    strcasecmp($CiudadP, $p['ciudad']) == 0 && 
                    strcasecmp($CategoriaP, $p['categoria']) == 0) {

                    $encontrado = true;
                    break; // Si ya lo encontramos, detenemos el bucle
                }
            }

            // Fuera del bucle imprimes el resultado final una sola vez
            if ($encontrado) {
                echo "Participante encontrado";
            } else {
                echo "Participante no encontrado";
            }

        }//si se nota q en esta parte me apoye una banda en la ia xd
    ?>

</html>

