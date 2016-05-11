<?php
/**
 * @version    CVS: 0.1.16
 * @package    Com_Coolcineplan
 * @author     Mike Brandner <mike@coolwebcreations.de>
 * @copyright  Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license    GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;


?>
<?php if ($this->item) : ?>

	<div class="item_fields">
		<table class="table">
			<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_MODIFIED_BY'); ?></th>
			<td><?php echo $this->item->modified_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_SHOWTYPE'); ?></th>
			<td><?php echo $this->item->showtype; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_DESCRIPTION'); ?></th>
			<td><?php echo $this->item->description; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWTYPE_IMAGE'); ?></th>
			<td><?php echo $this->item->image; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_COOLCINEPLAN_ITEM_NOT_LOADED');
endif;
