<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Content-Type: application/json; charset=UTF-8");

    require_once('../Configuraciones/Database.php');   
    require_once('../Persistencia/NotaDAO.php');
    require_once('../HttpResponse/Response.php');


    try{
        $database = Database::connectDB();      
    }
    catch(PDOException $ex){
        $response = new HttpResponse(500,true,'Error de conexión a la base de data',null);  
    }


    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Methods: POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Max-Age: 86400');


        $response = new HttpResponse(200,false);

    }

    switch($_SERVER['REQUEST_METHOD']){

        case 'POST':
            
            $data = json_decode(file_get_contents("php://input"));

            break;

        case 'GET':
            $notaDAO = new NotaDAO($database);
            $resultado = $notaDAO->obtenerPorID($_GET['id']);
            $response = new HttpResponse(200,false, 'Solicitud con éxito',$resultado);

            break;
        
        case 'PUT':
            break;

        case 'DELETE':
            
            break;

        default:
            $response = new HttpResponse(405,true,"Tipo de petición no permitida");
            break;
            

    }
    

?>