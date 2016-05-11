<?php
/**
 * @version    CVS: 0.1.16
 * @package    Com_Cineplan
 * @author     Mike Brandner <mike@coolwebcreations.de>
 * @copyright  Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license    GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user       = JFactory::getUser();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_cineplan');
$canEdit    = $user->authorise('core.edit', 'com_cineplan');
$canCheckin = $user->authorise('core.manage', 'com_cineplan');
$canChange  = $user->authorise('core.edit.state', 'com_cineplan');
$canDelete  = $user->authorise('core.delete', 'com_cineplan');

// get dates 
$today =& JFactory::getDate('now');
$tomorrow =& JFactory::getDate('now +1 day');
$day3 =& JFactory::getDate('now +2 day');
$day4 =& JFactory::getDate('now +3 day');
$day5 =& JFactory::getDate('now +4 day');
$day6 =& JFactory::getDate('now +5 day');
$day7 =& JFactory::getDate('now +6 day');
setlocale(LC_TIME, "de_DE.utf8");
?>

		<div ng-app="showsApp" ng-controller="showsCtrl"> 
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
        <script src="app.js"></script>
        
       <div  class="container">
			<div>
              <?php //echo json_encode($this->items); ?>
          	</div>
			
				<div class="container">
					<!-- first row today + 2 days -->
					<div class="row">
						<div class="col-sm-4" align="center">
							<h3><?php echo JText::_('COM_CINEPLAN_TODAY'); ?></h3>
							<h4><?php echo '' . $today->format("l - d. F Y") . "\n"; ?></h4>
							<-- Today Showings --></br>
							<ul class="list-unstyled">
								<li ng-repeat="x in shows">
									<b>{{ x.showtime }} Uhr {{ x.movie }}</b>
									<img class="poster" src="imgs/(x.poster)" alt="{{x.movie}}" title="{{x.showtime}} Uhr {{show.movietitle}}" width="320">
								</li>
							</ul>
						</div>
						<div class="col-sm-4" align="center">
							<h3><?php echo JText::_('COM_CINEPLAN_TOMORROW'); ?></h3>
							<h4><?php echo '' . $tomorrow->format("l - d. F Y") . "\n"; ?></h4>
							<-- Tomorrow Showings --></br>
						</div>
						<div class="col-sm-4" align="center">
							<h3><?php echo '' . $day3->format("l") . "\n"; ?></h3>
							<h4><?php echo '' . $day3->format("d. F Y") . "\n"; ?></h4>
							<-- Showings Day 3 --></br>
						</div>
					</div>
					<!-- second row days 4-7 -->
					<div class="row" align="center">
						<div class="col-sm-3" align="center">
							<h4><?php echo '' . $day4->format("l") . "\n"; ?></h4>
							<p><?php echo '' . $day4->format("d. F Y") . "\n"; ?></p>
							<-- Showings Day 4 --></br>
						</div>
						<div class="col-sm-3" align="center">
							<h4><?php echo '' . $day5->format("l") . "\n"; ?></h4>
							<p><?php echo '' . $day5->format("d. F Y") . "\n"; ?></p>
							<-- Showings Day 5 --></br>
						</div>
						<div class="col-sm-3" align="center">
							<h4><?php echo '' . $day6->format("l") . "\n"; ?></h4>
							<p><?php echo '' . $day6->format("d. F Y") . "\n"; ?></p>
							<-- Showings Day 6 --></br>
						</div>
						<div class="col-sm-3" align="center">
							<h4><?php echo '' . $day7->format("l") . "\n"; ?></h4>
							<p><?php echo '' . $day7->format("d. F Y") . "\n"; ?></p>
							<-- Showings Day 7 --></br>
						</div>
					</div>
					<div class="row">
							<-- end of showings - space for other contents -->
                    </div>
					</div>
		</div>
		
<script>
var app = angular.module('showsApp', []);
app.controller('showsCtrl', function($scope, $http) {
    $http.get("index.php?option=com_cineplan&view=showingsjson&tmpl=component").then(function(response) {
        $scope.shows = response.data.records;
    });
});
</script>
          
