<?php
define("HANDLERS_PATH", __DIR__ . "/handlers");

$value = [
    "title" => "Dockerized Workflow."
];

if (isset($value["title"]) && $value["title"] === "Dockerized Workflow.") {
    include_once HANDLERS_PATH . "/mongodbChecker.handler.php";
    include_once HANDLERS_PATH . "/postgreChecker.handler.php";
}
?>
