$(document).ready(function(){
    $("#passw").on("change", function(){
        valoare=$(this).val();
        if(!(/[A-Z]/.test(valoare))) {
            $('#passw').parent().addClass("alert");
            $('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine litere mari<br></div>');
        }
        if (!(/[a-z]/.test(valoare))) {
            $('#passw').parent().addClass("alert");
            $('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine litere mici<br></div>');
        }
        if (!(/[0-9]/.test(valoare))) {
            $('#passw').parent().addClass("alert");
            $('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine cifre<br></div>');
        }
        if(!(/[!@#$%^&*()_-]/.test(valoare))) {
            
            $('#passw').parent().addClass("alert");
            $('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine caractere speciale<br></div>');
        } else {
            $('#passw').parent().removeClass("alert-danger");
            $('#passw').parent().addClass("alert-success");
            $("#info").html('<div class="alert alert-succes">Parola este puternica<br></div>');
        }
    });
	$("#username").on("keyup",function(){
		valoareCurentaUser=$(this).val();
		$.get("verificareUser.php", 
			{username : valoareCurentaUser}, 
			function(data,status) { 
				utilizatoriExistenti=JSON.parse(data);
				console.log(utilizatoriExistenti);
				ok=1;
				for(i=0;i<utilizatoriExistenti.length;i++){
					console.log(utilizatoriExistenti[i],valoareCurentaUser);
					if (utilizatoriExistenti[i] == valoareCurentaUser)
						ok=0;
				}
				if(ok==0){
					$('#username').parent().addClass("alert");
					$('#username').parent().addClass("alert-danger");
					lista='';
					for(i=0;i<utilizatoriExistenti.length;i++){
					lista+='<div><b>'+utilizatoriExistenti[i]+'</b></div>'
					}
					$("#info").html('<div class="alert alert-danger">Username-ul exista in baza de date!<br> '+lista+'</div>');
					
				}else{
					$("#info").html('');
					$('#username').parent().removeClass("alert");
					$('#username').parent().removeClass("alert-danger");
				}
			});
		});
 });
