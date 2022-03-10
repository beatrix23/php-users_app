$(document).ready(function(){
	$("passw").on("keyup", function(){
        valoare=$(this).val();
        if(!/[A-Z]/.test(valoare)) {
            $('#passw').parent().addClass("alert");
			$('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine litere mari<br></div>');
        } else if (!/[a-z]/.test(valoare)) {
            $('#passw').parent().addClass("alert");
			$('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine litere mici<br></div>');
        } else if (!(/[0-9]/.test(valoare))) {
            $('#passw').parent().addClass("alert");
			$('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine cifre<br></div>');
        } else if(!(/[!@#$%^&*()_-]/.test(valoare))) {
            console.log("prola");
            $('#passw').parent().addClass("alert");
			$('#passw').parent().addClass("alert-danger");
            $("#info").html('<div class+="alert alert-danger">Parola nu contine caractere speciale<br></div>');
        } else {
			$('#passw').parent().removeClass("alert-danger");
			$('#passw').parent().addClass("alert-success");
            $("#info").html('<div class="alert alert-succes">Parola este puternica<br></div>');
        }
    });
});