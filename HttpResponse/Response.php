<?php

    class HttpResponse {

        public function __construct($code = 500, $error = true, $mensaje = null, $data = null) {

            http_response_code($code);


            $res = array(
                "status" => $code,
                "error" => $error,
                "mensaje" => $mensaje,
                "data"=>$data
            );

            echo json_encode($res);
        }

    }

?>