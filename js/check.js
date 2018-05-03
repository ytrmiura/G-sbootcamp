function check(){
	var txt =$("#text").val();
	var n = txt.length;
	if(n>30){
		alert("30字以内にしてください");
	}	
}

function name_check(){
	var txt =$("#name").val();
	var n = txt.length;
	if(n>10){
		alert("アルファベット10字以内にしてください");
		return;
	}
	var data = txt.match(/[^A-Za-z0-9]+/);
	if (data){
		alert("アルファベット以外が含まれています");	
		return;
	}
	document.form1.submit();
}