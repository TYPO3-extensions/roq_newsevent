<?php
/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         Jochem de Groot <jochem@roquin.nl>
 * @file:           class.ext_update.php
 * @created:        26-9-12 16:28
 * @description:    Update class for updating news event records from version 2.0.X to 2.1.X
 */

class ext_update {

    /**
      * Performs the Updates
      *
      * @return string: returns result of the performed update in html
      */
    function main() {
        $affectedRows   = 0;
        $returnValue    = '';
        $result         = false;

        // update news type and news event tx_roqnewsevent_is_event attribute
        $result = $GLOBALS['TYPO3_DB']->exec_UPDATEquery(
            "tx_news_domain_model_news",
            "type='Tx_RoqNewsevent_Event'",
            array(
                'type' => 0,
                'tx_roqnewsevent_is_event' => 1,
            )
        );

        if($result) {
            $affectedRows   = $GLOBALS['TYPO3_DB']->sql_affected_rows();
            $returnValue    .= '<div style="color:green">The update has been performed successfully: ' . $affectedRows . " row(s) affected.</div>";
        } else {
            $returnValue    .=
                '<div style="color:#FF0000">An error occurred while preforming updates. Error: '.
                    $GLOBALS['TYPO3_DB']->sql_error() .' (' . $GLOBALS['TYPO3_DB']->sql_errno() . ').</div>';
        }

        return $returnValue;
    }

    /**
     * Check if the update is necessary
     *
     * @return boolean: returns true if update should be performed
     */
    function access() {
        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery("type","tx_news_domain_model_news","type='Tx_RoqNewsevent_Event'");

        // check if news type must be updated
        if (($result) && ($GLOBALS['TYPO3_DB']->sql_num_rows($result) > 0)) {
            return true;
        }

        return false;
    }
}

?>