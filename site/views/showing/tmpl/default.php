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
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_MODIFIED_BY'); ?></th>
			<td><?php echo $this->item->modified_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_SHOWINGTIME'); ?></th>
			<td><?php echo $this->item->showingtime; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_MOVIE'); ?></th>
			<td><?php echo $this->item->movie; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_AUDITORIUM'); ?></th>
			<td><?php echo $this->item->auditorium; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_SHOWING_SHOWTYPE'); ?></th>
			<td><?php echo $this->item->showtype; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_COOLCINEPLAN_ITEM_NOT_LOADED');
endif;
