<?php

/**
 * @defgroup plugins_generic_localeRedirect JATS
 */
 
/**
 * @file plugins/generic/localeRedirect/index.php
 *
 * Copyright (c) 2017 Vitaliy Bezsheiko, MD
 * Distributed under the GNU GPL v3. 
 *
 * @ingroup plugins_generic_localeRedirect
 * @brief LocaleRedirect handles request from non-primary locales
 *
 */

require_once('LocaleRedirectPlugin.inc.php');

return new LocaleRedirectPlugin();

?>
