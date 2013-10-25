<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "roq_newsevent".
 *
 * Auto generated 13-09-2013 10:07
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'News event',
	'description' => 'Event extension based on the versatile news system extension and Extbase & Fluid. Supplies additional event functionality to news records.',
	'category' => 'plugin',
	'author' => 'ROQUIN B.V.',
	'author_email' => 'extensions@roquin.nl',
	'author_company' => 'ROQUIN B.V.',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tx_news_domain_model_news',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'version' => '2.1.1',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5.0-6.1.99',
			'news' => '2.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:47:{s:9:"Changelog";s:4:"ad35";s:20:"class.ext_update.php";s:4:"6963";s:12:"ext_icon.gif";s:4:"d6cc";s:17:"ext_localconf.php";s:4:"c834";s:14:"ext_tables.php";s:4:"f31b";s:14:"ext_tables.sql";s:4:"9803";s:21:"ExtensionBuilder.json";s:4:"c6aa";s:38:"Classes/Controller/EventController.php";s:4:"ab4b";s:30:"Classes/Domain/Model/Event.php";s:4:"cd86";s:45:"Classes/Domain/Repository/EventRepository.php";s:4:"d477";s:36:"Classes/ViewHelpers/IfViewHelper.php";s:4:"0625";s:38:"Classes/ViewHelpers/LinkViewHelper.php";s:4:"0155";s:43:"Classes/ViewHelpers/TranslateViewHelper.php";s:4:"e892";s:45:"Classes/ViewHelpers/Format/DateViewHelper.php";s:4:"f7f1";s:45:"Classes/ViewHelpers/Format/TimeViewHelper.php";s:4:"586d";s:45:"Classes/ViewHelpers/Format/TrimViewHelper.php";s:4:"b1fc";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"406d";s:27:"Configuration/TCA/Event.php";s:4:"a0fd";s:38:"Configuration/TypoScript/constants.txt";s:4:"c80e";s:34:"Configuration/TypoScript/setup.txt";s:4:"00b2";s:40:"Resources/Private/Language/locallang.xml";s:4:"eb43";s:70:"Resources/Private/Language/locallang_csh_tx_news_domain_model_news.xml";s:4:"9c21";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"5fff";s:46:"Resources/Private/Partials/Category/Items.html";s:4:"7304";s:53:"Resources/Private/Partials/Detail/MediaContainer.html";s:4:"29ed";s:47:"Resources/Private/Partials/Detail/MediaDam.html";s:4:"df99";s:48:"Resources/Private/Partials/Detail/MediaHtml.html";s:4:"14e2";s:49:"Resources/Private/Partials/Detail/MediaImage.html";s:4:"4fdd";s:49:"Resources/Private/Partials/Detail/MediaVideo.html";s:4:"2993";s:48:"Resources/Private/Partials/Detail/Opengraph.html";s:4:"3410";s:42:"Resources/Private/Partials/Event/Item.html";s:4:"ab77";s:41:"Resources/Private/Partials/Event/Item.ics";s:4:"26ac";s:41:"Resources/Private/Partials/Event/Item.xml";s:4:"a115";s:46:"Resources/Private/Partials/EventList/Item.html";s:4:"c6d5";s:51:"Resources/Private/Templates/News/EventDateMenu.html";s:4:"d404";s:49:"Resources/Private/Templates/News/EventDetail.html";s:4:"0eac";s:48:"Resources/Private/Templates/News/EventDetail.ics";s:4:"ebd0";s:47:"Resources/Private/Templates/News/EventList.html";s:4:"4a1a";s:46:"Resources/Private/Templates/News/EventList.ics";s:4:"8638";s:46:"Resources/Private/Templates/News/EventList.xml";s:4:"6808";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:52:"Resources/Public/Icons/tx_news_domain_model_news.gif";s:4:"905a";s:45:"Tests/Unit/Controller/EventControllerTest.php";s:4:"33b1";s:37:"Tests/Unit/Domain/Model/EventTest.php";s:4:"0bbc";s:14:"doc/manual.pdf";s:4:"1a9f";s:14:"doc/manual.sxw";s:4:"2c43";s:14:"doc/manual.txt";s:4:"cc3a";}',
);

?>