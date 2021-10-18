<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Content-Type: application/json; charset=UTF-8");



    require_once('../Configuraciones/Database.php');   
    require_once('../Persistencia/AlumnoDAO.php');
    require_once('../Persistencia/NotaDAO.php');
    require_once('../HttpResponse/Response.php');
    require_once('../Modelos/Alumno.php');
    require_once('../Modelos/Nota.php');
    require_once('../Persistencia/UtilsDAO.php');




    try{
        $database = Database::connectDB();      
    }
    catch(PDOException $ex){
        $response = new HttpResponse(500,true,'Error de conexión a la base de data',null);  
    }


    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Methods: POST,PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Max-Age: 86400');


        $response = new HttpResponse(200,false);

    }

    switch($_SERVER['REQUEST_METHOD']){

        case 'POST':
            
            $data = json_decode(file_get_contents("php://input"));

            $alumno = new AlumnoModel(null,$data->ALUMNO->AL_NOMBRES,$data->ALUMNO->AL_APELLIDOS,$data->ALUMNO->AL_FECHA_NAC,$data->ALUMNO->AL_SEXO,1);

            $alumnoDAO = new AlumnoDAO($database);
            $resultado = $alumnoDAO->crear($alumno); 
            
            $utilsDAO = new UtilsDAO($database);
            $last_id = $utilsDAO->obtenerUltimoID();
            
           

            $notas = $data->NOTAS;
            $longitud = count($notas);
   
            for($i=0; $i<$longitud; $i++){
                $nota = new NotaModel(null,$notas[$i]->NO_PRACTICA_N1,$notas[$i]->NO_PRACTICA_N2,$notas[$i]->NO_PRACTICA_N3,$notas[$i]->NO_PARCIAL,$notas[$i]->NO_FINAL,null,$notas[$i]->CU_ID,null);

                $nota->set_no_al_id($last_id);
                $nota->calcularPromedioFinal();

                $notaDAO = new NotaDAO($database);
                $resultado = $notaDAO->crear($nota);

                if($resultado == 0){
                    $response = new HttpResponse(500,true, 'Solicitud no ejecutada con éxito.',$resultado);
                }
            }

            $response = new HttpResponse(200,false, 'Solicitud con éxito.',[]);


            break;

        case 'GET':
            if(!isset($_GET['id'])){
                $alumnoDAO = new AlumnoDAO($database);
                $resultado = $alumnoDAO->listar();
                $response = new HttpResponse(200,false, 'Solicitud con éxito',$resultado);
            }else{
                $alumnoDAO = new AlumnoDAO($database);
                $resultado = $alumnoDAO->obtenerPorID($_GET['id']);
                $response = new HttpResponse(200,false, 'Solicitud con éxito',$resultado);
            }
            break;
        
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"));

            $alumno = new AlumnoModel($data->AL_ID,$data->AL_NOMBRES,$data->AL_APELLIDOS,$data->AL_FECHA_NAC,$data->AL_SEXO,1);

            
            $alumnoDAO = new AlumnoDAO($database);
            $resultado = $alumnoDAO->editar($alumno);
            $response = new HttpResponse(200,false, 'Solicitud con éxito',$resultado);
            break;

        case 'DELETE':
            $alumnoDAO = new AlumnoDAO($database);
            $resultado = $alumnoDAO->eliminar($_GET['id']);
            if($resultado === 0){
                $response = new HttpResponse(404,true, 'Solicitud no ejecutado con éxito','Alumno no encontrado.');
            }

            $response = new HttpResponse(200,false, 'Solicitud con éxito','Acción realizado con éxito.');

            break;

        /* default:
            $response = new HttpResponse(405,true,"Tipo de petición no permitida");
            break; */
            

    }

?>
