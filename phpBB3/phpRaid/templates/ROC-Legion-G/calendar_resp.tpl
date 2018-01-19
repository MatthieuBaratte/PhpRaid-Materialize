<div class="hidden-lg-up">
	<div class="container-fluid" id="calendarResp">
		<div class="card sectionCard div-shadow">
			<div class="row calendar--header">
				<div class="col-1 text-right">
					<a href="{$baseURL}?option=com_frontpage&amp;{$previous}"><i class="material-icons md-24">chevron_left</i></a>
				</div>
				<div class="col-10">
					<form class="form-inline justify-content-center" role="form"  name="datepickerform" action="{$baseURL}" method="get">
						<div class="form-group mb-0">
							<label class="sr-only" for="option">option</label>
							<input class="form-control inputCard inputCard-border" type="hidden" name="option" value="com_frontpage">
						</div>
						<div class="form-group mb-0">
							<label class="sr-only" for="monthID">Month</label>
							<select class="form-control inputCard inputCard-border" id="monthID" name="monthID">
								{foreach name=monthpicker from=$monthNames item=monthName key=monthNumber}
									<option value="{$monthNumber}"{if $currentMonth == $monthNumber} selected{/if}>{$monthName}
									</option>
								{/foreach}
							</select>
						</div>
						<div class="form-group mr-0 mb-0">
							<label class="sr-only" for="yearID">Year</label>
							<select class="form-control inputCard inputCard-border" id="yearID" name="yearID">
								{foreach name=yearpicker from=$years item=year}
									<option{if $currentYear == $year} selected{/if}>{$year}</option>
								{/foreach}
							</select>
						</div>
						<input type="submit" class="btn btn--input btn--bg" value="Go">
					</form>
				</div>
				<div class="col-1 text-left">
					<a href="{$baseURL}?option=com_frontpage&amp;{$next}"><i class="material-icons md-24">chevron_right</i></a>
				</div>
			</div>
			<div class="calendar">
				{foreach name=period from=$periods item=period}
					{foreach name=days from=$period.days item=day}
						{if count($day.events) > 0}
							{foreach name=event from=$day.events item=event}
								<div class="dayContainer-resp {if $day.empty == true}nomonthday{elseif $day.isToday == true}today{elseif $day.wday == 6}saturday{elseif $day.wday == 0}sunday{else}monthday{/if} {if count($day.events) == 0}nodisplayresp{/if}">
									<div class="row">
										<div class="col-3 col-resp">
											<div class="raidContainer-resp">
												<div class="day"></div>
												<div class="raid-resp">
													{if isset($day.day)}
														<div class="raid--dateday">{$day.dayname}&nbsp;{$day.day}</div>
													{/if}
													{$event}
									</div>
								</div>
							{/foreach}
						{/if}
					{/foreach}
				{/foreach}
			</div>
		</div>
	</div>
</div>