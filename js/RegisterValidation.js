function RegisterValidation(){
	var izena = document.forms["form"]["izena"].value;
	var eposta = document.forms["form"]["eposta"].value;
	var pasahitza = document.forms["form"]["pasahitza"].value;
	var pasahitza2 = document.forms["form"]["pasahitza2"].value;
	var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 

	if (izena.length == 0){
    	document.forms["form"]["izena"].style.border='2px solid red';
    	document.getElementById("izena-error").innerHTML = "Izena falta da.";
    }else{
    	document.forms["form"]["izena"].style.border='2px solid #c6c0bc';
    	document.getElementById("izena-error").innerHTML = "";
    }

    if (eposta.length == 0){
    	document.forms["form"]["eposta"].style.border='2px solid red';
    	document.getElementById("eposta-error").innerHTML = "Eposta falta da.";
    }else{
    	document.forms["form"]["eposta"].style.border='2px solid #c6c0bc';
    	document.getElementById("eposta-error").innerHTML = "";
    	if(!pattern.test(eposta)){
    		document.forms["form"]["eposta"].style.border='2px solid red';
    		document.getElementById("eposta-error").innerHTML = "Eposta ez da zuzena.";
    	}else{
    		document.forms["form"]["eposta"].style.border='2px solid #c6c0bc';
    		document.getElementById("eposta-error").innerHTML = "";
    	}
    }

    if (pasahitza.length == 0){
    	document.forms["form"]["pasahitza"].style.border='2px solid red';
    	document.forms["form"]["pasahitza2"].style.border='2px solid red';
    	document.getElementById("pasahitza-error").innerHTML = "Pasahitzak ezin du hutsa izan.";
    }else{
    	document.forms["form"]["pasahitza"].style.border='2px solid #c6c0bc';
    	document.forms["form"]["pasahitza2"].style.border='2px solid #c6c0bc';
    	document.getElementById("pasahitza-error").innerHTML = "";
    	if(pasahitza.length<9){
    		document.forms["form"]["pasahitza"].style.border='2px solid red';
    		document.forms["form"]["pasahitza2"].style.border='2px solid red';
    		document.getElementById("pasahitza-error").innerHTML = "Pasahitzak gutxienez 8 karaktere izan behar ditu.";
    	}else{
    		document.forms["form"]["pasahitza"].style.border='2px solid #c6c0bc';
    		document.forms["form"]["pasahitza2"].style.border='2px solid #c6c0bc';
    		document.getElementById("pasahitza-error").innerHTML = "";
    		if(pasahitza2 != pasahitza){
				document.forms["form"]["pasahitza"].style.border='2px solid red';
				document.forms["form"]["pasahitza2"].style.border='2px solid red';
    			document.getElementById("pasahitza-error").innerHTML = "Pasahitzak ez dira berdinak.";
    		}else{
    			document.forms["form"]["pasahitza"].style.border='2px solid #c6c0bc';
    			document.forms["form"]["pasahitza2"].style.border='2px solid #c6c0bc';
    			document.getElementById("pasahitza-error").innerHTML = "";
    		}
    	}
    }

	if(izena.length>0 && eposta.length>0 && pasahitza.length>0 && pasahitza2.length>0){
		if(pattern.test(eposta)){
			if(pasahitza.length > 8){
				if(pasahitza == pasahitza2){
					return true;
				}else{
					//alert("Pasahitzak ez dira berdinak.");
					return false;
				}
			}else{
				//alert("Pasahitzak gutxienez 8 karaktere izan behar ditu.");
				return false;
			}	
		}else{
			//alert("Eposta ez da zuzena.")
			return false;
		}
	}else{
		//alert("Datuak falta dira.")
		return false;
	}
}