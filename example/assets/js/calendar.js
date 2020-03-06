$(document).ready(function() {

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	var hh = today.getHours();
	var min = today.getMinutes();


	if(dd<10) {
	  dd = '0'+dd
	} 

	if(mm<10) {
	  mm = '0'+mm
	} 

	if(hh<10) {
	  hh = '0'+hh
	} 
	if(min<10) {
	  min = '0'+min
	} 

	today = yyyy + '-' + mm + '-' + dd + 'T'+ hh + ':' + min;
	console.log(today);

	document.getElementById("start_date").value = today;
	document.getElementById("end_date").value = today;
	
	
});