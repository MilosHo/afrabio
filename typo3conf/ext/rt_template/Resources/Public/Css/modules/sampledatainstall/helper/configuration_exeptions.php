<?php
/**
* 2002-2015 TemplateMonster
*
* Sampledatainstall
*
* NOTICE OF LICENSE
*
* This source file is subject to the General Public License (GPL 2.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/GPL-2.0
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade the module to newer
* versions in the future.
*
*  @author    TemplateMonster (Alexander Grosul)
*  @copyright 2002-2015 TemplateMonster
*  @license   http://opensource.org/licenses/GPL-2.0 General Public License (GPL 2.0)
*/

$this->configuration_exeptions = array(
	'PS_VERSION_DB',
	'PS_INSTALL_VERSION',
	'PS_PASSWD_TIME_BACK',
	'PS_PASSWD_TIME_FRONT',
	'PS_SEARCH_BLACKLIST',
	'PS_SEARCH_WEIGHT_PNAME',
	'PS_SEARCH_WEIGHT_REF',
	'PS_SEARCH_WEIGHT_SHORTDESC',
	'PS_SEARCH_WEIGHT_DESC',
	'PS_SEARCH_WEIGHT_CNAME',
	'PS_SEARCH_WEIGHT_MNAME',
	'PS_SEARCH_WEIGHT_TAG',
	'PS_SEARCH_WEIGHT_ATTRIBUTE',
	'PS_SEARCH_WEIGHT_FEATURE',
	'PS_THEME_V11',
	'PRESTASTORE_LIVE',
	'PS_TIN_ACTIVE',
	'PS_SHOW_ALL_MODULES',
	'PS_BACKUP_ALL',
	'PS_1_3_UPDATE_DATE',
	'PS_1_3_2_UPDATE_DATE',
	'PS_STATSDATA_CUSTOMER_PAGESVIEWS',
	'PS_STATSDATA_PAGESVIEWS',
	'PS_STATSDATA_PLUGINS',
	'PS_GEOLOCATION_ENABLED',
	'PS_GEOLOCATION_BEHAVIOR',
	'PS_COOKIE_CHECKIP',
	'PS_STORES_CENTER_LAT',
	'PS_STORES_CENTER_LONG',
	'PS_BACKUP_DROP_TABLE',
	'PS_OS_CHEQUE',
	'PS_OS_PAYMENT',
	'PS_OS_PREPARATION',
	'PS_OS_SHIPPING',
	'PS_OS_DELIVERED',
	'PS_OS_CANCELED',
	'PS_OS_REFUND',
	'PS_OS_ERROR',
	'PS_OS_OUTOFSTOCK',
	'PS_OS_BANKWIRE',
	'PS_OS_PAYPAL',
	'PS_OS_WS_PAYMENT',
	'PS_OS_OUTOFSTOCK_PAID',
	'PS_OS_OUTOFSTOCK_UNPAID',
	'PS_COOKIE_LIFETIME_FO',
	'PS_COOKIE_LIFETIME_BO',
	'PS_RESTRICT_DELIVERED_COUNTRIES',
	'PS_SHOW_NEW_ORDERS',
	'PS_SHOW_NEW_CUSTOMERS',
	'PS_SHOW_NEW_MESSAGES',
	'PS_FEATURE_FEATURE_ACTIVE',
	'PS_COMBINATION_FEATURE_ACTIVE',
	'PS_SPECIFIC_PRICE_FEATURE_ACTIVE',
	'PS_SCENE_FEATURE_ACTIVE',
	'PS_VIRTUAL_PROD_FEATURE_ACTIVE',
	'PS_CUSTOMIZATION_FEATURE_ACTIVE',
	'PS_CART_RULE_FEATURE_ACTIVE',
	'PS_PACK_FEATURE_ACTIVE',
	'PS_ALIAS_FEATURE_ACTIVE',
	'PS_TAX_ADDRESS_TYPE',
	'PS_STOCK_MVT_INC_REASON_DEFAULT',
	'PS_STOCK_MVT_DEC_REASON_DEFAULT',
	'PS_ADMINREFRESH_NOTIFICATION',
	'PS_STOCK_MVT_TRANSFER_TO',
	'PS_STOCK_MVT_TRANSFER_FROM',
	'PS_CARRIER_DEFAULT_ORDER',
	'PS_STOCK_MVT_SUPPLY_ORDER',
	'PS_STOCK_CUSTOMER_ORDER_REASON',
	'PS_SMARTY_CONSOLE',
	'MB_PAY_TO_EMAIL',
	'MB_SECRET_WORD',
	'MB_HIDE_LOGIN',
	'MB_ID_LOGO',
	'MB_ID_LOGO_WALLET',
	'MB_PARAMETERS',
	'MB_PARAMETERS_2',
	'MB_DISPLAY_MODE',
	'MB_CANCEL_URL',
	'MB_LOCAL_METHODS',
	'MB_INTER_METHODS',
	'PS_TOKEN_ENABLE',
	'PS_STATS_RENDER',
	'PS_STATS_OLD_CONNECT_AUTO_CLEAN',
	'PS_STATS_GRID_RENDER',
	'CHECKUP_DESCRIPTIONS_LT',
	'CHECKUP_DESCRIPTIONS_GT',
	'CHECKUP_IMAGES_LT',
	'CHECKUP_IMAGES_GT',
	'CHECKUP_SALES_LT',
	'CHECKUP_SALES_GT',
	'CHECKUP_STOCK_LT',
	'CHECKUP_STOCK_GT',
	'UPGRADER_BACKUPDB_FILENAME',
	'UPGRADER_BACKUPFILES_FILENAME',
	'PS_BASE_DISTANCE_UNIT',
	'PS_SHOP_DOMAIN',
	'PS_SHOP_DOMAIN_SSL',
	'PS_MAIL_METHOD',
	'PS_SHOP_ACTIVITY',
	'PS_CONFIGURATION_AGREMENT',
	'PS_MAIL_SERVER',
	'PS_MAIL_USER',
	'PS_MAIL_PASSWD',
	'PS_MAIL_SMTP_ENCRYPTION',
	'PS_MAIL_SMTP_PORT',
	'PS_MAIL_COLOR',
	'NW_SALT',
	'SEK_MIN_OCCURENCES',
	'SEK_FILTER_KW',
	'PS_CUSTOMER_CREATION_EMAIL',
	'PS_SMARTY_CONSOLE_KEY',
	'PS_DASHBOARD_USE_PUSH',
	'CONF_AVERAGE_PRODUCT_MARGIN',
	'PS_DASHBOARD_SIMULATION',
	'PS_USE_HTMLPURIFIER',
	'PS_SMARTY_CACHING_TYPE',
	'PS_SMARTY_CLEAR_CACHE',
	'PS_DETECT_LANG',
	'PS_DETECT_COUNTRY',
	'PS_LOG_EMAILS',
	'CONF_BANKWIRE_FIXED',
	'CONF_BANKWIRE_VAR',
	'CONF_BANKWIRE_FIXED_FOREIGN',
	'CONF_BANKWIRE_VAR_FOREIGN',
	'CONF_CHEQUE_FIXED',
	'CONF_CHEQUE_VAR',
	'CONF_CHEQUE_FIXED_FOREIGN',
	'CONF_CHEQUE_VAR_FOREIGN',
	'DASHACTIVITY_CART_ACTIVE',
	'DASHACTIVITY_CART_ABANDONED_MIN',
	'DASHACTIVITY_CART_ABANDONED_MAX',
	'DASHACTIVITY_VISITOR_ONLINE',
	'PS_DASHGOALS_CURRENT_YEAR',
	'DASHGOALS_TRAFFIC_01_2015',
	'DASHGOALS_CONVERSION_01_2015',
	'DASHGOALS_AVG_CART_VALUE_01_2015',
	'DASHGOALS_TRAFFIC_02_2015',
	'DASHGOALS_CONVERSION_02_2015',
	'DASHGOALS_AVG_CART_VALUE_02_2015',
	'DASHGOALS_TRAFFIC_03_2015',
	'DASHGOALS_CONVERSION_03_2015',
	'DASHGOALS_AVG_CART_VALUE_03_2015',
	'DASHGOALS_TRAFFIC_04_2015',
	'DASHGOALS_CONVERSION_04_2015',
	'DASHGOALS_AVG_CART_VALUE_04_2015',
	'DASHGOALS_TRAFFIC_05_2015',
	'DASHGOALS_CONVERSION_05_2015',
	'DASHGOALS_AVG_CART_VALUE_05_2015',
	'DASHGOALS_TRAFFIC_06_2015',
	'DASHGOALS_CONVERSION_06_2015',
	'DASHGOALS_AVG_CART_VALUE_06_2015',
	'DASHGOALS_TRAFFIC_07_2015',
	'DASHGOALS_CONVERSION_07_2015',
	'DASHGOALS_AVG_CART_VALUE_07_2015',
	'DASHGOALS_TRAFFIC_08_2015',
	'DASHGOALS_CONVERSION_08_2015',
	'DASHGOALS_AVG_CART_VALUE_08_2015',
	'DASHGOALS_TRAFFIC_09_2015',
	'DASHGOALS_CONVERSION_09_2015',
	'DASHGOALS_AVG_CART_VALUE_09_2015',
	'DASHGOALS_TRAFFIC_10_2015',
	'DASHGOALS_CONVERSION_10_2015',
	'DASHGOALS_AVG_CART_VALUE_10_2015',
	'DASHGOALS_TRAFFIC_11_2015',
	'DASHGOALS_CONVERSION_11_2015',
	'DASHGOALS_AVG_CART_VALUE_11_2015',
	'DASHGOALS_TRAFFIC_12_2015',
	'DASHGOALS_CONVERSION_12_2015',
	'DASHGOALS_AVG_CART_VALUE_12_2015',
	'DASHPRODUCT_NBR_SHOW_LAST_ORDER',
	'DASHPRODUCT_NBR_SHOW_BEST_SELLER',
	'DASHPRODUCT_NBR_SHOW_MOST_VIEWED',
	'DASHPRODUCT_NBR_SHOW_TOP_SEARCH',
	'GF_INSTALL_CALC',
	'GF_CURRENT_LEVEL',
	'GF_CURRENT_LEVEL_PERCENT',
	'GF_NOTIFICATION',
	'CRONJOBS_ADMIN_DIR',
	'CRONJOBS_MODE',
	'CRONJOBS_MODULE_VERSION',
	'CRONJOBS_WEBSERVICE_ID',
	'CRONJOBS_EXECUTION_TOKEN',
	'CONF_CRONJOBS_FIXED',
	'CONF_CRONJOBS_VAR',
	'CONF_CRONJOBS_FIXED_FOREIGN',
	'CONF_CRONJOBS_VAR_FOREIGN',
	'PS_ONBOARDING_CURRENT_STEP',
	'PS_ONBOARDING_LAST_VALIDATE_STEP',
	'PS_ONBOARDING_STEP_1_COMPLETED',
	'PS_ONBOARDING_STEP_2_COMPLETED',
	'PS_ONBOARDING_STEP_3_COMPLETED',
	'PS_ONBOARDING_STEP_4_COMPLETED',
	'GF_NOT_VIEWED_BADGE',
	'PS_CCCJS_VERSION',
	'PS_CCCCSS_VERSION',
	'PS_HTACCESS_DISABLE_MULTIVIEWS',
	'PS_HTACCESS_DISABLE_MODSEC',
	'PS_ROUTE_product_rule',
	'PS_ROUTE_category_rule',
	'PS_ROUTE_layered_rule',
	'PS_ROUTE_supplier_rule',
	'PS_ROUTE_manufacturer_rule',
	'PS_ROUTE_cms_rule',
	'PS_ROUTE_cms_category_rule',
	'PS_ROUTE_module',
	'PS_MULTISHOP_FEATURE_ACTIVE',
	'PS_REWRITING_SETTINGS',
	'PS_DASHBOARD_SIMULATION',
);