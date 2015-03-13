<?php

class oxidVarnishSSLFix extends oxidVarnishSSLFix_parent {
    protected function _checkSsl()
    {
        parent::_checkSsl();

        $myUtilsServer = oxRegistry::get("oxUtilsServer");
        $aServerVars = $myUtilsServer->getServerVar();

        if (isset($aServerVars['HTTP_X_FORWARDED_PROTO']) && $aServerVars['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $this->setIsSsl(true);
        }
    }
}