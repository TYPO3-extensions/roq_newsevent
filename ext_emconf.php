<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "roq_newsevent".
 *
 * Auto generated 16-01-2014 10:38
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'News event',
	'description' => 'Event extension based on the versatile news system extension and Extbase & Fluid. Supplies additional event functionality to news records.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '2.1.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tx_news_domain_model_news',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'ROQUIN B.V.',
	'author_email' => 'extensions@roquin.nl',
	'author_company' => 'ROQUIN B.V.',
	'CGLcompliance' => NULL,
	'CGLcompliance_note' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5.0-6.1.99',
			'news' => '2.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

?>