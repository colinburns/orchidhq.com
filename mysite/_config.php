<?php

global $project;
$project = 'mysite';

global $database;
$database = 'orchidhq';

require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');

// Log error messages to my email address colin@browzzin.com
SS_Log::add_writer(new SS_LogEmailWriter('colin@latitude49.ca'), SS_Log::WARN);

// Call the editor.css file to be in the WYSIWYG editor.
HtmlEditorConfig::get('cms')->setOption('content_css', '/themes/browzzin/dist/css/editor.css');
