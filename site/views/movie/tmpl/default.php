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

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_coolcineplan.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_coolcineplan' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

	<div class="item_fields">
		<-- New Template -->
		<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
		<h1>Movietitle</h1>
	</div>
    <div class="panel-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-3 col-sm-3" >
					<img src="http://www.kino-gross-gerau.de/images/film/2016/05/Ein_Hologramm_fuer_den_Koenig.jpg" class="img-thumbnail" alt="Filtitel"  align="center"/>
				</div>
			<div class="col-xs-6 col-sm-6" >Moviedescription</br>bkbcbblaacb</br>nconscenseon</div>
				<!-- Add clearfix for only the required viewport -->
				<div class="clearfix visible-xs"></div>
				<div class="col-xs-3 col-sm-3" >director / actors </div>
				</div>
			<div class="row">
				<div class="col-xs-9 col-sm-9" >
					provider / age / length / country / year
				</div>
				<!-- Add clearfix for only the required viewport -->
				<div class="clearfix visible-xs"></div>
				<div class="col-xs-3 col-sm-3" >
					<button type="button" class="btn btn-primary">See trailer</button>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vorstellungen des Films -->
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
		<h2>Showings</h2>
	</div>
    <div class="panel-body">
		<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12" >
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-2" ><h4>Showtime</h4></div>
							<div class="col-sm-2" ><h4>Movietitle</h4></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-success" align="right">Reservation <span class="badge">free: 22</span></button></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-2" ><h4>Showtime</h4></div>
							<div class="col-sm-2" ><h4>Movietitle</h4></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-danger" align="right">Reservation <span class="badge">sold out</span></button></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-2" ><h4>Showtime</h4></div>
							<div class="col-sm-2" ><h4>Movietitle</h4></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
							<div class="col-sm-2" ><button type="button" class="btn btn-warning" align="right">Reservation <span class="badge">free: 4</span></button></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
		
		
		<--- Table --->
		<table class="table">
			<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_MOVIETITLE'); ?></th>
			<td><?php echo $this->item->movietitle; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_MOVIECONTENT'); ?></th>
			<td><?php echo $this->item->moviecontent; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_MOVIECOMMENT'); ?></th>
			<td><?php echo $this->item->moviecomment; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_DIRECTOR'); ?></th>
			<td><?php echo $this->item->director; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_ACTORS'); ?></th>
			<td><?php echo $this->item->actors; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_COUNTRY'); ?></th>
			<td><?php echo $this->item->country; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_YEAR'); ?></th>
			<td><?php echo $this->item->year; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_RENTALCOMPANY'); ?></th>
			<td><?php echo $this->item->rentalcompany; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_POSTER'); ?></th>
			<td><?php echo $this->item->poster; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_LENGTH'); ?></th>
			<td><?php echo $this->item->length; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_GENRE'); ?></th>
			<td><?php echo $this->item->genre; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_AGE'); ?></th>
			<td><?php echo $this->item->age; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_TRAILER_ID'); ?></th>
			<td><?php echo $this->item->trailer_id; ?></td>
</tr>

		</table>
	</div>
	<?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_coolcineplan&task=movie.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_COOLCINEPLAN_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_coolcineplan.movie.'.$this->item->id)):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_coolcineplan&task=movie.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_COOLCINEPLAN_DELETE_ITEM"); ?></a>
								<?php endif; ?>
	<?php
else:
	echo JText::_('COM_COOLCINEPLAN_ITEM_NOT_LOADED');
endif;
