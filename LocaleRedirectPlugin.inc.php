<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class LocaleRedirectPlugin extends GenericPlugin
{
    function register($category, $path)
    {
        if (parent::register($category, $path)) {
            if ($this->getEnabled()) {
                // handle locales redirect
                HookRegistry::register('LoadHandler', array($this, 'handleLocaleRequest'));

                // add info about locale urls for google inside head
                HookRegistry::register('ArticleHandler::view',array(&$this, 'articleView'));
            }
            return true;
        }
        return false;
    }

    /**
     * Get the plugin display name.
     * @return string
     */
    function getDisplayName()
    {
        return __('plugins.generic.localeRedirect.displayName');
    }

    /**
     * Get the plugin description.
     * @return string
     */
    function getDescription()
    {
        return __('plugins.generic.localeRedirect.description');
    }


    function handleLocaleRequest($hookName, $args)
    {
        $page = $args[0];
        $op = $args[1];
        $sourceFile = $args[2];

        $request = $this->getRequest();
        $templateMgr = TemplateManager::getManager($request);
        if ($page == "login") return false;

        //AppLocale::setLocale("uk_UA");


        if ($_GET["locale"] == "uk_UA") {
            AppLocale::setLocale("uk_UA");
            print_r($request->getSession()->getSessionData());
        } elseif ($_GET["locale"] == "en_US") {
            AppLocale::setLocale("en_US");
            print_r($request->getSession()->getSessionData());
        }

    }

    function articleView ($hookName, $args) {
        $request = $args[0];
        $templateMgr = TemplateManager::getManager($request);

        //$templateMgr->addHeader();
    }
}