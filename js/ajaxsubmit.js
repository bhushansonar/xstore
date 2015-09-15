// JavaScript Document
//##################################################################################

//## FORM SUBMIT WITH AJAX                                                        ##

//## @Author: Simone Rodriguez aka Pukos <http://www.SimoneRodriguez.com>         ##

//## @Version: 1.2                                                                ##

//## @Released: 28/08/2007                                                        ##

//## @License: GNU/GPL v. 2 <http://www.gnu.org/copyleft/gpl.html>                ##

//##################################################################################





function xmlhttpPost(strURL,formname,responsediv,responsemsg,id,count) {
	
	var xmlHttpReq = false;

    var self = this;

    // Xhr per Mozilla/Safari/Ie7

    if (window.XMLHttpRequest) {

        self.xmlHttpReq = new XMLHttpRequest();

    }

    // per tutte le altre versioni di IE

    else if (window.ActiveXObject) {

        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }
	var Size = document.getElementById('size'+id).value;
	var cnt = document.getElementById('count').value;
	
	if(cnt!=''){
		count = cnt+1;}
	else {
		count = count;}
		
	if(Size!=''){
		document.getElementById('size'+id).style.border = '';
		document.getElementById('size'+id).style.background = '';
    	self.xmlHttpReq.open('POST', strURL, true);
		self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		self.xmlHttpReq.onreadystatechange = function() {
			if (self.xmlHttpReq.readyState == 4) {
				// Quando pronta, visualizzo la risposta del form
				updatepage(self.xmlHttpReq.responseText,responsediv,count);
			}else{
				// In attesa della risposta del form visualizzo il msg di attesa
				updatepage(responsemsg,responsediv,count);
			}
		}
		self.xmlHttpReq.send(getquerystring(formname));
	} else {
			
		sizecheck(id);
	}
}



function getquerystring(formname) {

    var form = document.forms[formname];

	var qstr = "";



    function GetElemValue(name, value) {

        qstr += (qstr.length > 0 ? "&" : "")

            + escape(name).replace(/\+/g, "%2B") + "="

            + escape(value ? value : "").replace(/\+/g, "%2B");

			//+ escape(value ? value : "").replace(/\n/g, "%0D");

    }

	

	var elemArray = form.elements;

    for (var i = 0; i < elemArray.length; i++) {

        var element = elemArray[i];

        var elemType = element.type.toUpperCase();

        var elemName = element.name;

        if (elemName) {

            if (elemType == "TEXT"

                    || elemType == "TEXTAREA"

                    || elemType == "PASSWORD"

					|| elemType == "BUTTON"

					|| elemType == "RESET"

					|| elemType == "SUBMIT"

					|| elemType == "FILE"

					|| elemType == "IMAGE"

                    || elemType == "HIDDEN")

                GetElemValue(elemName, element.value);

            else if (elemType == "CHECKBOX" && element.checked)

                GetElemValue(elemName, 

                    element.value ? element.value : "On");

            else if (elemType == "RADIO" && element.checked)

                GetElemValue(elemName, element.value);

            else if (elemType.indexOf("SELECT") != -1)

                for (var j = 0; j < element.options.length; j++) {

                    var option = element.options[j];

                    if (option.selected)

                        GetElemValue(elemName,

                            option.value ? option.value : option.text);

                }

        }

    }

    return qstr;

}
function updatepage(str,responsediv,count){
	var myArray = str.split("URL^_^");
	document.getElementById(responsediv).innerHTML = myArray[1];
	var totalPrice = 0;
	for(var i=0;i<count;i++){
		var itemprice = $('#total'+i).text();
		var totalpricei = 1*itemprice;
		totalPrice += totalpricei;
	}
	document.getElementById('totalamount').innerHTML = totalPrice;
	$('#tntpro').html(""+document.getElementById('count').value+"");
	//document.getElementById(responsediv).innerHTML = str;

}
function sizecheck(id){
	document.getElementById('size'+id).style.border = '2px solid #CC3333';
	document.getElementById('size'+id).style.background = '#FF9F9F';
}