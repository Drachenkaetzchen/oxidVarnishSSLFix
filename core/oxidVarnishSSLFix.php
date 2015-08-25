<?php

/**
 * Extension of class oxConfig.
 */
class oxidVarnishSSLFix extends oxidVarnishSSLFix_parent {

	/**
	 * Extend SSL check to respect header HTTP_X_FORWARDED_PROTO sent by proxy server in front of Oxid.
	 */
	protected function _checkSsl() {
		parent::_checkSsl();

		$myUtilsServer = oxRegistry::get('oxUtilsServer');
		$aServerVars = $myUtilsServer->getServerVar();

		if (isset($aServerVars['HTTP_X_FORWARDED_PROTO']) && $aServerVars['HTTP_X_FORWARDED_PROTO'] == 'https') {
			$this->setIsSsl(TRUE);
		}
	}

	/**
	 * Returns widget non-SSL URL including widget.php and sid.
	 *
	 * @param int $iLang Current language
	 * @param bool $blAdmin Called in admin?
	 * @return string
	 */
	public function getWidgetUrl($iLang = NULL, $blAdmin = NULL) {
		$sUrl = $this->getShopUrl($iLang, $blAdmin);

		return oxRegistry::get('oxUtilsUrl')->processUrl($sUrl . 'widget.php', FALSE);
	}

}
