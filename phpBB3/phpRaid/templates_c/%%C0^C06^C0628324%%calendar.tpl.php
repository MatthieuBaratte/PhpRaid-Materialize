<?php /* Smarty version 2.6.26, created on 2017-09-05 11:00:03
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/calendar.tpl */ ?>
<div class="hidden-md-down">
	<div class="container-fluid" id="calendar">
		<div class="row">
			<div class="offset-xl-1 col-12 col-xl-10">
				<div class="section--calendar div-shadow">
					<div class="row calendar--header">
						<div class="col-1 text-right">
							<a href="<?php echo $this->_tpl_vars['baseURL']; ?>
?option=com_frontpage&amp;<?php echo $this->_tpl_vars['previous']; ?>
"><i class="material-icons md-24">chevron_left</i></a>
						</div>
						<div class="col-10">
							<form class="form-inline justify-content-center" role="form"  name="datepickerform" action="<?php echo $this->_tpl_vars['baseURL']; ?>
" method="get">
								<div class="form-group mb-0">
									<label class="sr-only" for="option">option</label>
									<input class="form-control inputCard inputCard-border" type="hidden" name="option" value="com_frontpage">
								</div>
								<div class="form-group mb-0">
									<label class="sr-only" for="monthID">Month</label>
									<select class="form-control inputCard inputCard-border" id="monthID" name="monthID">
										<?php $_from = $this->_tpl_vars['monthNames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['monthpicker'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['monthpicker']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['monthNumber'] => $this->_tpl_vars['monthName']):
        $this->_foreach['monthpicker']['iteration']++;
?>
											<option value="<?php echo $this->_tpl_vars['monthNumber']; ?>
"<?php if ($this->_tpl_vars['currentMonth'] == $this->_tpl_vars['monthNumber']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['monthName']; ?>

											</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</div>
								<div class="form-group mr-0 mb-0">
									<label class="sr-only" for="yearID">Year</label>
									<select class="form-control inputCard inputCard-border" id="yearID" name="yearID">
										<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['yearpicker'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['yearpicker']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['year']):
        $this->_foreach['yearpicker']['iteration']++;
?>
											<option<?php if ($this->_tpl_vars['currentYear'] == $this->_tpl_vars['year']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['year']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</div>
								<input type="submit" class="btn btn--input btn--bg" value="Go">
							</form>
						</div>
						<div class="col-1 text-left">
							<a href="<?php echo $this->_tpl_vars['baseURL']; ?>
?option=com_frontpage&amp;<?php echo $this->_tpl_vars['next']; ?>
"><i class="material-icons md-24">chevron_right</i></a>
						</div>
					</div>
					<?php if (isset ( $this->_tpl_vars['weekDayNames'] )): ?>
						<div class="calendar calendar--weekday">
							<?php $_from = $this->_tpl_vars['weekDayNames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dayName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dayName']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['weekDayName']):
        $this->_foreach['dayName']['iteration']++;
?>
								<div class="dayContainer calendar--title text-center"><?php echo $this->_tpl_vars['weekDayName']; ?>
</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>
					<?php endif; ?>
					<div class="calendar">
						<?php $_from = $this->_tpl_vars['periods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['period'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['period']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['period']):
        $this->_foreach['period']['iteration']++;
?>
							<?php $_from = $this->_tpl_vars['period']['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['days'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['days']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['day']):
        $this->_foreach['days']['iteration']++;
?>
								<div class="dayContainer <?php if ($this->_tpl_vars['day']['empty'] == true): ?>nomonthday<?php elseif ($this->_tpl_vars['day']['isToday'] == true): ?>today<?php elseif ($this->_tpl_vars['day']['wday'] == 6): ?>saturday<?php elseif ($this->_tpl_vars['day']['wday'] == 0): ?>sunday<?php else: ?>monthday<?php endif; ?> <?php if (count ( $this->_tpl_vars['day']['events'] ) == 0): ?>nodisplayresp<?php endif; ?>">
									<div class="day"></div>
									<div class="raidContainer">
										<div class="raid">
											<?php if (isset ( $this->_tpl_vars['day']['day'] )): ?>
												<div class="raid--date"><?php echo $this->_tpl_vars['day']['day']; ?>
</div>
											<?php endif; ?>
											<?php if (count ( $this->_tpl_vars['day']['events'] ) > 0): ?>
												<?php $_from = $this->_tpl_vars['day']['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['event']):
        $this->_foreach['event']['iteration']++;
?>
													<?php echo $this->_tpl_vars['event']; ?>

												<?php endforeach; endif; unset($_from); ?>
											<?php endif; ?>
										</div>	
									</div>
								</div>
							<?php endforeach; endif; unset($_from); ?>
						<?php endforeach; endif; unset($_from); ?>
					</div>
					<div class="row calendar--footer">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</div>