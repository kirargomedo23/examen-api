<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: *");


    require_once('../Configuraciones/Database.php');   
    require_once('../Persistencia/CursoDAO.php');
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
            break;

        case 'GET':
            $notaDAO = new CursoDAO($database);
            $resultado = $notaDAO->listar();
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