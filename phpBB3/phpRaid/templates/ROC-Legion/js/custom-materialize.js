/*
 * -------------------------------------------------------------
 * Type:     function
 * Name:     
 * Purpose:  initialize dropdown
 * -------------------------------------------------------------
 */
$( document ).ready(function() {	
	$(".dropdown-button").dropdown({
		belowOrigin: false,
		alignment: 'right',
		constrainWidth: false,
		gutter: 1
	});
});
/*
 * -------------------------------------------------------------
 * Type:     function
 * Name:     
 * Purpose:  initialize sidenav
 * -------------------------------------------------------------
 */
$( document ).ready(function() {
	$(".button-collapse").sideNav();
});
/*
 * -------------------------------------------------------------
 * Type:     function
 * Name:     
 * Purpose:  set arrow_drop icon for collapsible items (for side nav)
 * -------------------------------------------------------------
 */
$( function() {	
	$('.collapsible-header').click(function () {
		// Get item id and set the <i> id
		var el=$(this);
		var elid="i"+el.attr('id');
		// Get id of all collapsible-header item
		var eldother = document.getElementsByClassName("collapsible-header color-link--menu");
		// As mode is accordion, set default arrow_drop for item not expanded (not clicked)
		for (var i = 0; i < eldother.length; i++) {
			elidother = "i"+(eldother[i].id) ;
			if (elidother != elid) {
				document.getElementById(elidother).innerHTML = 'arrow_drop_down';
			}
		}
		// Set arrow_drop for clicked item
		if (document.getElementById(elid).innerHTML == 'arrow_drop_down') {
			document.getElementById(elid).innerHTML = 'arrow_drop_up'
		} else {
			document.getElementById(elid).innerHTML = 'arrow_drop_down'
		}	
	});
});
/* -------------------------------------------------------------
* Type:     function
* Name:     
* Purpose:  add class to input focus to add color effect
* -------------------------------------------------------------
*/
//$( function() {	
//	$(".mat-input").focus(function(){
//		$(this).parent().addClass("is-active is-completed");
//	});
//	
//	$(".mat-input").focusout(function(){
//		if($(this).val() === "")
//		$(this).parent().removeClass("is-completed");
//		$(this).parent().removeClass("is-active");
//	});
//});
/*
$(window).load(function(){
	// Extension materialize.css
	$.validator.setDefaults({
		errorClass: 'validate invalid',
		validClass: "validate valid",
		errorPlacement: function (error, element) {
			$(element)
				.closest("form")
				.find("label[for='" + element.attr("id") + "']")
				.attr('data-error', error.text());
		},
		submitHandler: function (form) {
			console.log('form ok');
		}
	});
	
	$("#form").validate({
		rules: {
			dateField: {
				date: true
			}
		}
	});
});
*/
/* -------------------------------------------------------------
* Type:     function
* Name:     
* Purpose:  initialize select
* -------------------------------------------------------------
*/
$( document ).ready(function() {
   $('select').material_select();
});

function update_select(){
	$('select').material_select();
};

/* -------------------------------------------------------------
* Type:     function
* Name:     
* Purpose:  initialize datepicker
* -------------------------------------------------------------
*/
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
	selectYears: 3, // Creates a dropdown of 15 years to control year,
	monthsFull: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'],
	weekdaysShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
    today: '',
    clear: '',
	close: '',
	format: 'dd/mm/yyyy',
    closeOnSelect: true // Close upon selecting a date,
  });
/*
  monthsFull: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'],
  weekdaysShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
  firstDay: 1,
	clear: "",
	close: "",
	today: "",
	format: 'mm/dd/yyyy'
	*/
/*
 * -------------------------------------------------------------
 * Type:     function
 * Name:     edit_announce
 * Purpose:  control only one announce is selected for edit
 * -------------------------------------------------------------
 */
function edit_announce(){
	// Get all selected announce
	var listcheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
	// Control number of announce selected as only one can be edited
	if (listcheckbox.length > 1) {
		var error_message = " lines are selected. You can edit only one line";
		error_message = listcheckbox.length + error_message;
		Materialize.toast(error_message, 4000, 'red');
	} else if (listcheckbox.length == 0) {
		var error_message = "You must select at least one line";
		Materialize.toast(error_message, 4000, 'red');
	} else {
		window.location.href='index.php?option=com_announcements&task=edit&id='+listcheckbox[0].value;
	}
};
/*
 * -------------------------------------------------------------
 * Type:     function
 * Name:     checkuncheck_all
 * Purpose:  check/uncheck all checkbox
 * -------------------------------------------------------------
 */
function checkuncheck_all(){
	// Get all checkbox 
	var listcheckbox = document.querySelectorAll('input[type="checkbox"]');
	// Get main checkbox use to check/uncheck all checkbox
	var ischecked = listcheckbox[0].checked;
	// check/uncheck all checkbox
	for (var i = 0; i < listcheckbox.length; i++) {
		listcheckbox[i].checked = !ischecked;
	}
};


