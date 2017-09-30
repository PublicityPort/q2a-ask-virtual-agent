<?php

if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

/*
// Register file to override the functions
// present in the file
*/
//qa_register_plugin_overrides('qa-page-override.php');

qa_register_plugin_layer('qa-va-ask-layer.php', 'q2a Ask VA Layer Layer');

//qa_register_plugin_layer('search-override.php', 'GSearch Layer');

qa_register_plugin_module('module', 'qa-ask-va-admin.php', 'qa_ask_va_admin_config', 'Q2A Ask Virtual Agent plugin');
