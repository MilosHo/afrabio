{*
* 2002-2016 TemplateMonster
*
* TM Mosaic Products
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
* @author    TemplateMonster
* @copyright 2002-2016 TemplateMonster
* @license   http://opensource.org/licenses/GPL-2.0 General Public License (GPL 2.0)
*}

{assign var='html' value=$data}
<div class="tmmp-frontend-html tmmp-frontend-html-{$html->id|escape:'html':'UTF-8'} {$html->specific_class|escape:'html':'UTF-8'}">
  <h3>{$html->title|escape:'html':'UTF-8'}</h3>
  {$html->content|escape:'quotes':'UTF-8'}
</div>
