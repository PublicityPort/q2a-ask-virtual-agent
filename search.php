<?php


if($_GET['q']){

    require_once getcwd() . '/../../qa-include/qa-base.php';
    
    require_once QA_INCLUDE_DIR.'qa-search-basic.php';
    $query  = $_GET['q'];
    $qa_search_basic_var = new qa_search_basic();
    $result =  $qa_search_basic_var -> process_search($query, 0, 10, 1, true, true);
    //$data = json_decode($result, true);
    //echo $data;
    
    //echo qa_opt('site_url');
    echo '<table border="1">';
    
    for($i=0;$i<count($result);$i++) {
        echo('<tr>');
        echo('<td><a href="'.qa_opt('site_url').$result[$i]['question']['postid'].'">' . $result[$i]['question']['title'] . '</a></td>');
        //echo('<td>' . $result[$i]['question']['postid'] . '</td>');
        echo('<td>' . $result[$i]['question']['views'] . '</td>');
        echo('</tr>');
      }
      echo '</table >';
}

