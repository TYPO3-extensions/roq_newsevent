<?php
/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         J. de Groot <jochem@roquin.nl>
 * @file:           TrimViewHelper.php
 * @created:        26-7-12 15:58
 * @description:    ViewHelper to trim content with PHP trim function
 */

class Tx_RoqNewsevent_ViewHelpers_Format_TrimViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
     * @param boolean $replaceDoubleSpaces Flag which defines if double spaces must be replaced with single spaces
     * @param boolean $trimTabs Flag which defines if (indentation) tabs must be trimmed
	 * @return string The trimmed string
	 */
	public function render($replaceDoubleSpaces = TRUE, $trimTabs = TRUE) {
		$content = $this->renderChildren();

        if($replaceDoubleSpaces) {
            $content = preg_replace('/\s\s+/', ' ', $content);
        }

        if($trimTabs) {
            $content = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*|[\t]*[\r\n\']+/", "\n", $content);
        } else {
            $content = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n\']+/", "\n", $content);
        }

        return $content;
	}
}

?>