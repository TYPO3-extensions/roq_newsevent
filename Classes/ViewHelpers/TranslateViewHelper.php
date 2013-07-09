<?php

/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         J. de Groot <jochem@roquin.nl>
 * @file:           EventController.php
 * @description:    Translate view helper, extending the fluid translate viewhelper
 */

if($GLOBALS['TYPO3_VERSION'] >= 6000000) {

    class Tx_RoqNewsevent_ViewHelpers_TranslateViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper {

        /**
         * Translate a given key or use the tag body as default.
         *
         * @return string The translated key or tag body if key doesn't exist
         */
        public function render() {
            $value = parent::render();

            if(!isset($value)) {
                $value = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($this->arguments['key'], 'roq_newsevent', $this->arguments);
            }

            return $value;
        }
    }

} else {
    // Class for TYPO3 version 4.5.x for backwards compatibility (deprecated, and will be removed when 6.2 becomes the new LTS)
    class Tx_RoqNewsevent_ViewHelpers_TranslateViewHelper extends Tx_Fluid_ViewHelpers_TranslateViewHelper {

        /**
         * Translate a given key or use the tag body as default.
         *
         * @param string $key The locallang key
         * @param string $default if the given locallang key could not be found, this value is used. . If this argument is not set, child nodes will be used to render the default
         * @param boolean $htmlEscape TRUE if the result should be htmlescaped. This won't have an effect for the default value
         * @param array $arguments Arguments to be replaced in the resulting string
         * @deprecated
         * @return string The translated key or tag body if key doesn't exist
         */
        public function render($key, $default = NULL, $htmlEscape = TRUE, array $arguments = NULL) {
            $value = parent::render($key, $default, $htmlEscape, $arguments);

            if(!isset($value)) {
                $value = Tx_Extbase_Utility_Localization::translate($key, 'roq_newsevent', $arguments);
            }

            return $value;
        }
    }

}

?>