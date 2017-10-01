<?php


if($_GET['q']){

    require_once getcwd() . '/../../qa-include/qa-base.php';
    
    require_once QA_INCLUDE_DIR.'qa-search-basic.php';
    $query  = $_GET['q'];
    $qa_search_basic_var = new qa_search_basic();
    $result =  $qa_search_basic_var -> process_search($query, 0, 10, 1, true, false);
    var_dump ($result);
}

