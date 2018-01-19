// modal menu expan icon management
// -----------------------
$( function() {	
	$('[data-toggle="collapse"]').click(function () {
		var el=$(this);
		var elid=el.attr('data-md');
		if (document.getElementById(elid).innerHTML == 'expand_more') {
			document.getElementById(elid).innerHTML = 'expand_less'
		} else {
			document.getElementById(elid).innerHTML = 'expand_more'
		}	
	});
});

// Init JQuery Datepicker
// -----------------------
//$( function() {
//	$("#date").datepicker({
//	  nextText: "Later"
//	});
//});
$( function() {
	$("#date").pickadate({
		monthsFull: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'],
		weekdaysShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		firstDay: 1,
	  	clear: "",
	  	close: "",
	  	today: "",
	  	format: 'mm/dd/yyyy'
	});
});

// Init Boostrap tooltip
// -----------------------
$( function() {			
	$('[data-toggle="tooltip"]').click(function() {
		var el=$(this);
		if (el.attr('data-poload') != '') {
			$.get(el.attr('data-poload'),function(d){
				el.tooltip({title: d,html: true,trigger:"focus hover",delay:{"show":150,"hide":150},container: "body"}).tooltip('show');
			});
		} else {
			$.get(el.attr('data-content'),function(d){
				el.tooltip({title: d,html: true,trigger: "focus hover",delay:{"show":150,"hide":150},container: "body"}).tooltip('show');
			});
		}
	});
});

// Init Boostrap popover
// -----------------------
$( function() {			
	$('[data-toggle="popover"]').click(function() {
		var el=$(this);
		if (el.attr('data-poload') != '') {
			$.get(el.attr('data-poload'),function(d){
				el.popover({content: d,html: true,trigger:"focus hover",delay:{"show":150,"hide":150},container: "body"}).popover('show');
			});
		} else {
			$.get(el.attr('data-content'),function(d){
				el.popover({content: d,html: true,trigger: "focus hover",delay:{"show":150,"hide":150},container: "body"}).popover('show');
			});
		}
	});
});

// Init Boostrap modal
// - for frontpage (calendar) 
// - for view (raid details)
// -----------------------
$('[data-toggle="modal"]').click(function () {
	var el=$(this);
	if (el.attr('data-poload') !='menu') {
		$.get(el.attr('data-poload'),function(d){
			$('body').append(d);
			$('#modal--raid').modal('show');
		});
	}
	$(document).on('hidden.bs.modal','#modal--raid' ,function (e) {
		$(this).remove();
	});
});