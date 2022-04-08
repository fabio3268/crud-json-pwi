<?php

$produto = filter_input_array(INPUT_GET,FILTER_DEFAULT);

var_dump($produto["nomeProd"]);
