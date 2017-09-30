<?php

    require_once QA_INCLUDE_DIR.'app/format.php';
	require_once QA_INCLUDE_DIR.'app/options.php';
	require_once QA_INCLUDE_DIR.'app/search.php';

    
//	Perform the search if appropriate

	if (strlen($_GET['q'])) {

	//	Pull in input parameters

		$inquery=trim($_GET['q']);
		$userid=qa_get_logged_in_userid();
		$start=qa_get_start();

		$display=qa_opt_if_loaded('page_size_search');
		$count=2*(isset($display) ? $display : QA_DB_RETRIEVE_QS_AS)+1;
			// get enough results to be able to give some idea of how many pages of search results there are

	//	Perform the search using appropriate module

		$results=qa_get_search_results($inquery, $start, $count, $userid, false, false);

	//	Count and truncate results

		return $results;
	}

/*
	Omit PHP closing tag to help avoid accidental output
*/