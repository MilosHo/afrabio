/*
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
*/

$(document).ready(function(e) {
  tmmp_row_6 = '';
  tmmp_row_6 += '<div class="tmmp_popup_item">';
    tmmp_row_6 += '<div class="text-right btn-remove">';
      tmmp_row_6 += '<button type="button" class="btn btn-sm btn-danger button-remove-row">'+remove_row_btn_text+'</button>';
    tmmp_row_6 += '</div>';
    tmmp_row_6 += '<ul id="tmmp_row_6" class="clearfix tmmp_row_6 items">';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="1" /><input type="hidden" name="element_data" value="" /></div></li>';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="2" /><input type="hidden" name="element_data" value="" /></div></li>';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="3" /><input type="hidden" name="element_data" value="" /></div></li>';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="4" /><input type="hidden" name="element_data" value="" /></div></li>';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="5" /><input type="hidden" name="element_data" value="" /></div></li>';
      tmmp_row_6 += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-2 item"><div class="content"><input type="hidden" name="element_num" value="6" /><input type="hidden" name="element_data" value="" /></div></li>';
    tmmp_row_6 += '</ul>';
  tmmp_row_6 += '</div>';
  tmmp_layouts.push({name : 'tmmp_row_6', value : tmmp_row_6});
});