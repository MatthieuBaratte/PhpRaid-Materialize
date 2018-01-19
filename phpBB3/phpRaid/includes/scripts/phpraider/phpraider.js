function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

// Invert all checkboxes at once by clicking a single checkbox.
function invertAll(headerfield, checkform, mask)
{
	for (var i = 0; i < checkform.length; i++)
	{
		if (typeof(checkform[i].name) == "undefined" || (typeof(mask) != "undefined" && checkform[i].name.substr(0, mask.length) != mask))
			continue;

		if (!checkform[i].disabled)
			checkform[i].checked = headerfield.checked;
	}
}

// delete
function display_confirm(question)
{
	var answer = confirm(question);
	
	if(answer == 1)
		return true
	else
		return false
}

// dyanmically add events
function addEvent()
{
	var num = (document.getElementById(divNumber ).value -1)+ 2;

	if(num < 5) {
		var i;
		var ni = document.getElementById(divName );
		var numi = document.getElementById(divNumber );
		numi.value = num;
		var divIdName = divName+num;
		var newdiv = document.createElement('div');
		newdiv.setAttribute("id",divIdName);
		temp = '<select name="'+divName+num+'" class="post"></select>';
	
		newdiv.innerHTML = temp+"<a href=\"javascript:;\" onclick=\"removeEvent(\'"+num+"\')\"> [-]</a>";
		ni.appendChild(newdiv);
		
		addItem('race_id', divIdName );
	}
}

// dynamically remove events
function removeEvent(divNum )
{
	var d = document.getElementById(divName );
	var olddiv;
	var i = divNum
	var j = document.getElementById(divNumber ).value;
	var count = 0;
	
	for(i; i <= j; i++ ) {
		olddiv = document.getElementById(divName+i );
		d.removeChild(olddiv );	
		count++;
	}
	
	document.getElementById(divNumber ).value = j-count;
}

// adds items to a list (class/races)
function addItem(selfName, otherName ) {
	var i; // loop variable
	var j; // loop variable
	var name;
	var value;
	var loc = 0;
	var option = document.forms[formName][selfName].options[document.forms[formName][selfName].selectedIndex].value;
	
	// clear the select box
	document.forms[formName][otherName].options.length = 1;
	
	// add option to class_id select box
	for(i in list[option] ) {
		if((i % 4 ) == 3 ) {
			// place name
			name = list[option][i-3];
			
			// place value
			value = list[option][i-2];
			
			// check selected
			selected = list[option][i-1];

			// check selected
			classicon = list[option][i];
			
			if(selected == 'true' ) {
				document.forms[formName][otherName].options[loc] = new Option(name, value, true, true );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			} else {
				document.forms[formName][otherName].options[loc] = new Option(name, value );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			}
			
			// update other items if they exist
			for(j = 1; j <= document.forms[formName][divNumber].value; j++) {
				if(selected == 'true' ) {
					document.forms[formName][divName+j].options[loc] = new Option(name, value, true, true );
					document.forms[formName][otherName].options[loc].setAttribute("class","circle");
					document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
				} else {
					document.forms[formName][divName+j].options[loc] = new Option(name, value );
					document.forms[formName][otherName].options[loc].setAttribute("class","circle");
					document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
				}
			}
			loc++;
		}		
	}
}

// adds items to a list (class/spe)
function addItemSpe1(selfName, otherName ) {
	var i; // loop variable
	var j; // loop variable
	var name;
	var value;
	var loc = 0;
	var option = document.forms[formName][selfName].options[document.forms[formName][selfName].selectedIndex].value;
	
	// clear the select box
	document.forms[formName][otherName].options.length = 1;
	
	// add option to class_id select box
	for(i in spe1[option] ) {
		if((i % 4 ) == 3 ) {
			// place name
			name = spe1[option][i-3];
			
			// place value
			value = spe1[option][i-2];
			
			// check selected
			selected = spe1[option][i-1];
			
			// check selected
			classicon = spe1[option][i];

			if(selected == 'true' ) {
				document.forms[formName][otherName].options[loc] = new Option(name, value, true, true );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			} else {
				document.forms[formName][otherName].options[loc] = new Option(name, value );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			}
			loc++;
		}		
	}
}

// adds items to a list (class/spe)
function addItemSpe2(selfName, otherName ) {
	var i; // loop variable
	var j; // loop variable
	var name;
	var value;
	var loc = 0;
	var option = document.forms[formName][selfName].options[document.forms[formName][selfName].selectedIndex].value;
	
	// clear the select box
	document.forms[formName][otherName].options.length = 1;
	
	// add option to class_id select box
	for(i in spe2[option] ) {
		if((i % 4 ) == 3 ) {
			// place name
			name = spe2[option][i-3];
			
			// place value
			value = spe2[option][i-2];
			
			// check selected
			selected = spe2[option][i-1];

			// check selected
			classicon = spe2[option][i];
			
			if(selected == 'true' ) {
				document.forms[formName][otherName].options[loc] = new Option(name, value, true, true );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			} else {
				document.forms[formName][otherName].options[loc] = new Option(name, value );
				document.forms[formName][otherName].options[loc].setAttribute("class","circle");
				document.forms[formName][otherName].options[loc].setAttribute("data-icon",classicon);
			}
			loc++;
		}		
	}
}

function setupItems(subInitial, selfName, otherName ) {
		temp = document.forms[formName][subInitial].value;
		addItem(selfName, otherName );
}

function setupItemsSpe1(subInitialSpe1, selfName, otherName ) {
		temp = document.forms[formName][subInitialSpe1].value;
		addItemSpe1(selfName, otherName );
}

function setupItemsSpe2(subInitialSpe2, selfName, otherName ) {
		temp = document.forms[formName][subInitialSpe2].value;
		addItemSpe2(selfName, otherName );
}

function popupForm($arg) {
	var formID = document.getElementById($arg);

	formID.style.display=(formID.style.display=='block'?'none':'block');
}

function formSubmit($arg) {

}
