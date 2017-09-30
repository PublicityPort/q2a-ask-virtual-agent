<?php

class qa_search_basic_layer extends qa_search_basic
{
    function process_search($query, $start, $count, $userid, $absoluteurls, $fullcontent){
        $query .= 'query ++';
        return process_search_base($query, $start, $count, $userid, $absoluteurls, $fullcontent);
    }
}
