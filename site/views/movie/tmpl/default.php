<?php
/**
 * @version    CVS: 0.2.2
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
<!-- loading bootstrap3 files -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php if ($this->item) : ?>
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
		<h1><?php echo $this->item->movietitle; ?></h1>
	</div>
    <div class="panel-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4" align="center" >
                  <img src="<?php echo $this->item->poster; ?>" class="img-thumbnail" alt="<?php echo $this->item->movietitle; ?>"  align="center"/></br></br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trailerModal">See trailer <?php echo $this->item->trailer_id; ?></button></br>
				</div>
              <div class="col-md-8" ><img src="./media/com_coolcineplan/images/age/<?php echo $this->item->age; ?>.png" style="float: right;" />
                <p>       
                <i><?php echo $this->item->moviecomment; ?></i></p><p><b><?php echo $this->item->genre; ?> - <?php echo $this->item->length; ?> Min.</b></br><?php echo $this->item->country; ?> - <?php echo $this->item->year; ?></p><p><?php echo $this->item->moviecontent; ?></p></div>				
				</div>
			</div>
		</div>
		<div class="panel-footer">
          	<b><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_DIRECTOR'); ?>:</b> <?php echo $this->item->director; ?></br>
			<b><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_ACTORS'); ?>:</b> <?php echo $this->item->actors; ?></br>
			<b><?php echo JText::_('COM_COOLCINEPLAN_FORM_LBL_MOVIE_RENTALCOMPANY'); ?>:</b> <?php echo $this->item->rentalcompany; ?></br>
		</div>
<div>
    </div>
  </div>




<!-- Vorstellungen des Films -->
  <div class="panel panel-default">
    <div class="panel-heading">
		<h2>Showings</h2>
	</div>
    <div class="panel-body">
		<div class="container-fluid">
		<div class="row">
							<div class="col-md-3" ><h4>Showtime</h4></div>
							<div class="col-md-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
          					<div class="col-md-3" ><button type="button" class="btn btn-link"><b>Showtype</b></button></div>
							<div class="col-md-4"><button type="button" class="btn btn-success" align="right">Reservation <span class="badge">free: 22</span></button></div>
						</div>
		<div class="row">
							<div class="col-md-3" ><h4>Showtime</h4></div>
							<div class="col-md-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
          					<div class="col-md-3" ><button type="button" class="btn btn-link"><b>Showtype</b></button></div>
							<div class="col-md-4"><button type="button" class="btn btn-danger" align="right">Reservation <span class="badge">sold out</span></button></div>
						</div>
		<div class="row">
							<div class="col-md-3" ><h4>Showtime</h4></div>
							<div class="col-md-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
          					<div class="col-md-3" ><button type="button" class="btn btn-link"><b>Showtype</b></button></div>
							<div class="col-md-4"><button type="button" class="btn btn-success" align="right">Reservation <span class="badge">free: 22</span></button></div>
						</div>
		<div class="row">
							<div class="col-md-3" ><h4>Showtime</h4></div>
							<div class="col-md-2" ><button type="button" class="btn btn-link"><b>Auditorium</b></button></div>
          					<div class="col-md-3" ><button type="button" class="btn btn-link"><b>Showtype</b></button></div>
							<div class="col-md-4"><button type="button" class="btn btn-warning" align="right">Reservation <span class="badge">free: 4</span></button></div>
						</div>
		</div>
	</div>
	</div>
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
