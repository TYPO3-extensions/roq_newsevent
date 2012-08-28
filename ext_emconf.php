<?php

########################################################################
# Extension Manager/Repository config file for ext "roq_newsevent".
#
# Auto generated 16-08-2012 16:49
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'News event',
	'description' => 'Event extension based on the versatile news system extension and Extbase & Fluid. Supplies additional event functionality to news records.',
	'category' => 'plugin',
	'author' => 'Jochem de Groot',
	'author_email' => 'jochem@roquin.nl',
	'author_company' => 'ROQUIN B.V.',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '2.0.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
			'news' => '1.4',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:55:{s:9:"Changelog";s:4:"cf98";s:21:"ExtensionBuilder.json";s:4:"9fe9";s:12:"ext_icon.gif";s:4:"1c9b";s:17:"ext_localconf.php";s:4:"5fea";s:14:"ext_tables.php";s:4:"1ff1";s:14:"ext_tables.sql";s:4:"f920";s:38:"Classes/Controller/EventController.php";s:4:"810f";s:30:"Classes/Domain/Model/Event.php";s:4:"c888";s:45:"Classes/Domain/Repository/EventRepository.php";s:4:"1535";s:36:"Classes/ViewHelpers/IfViewHelper.php";s:4:"0625";s:38:"Classes/ViewHelpers/LinkViewHelper.php";s:4:"39e8";s:43:"Classes/ViewHelpers/TranslateViewHelper.php";s:4:"0a4e";s:45:"Classes/ViewHelpers/Format/TimeViewHelper.php";s:4:"586d";s:45:"Classes/ViewHelpers/Format/TrimViewHelper.php";s:4:"b1fc";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"406d";s:27:"Configuration/TCA/Event.php";s:4:"a0fd";s:38:"Configuration/TypoScript/constants.txt";s:4:"c80e";s:34:"Configuration/TypoScript/setup.txt";s:4:"2bf2";s:40:"Resources/Private/Language/locallang.xml";s:4:"9ac8";s:70:"Resources/Private/Language/locallang_csh_tx_news_domain_model_news.xml";s:4:"cd7c";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"cec7";s:37:"Resources/Private/Layouts/Detail.html";s:4:"759f";s:38:"Resources/Private/Layouts/General.html";s:4:"4776";s:46:"Resources/Private/Layouts/Backend/Default.html";s:4:"fe83";s:54:"Resources/Private/Partials/Administration/Buttons.html";s:4:"1a84";s:55:"Resources/Private/Partials/Administration/ListItem.html";s:4:"2eaf";s:46:"Resources/Private/Partials/Category/Items.html";s:4:"bee7";s:53:"Resources/Private/Partials/Detail/MediaContainer.html";s:4:"29ed";s:47:"Resources/Private/Partials/Detail/MediaDam.html";s:4:"df99";s:48:"Resources/Private/Partials/Detail/MediaHtml.html";s:4:"14e2";s:49:"Resources/Private/Partials/Detail/MediaImage.html";s:4:"4fdd";s:49:"Resources/Private/Partials/Detail/MediaVideo.html";s:4:"2993";s:48:"Resources/Private/Partials/Detail/Opengraph.html";s:4:"3410";s:42:"Resources/Private/Partials/Event/Item.html";s:4:"7995";s:41:"Resources/Private/Partials/Event/Item.ics";s:4:"8e8e";s:41:"Resources/Private/Partials/Event/Item.xml";s:4:"a115";s:46:"Resources/Private/Partials/EventList/Item.html";s:4:"c6d5";s:41:"Resources/Private/Partials/List/Item.html";s:4:"03b5";s:46:"Resources/Private/Templates/News/DateMenu.html";s:4:"d916";s:44:"Resources/Private/Templates/News/Detail.html";s:4:"1b07";s:51:"Resources/Private/Templates/News/EventDateMenu.html";s:4:"d404";s:49:"Resources/Private/Templates/News/EventDetail.html";s:4:"0eac";s:48:"Resources/Private/Templates/News/EventDetail.ics";s:4:"ebd0";s:47:"Resources/Private/Templates/News/EventList.html";s:4:"4a1a";s:46:"Resources/Private/Templates/News/EventList.ics";s:4:"8638";s:46:"Resources/Private/Templates/News/EventList.xml";s:4:"f91c";s:42:"Resources/Private/Templates/News/List.html";s:4:"69ec";s:41:"Resources/Private/Templates/News/List.xml";s:4:"ebf6";s:48:"Resources/Private/Templates/News/SearchForm.html";s:4:"4cc4";s:50:"Resources/Private/Templates/News/SearchResult.html";s:4:"07cf";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:52:"Resources/Public/Icons/tx_news_domain_model_news.gif";s:4:"905a";s:45:"Tests/Unit/Controller/EventControllerTest.php";s:4:"33b1";s:37:"Tests/Unit/Domain/Model/EventTest.php";s:4:"a8e5";s:14:"doc/manual.sxw";s:4:"07dd";}',
);

?>