<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "roq_newsevent".
 *
 * Auto generated 23-02-2016 09:32
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News event',
  'description' => 'Event extension based on the versatile news system. Supplies additional event functionality to news records.',
  'category' => 'plugin',
  'version' => '3.2.2dev',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearcacheonload' => true,
  'author' => 'ROQUIN B.V.',
  'author_email' => 'extensions@roquin.nl',
  'author_company' => 'ROQUIN B.V.',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.0.0-7.6.99',
      'news' => '4.0.0-4.1.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

