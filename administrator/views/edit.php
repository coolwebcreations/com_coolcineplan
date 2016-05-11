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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'media/com_coolcineplan/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	js('input:hidden.movie').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('moviehidden')){
			js('#jform_movie option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_movie").trigger("liszt:updated");
	js('input:hidden.auditorium').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('auditoriumhidden')){
			js('#jform_auditorium option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_auditorium").trigger("liszt:updated");
	js('input:hidden.showtype').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('showtypehidden')){
			js('#jform_showtype option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_showtype").trigger("liszt:updated");
	});

	Joomla.submitbutton = function (task) {
		if (task == 'showing.cancel') {
			Joomla.submitform(task, document.getElementById('showing-form'));
		}
		else {
			
			if (task != 'showing.cancel' && document.formvalidator.isValid(document.id('showing-form'))) {
				
				Joomla.submitform(task, document.getElementById('showing-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_coolcineplan&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="showing-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_COOLCINEPLAN_TITLE_SHOWING', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

									<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>
				<?php if(empty($this->item->modified_by)){ ?>
					<input type="hidden" name="jform[modified_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[modified_by]" value="<?php echo $this->item->modified_by; ?>" />

				<?php } ?>				<?php echo $this->form->renderField('showingtime'); ?>
				<?php echo $this->form->renderField('movie'); ?>

			<?php
				foreach((array)$this->item->movie as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="movie" name="jform[moviehidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>				<?php echo $this->form->renderField('auditorium'); ?>

			<?php
				foreach((array)$this->item->auditorium as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="auditorium" name="jform[auditoriumhidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>				<?php echo $this->form->renderField('showtype'); ?>

			<?php
				foreach((array)$this->item->showtype as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="showtype" name="jform[showtypehidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>

					<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
					<?php endif; ?>
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php if (JFactory::getUser()->authorise('core.admin','coolcineplan')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'permissions', JText::_('JGLOBAL_ACTION_PERMISSIONS_LABEL', true)); ?>
		<?php echo $this->form->getInput('rules'); ?>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
<?php endif; ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
