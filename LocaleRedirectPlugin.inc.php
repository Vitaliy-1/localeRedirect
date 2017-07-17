<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class LocaleRedirectPlugin extends GenericPlugin
{
    function register($category, $path)
    {
        if (parent::register($category, $path)) {
            if ($this->getEnabled()) {
                HookRegistry::register('LoadHandler', array($this, 'handleLocaleRequest'));
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

    /**
     * @copydoc Plugin::getActions()
     */

    function handleLocaleRequest($hookName, $args)
    {
        $request = $this->getRequest();
        $templateMgr = TemplateManager::getManager($request);

        $page = $args[0];
        $op = $args[1];
        $sourceFile = $args[2];

    }
}