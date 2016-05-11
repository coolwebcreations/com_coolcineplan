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
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_MODIFIED_BY'); ?></th>
			<td><?php echo $this->item->modified_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_AUDITORIUM_NAME'); ?></th>
			<td><?php echo $this->item->auditorium_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_SEATS'); ?></th>
			<td><?php echo $this->item->seats; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_AUDITORIUM_AUDITORIUM_IMAGE'); ?></th>
			<td><?php echo $this->item->auditorium_image; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_COOLCINEPLAN_ITEM_NOT_LOADED');
endif;
