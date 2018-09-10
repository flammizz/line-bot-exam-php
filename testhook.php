<?php
   $update_response = file_get_contents("php://input");
        $update = json_decode($update_response, true);
        if (isset($update["result"]["action"])) {
                $message = array(
                    "source" => $update["result"]["source"],
                    "speech" => "Hello from webhook",
                    "displayText" => "Hello from webhook",
                    "contextOut" => array()
                );

                echo json_encode($message);
        }
        ?>
