<?php

/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         Jochem de Groot <jochem@roquin.nl>
 * @file:           EventLinkViewHelper.php
 * @description:    ViewHelper to render proper links for event detail view
 */

class Tx_RoqNewsevent_ViewHelpers_LinkViewHelper extends Tx_News_ViewHelpers_LinkViewHelper {

    /**
     * Render link to news item or internal/external pages
     *
     * @param Tx_RoqNewsevent_Domain_Model_Event $newsItem current news object
     * @param array $settings
     * @param boolean $uriOnly return only the url without the a-tag
     * @param array $configuration optional typolink configuration
     *
     * @return string $link
     */
    public function render(Tx_RoqNewsevent_Domain_Model_Event $newsItem, array $settings = array(), $uriOnly = FALSE, $configuration = array()) {
        // Override the news detailPid with event backPid
        if($settings['event']['detailPid']) {
            $settings['detailPid'] = $settings['event']['detailPid'];
        }

        // Override the news backPid with event backPid
        if($settings['event']['backPid']) {
            $settings['backPid'] = $settings['event']['backPid'];
        }

        $link = parent::render($newsItem, $settings, $uriOnly, $configuration);

        return $link;
    }

}