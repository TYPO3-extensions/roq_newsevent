<?php

/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         J. de Groot <jochem@roquin.nl>
 * @file:           EventController.php
 * @description:    Translate view helper, extending the fluid translate viewhelper
 */

class Tx_RoqNewsevent_ViewHelpers_TranslateViewHelper extends Tx_Fluid_ViewHelpers_TranslateViewHelper {

	/**
	 * Translate a given key or use the tag body as default.
	 *
	 * @param string $key The locallang key
	 * @param string $default if the given locallang key could not be found, this value is used. . If this argument is not set, child nodes will be used to render the default
	 * @param boolean $htmlEscape TRUE if the result should be htmlescaped. This won't have an effect for the default value
	 * @param array $arguments Arguments to be replaced in the resulting string
	 * @return string The translated key or tag body if key doesn't exist
	 */
	public function render($key, $default = NULL, $htmlEscape = TRUE, array $arguments = NULL) {
        $value = parent::render($key, $default, $htmlEscape, $arguments);

        if(!isset($value)) {
            //$value = Tx_Extbase_Utility_Localization::translate($key, $GLOBALS['_EXTKEY'], $arguments);
            $value = Tx_Extbase_Utility_Localization::translate($key, 'roq_newsevent', $arguments);
        }

		return $value;
	}
}

?>
