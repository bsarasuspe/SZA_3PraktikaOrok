function AddBookValidation(){
	var titulua = document.forms["form"]["titulua"].value;
    var egilea = document.forms["form"]["egilea"].value;
	var sinopsia = document.forms["form"]["sinopsia"].value;
	var irudia = document.forms["form"]["irudia"].value;
    var deskarga = document.forms["form"]["deskarga"].value;

	if (titulua.length == 0){
    	document.forms["form"]["titulua"].style.border='2px solid red';
    	document.getElementById("titulua-error").innerHTML = "Titulua falta da.";
    }else{
    	document.forms["form"]["titulua"].style.border='2px solid #c6c0bc';
    	document.getElementById("titulua-error").innerHTML = "";
    }

    if (egilea.length == 0){
        document.forms["form"]["egilea"].style.border='2px solid red';
        document.getElementById("egilea-error").innerHTML = "Egilea falta da.";
    }else{
        document.forms["form"]["egilea"].style.border='2px solid #c6c0bc';
        document.getElementById("egilea-error").innerHTML = "";
    }

    if (sinopsia.length == 0){
        document.forms["form"]["sinopsia"].style.border='2px solid red';
        document.getElementById("sinopsia-error").innerHTML = "Sinopsia falta da.";
    }else{
        document.forms["form"]["sinopsia"].style.border='2px solid #c6c0bc';
        document.getElementById("sinopsia-error").innerHTML = "";
    }

    if (irudia.length == 0){
        document.forms["form"]["irudia"].style.border='2px solid red';
        document.getElementById("irudia-error").innerHTML = "Irudia falta da.";
    }else{
        document.forms["form"]["irudia"].style.border='2px solid #c6c0bc';
        document.getElementById("irudia-error").innerHTML = "";
    }

    if (deskarga.length == 0){
        document.forms["form"]["deskarga"].style.border='2px solid red';
        document.getElementById("deskarga-error").innerHTML = "Deskarga url-a falta da.";
    }else{
        document.forms["form"]["deskarga"].style.border='2px solid #c6c0bc';
        document.getElementById("deskarga-error").innerHTML = "";
    }

	if(titulua.length>0 && egilea.length>0 && sinopsia.length>0 && irudia.length>0 && deskarga.length>0){
        return true;
	}else{
		//alert("Pasahitzak ez dira berdinak.");
        return false;
	}
}