<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

if(!isset($GLOBALS['TYPO3_VERSION'])) {
    if(class_exists('t3lib_utility_VersionNumber')) { // TYPO3 Version 4.5.x
        $GLOBALS['TYPO3_VERSION'] = t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version);
    } elseif(class_exists(\TYPO3\CMS\Core\Utility\VersionNumberUtility)) { // TYPO3 Version 6.1.x
        $GLOBALS['TYPO3_VERSION'] = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version);
    } else { // TYPO3 Version 4.5.x
        $GLOBALS['TYPO3_VERSION'] = t3lib_div::int_from_ver(TYPO3_version);
    }
}

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['--div--'] = 'Events';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->eventList;News->eventDetail'] = 'List view';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->eventDetail'] = 'Detail view';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->eventDateMenu'] = 'Date menu';

?>