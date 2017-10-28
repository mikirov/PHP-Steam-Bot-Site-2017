
function select(id) {
	var el = document.getElementById(id);

	if (el.classList.contains('unselected')) {
		el.classList.add('selected');
		el.classList.remove('unselected');
	} else {
		el.classList.remove('selected');
		el.classList.add('unselected');
	}
}

function disable(){
		var el=document.getElementById('deposit');
		if(el.className === "disabled"){
			alert("you can refresh your inventory only once every minute")
		}
		el.className="disabled";
		setTimeout('el.className="enabled";',60000);

}
function deposit(){
	var elements = document.getElementsByClassName("selected");
	if(elements.length == 0){
		alert("Select some items first");
		return 0;
	}
	var ids=[];
	for(i=0;i<elements.length;i++){
		ids[i]= elements[i].id;
	}
	$.ajax({
       type: "POST",
       url: "senditems.php",
       data: { assetids: ids },
       success: function(msg) {

            alert(msg);
       }
    });
}
