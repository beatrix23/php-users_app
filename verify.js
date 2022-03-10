function validareFormular(formular){
  listaErori = validareUser(formular.username);
  listaErori += validareParola(formular.passw);
  listaErori += validareNume(formular.name);
  listaErori += validarePrenume(formular.p_nume);
  if(listaErori == "") {
    return true;
  }
  if (listaErori != "") {
    return false;
  }
 
  function validareUser(nume){
    if(nume.value==""){
      nume.classList.add("alert");
      nume.classList.add("alert-danger");
      document.getElementById('info').innerHTML='<div class="alert alert-danger">Username-ul nu este completat</div>';
      return "Continutul nu poate fi gol<br>";
    }
    else if (/[^a-z0-9A-Z]/.test(nume.value)) {
      nume.parentNode.classList.add("alert");
      nume.parentNode.classList.add("alert-danger");
      document.getElementById('info').innerHTML='<div class="alert alert-danger">Username-ul trebuie sa contina doar litere si cifre</div>';
      return "Nu e valid!" }
    else {
      nume.parentNode.classList.remove("alert");
      nume.parentNode.classList.remove("alert-danger");
      return "";
    }
    
  }
  
  
  function validareParola(parola){
    if(parola.value==""){
      parola.parentNode.classList.add("alert");
      parola.parentNode.classList.add("alert-danger");
      document.getElementById('info').innerHTML += '<div class="alert alert-danger">Parola nu este completata</div>';
      return "Continutul nu poate fi gol<br>";
    }
    else if (!(/[a-z]/.test(parola.value)) || !(/[A-Z]/.test(parola.value)) || !(/[0-9]/.test(parola.value)) || !(/[!@#$%^&*()_-]/.test(parola.value))) {
      
      parola.parentNode.classList.add("alert");
      parola.parentNode.classList.add("alert-danger");
      document.getElementById('info').innerHTML +='<div class="alert alert-danger">Parola trebuie sa contina caractere speciale, litere mare, mici si cifre</div>';
      return "Parola cifra sau caracterele speciale !@#$%^&*()_-<br>";}
    else 
      {
      parola.parentNode.classList.remove("alert");
      parola.parentNode.classList.remove("alert-danger");
      return "";
    }
  }

  function validareNume(nume){
    if(nume.value==""){
      nume.classList.add("alert");
      nume.classList.add("alert-danger");
      document.getElementById('info').innerHTML+='<div class="alert alert-danger">Numele nu este completat</div>';
      return "Continutul nu poate fi gol<br>";
    }
    else if (/[^a-zA-Z-]/.test(nume.value)) {
      nume.parentNode.classList.add("alert");
      nume.parentNode.classList.add("alert-danger");
      document.getElementById('info').innerHTML+='<div class="alert alert-danger">Numele trebuie sa contina doar litere si liniuta</div>';
      return "Nu e valid!" }
    else {
      nume.parentNode.classList.remove("alert");
      nume.parentNode.classList.remove("alert-danger");
      return "";
    }
    
  }

  function validarePrenume(nume){
    if(nume.value==""){
      nume.classList.add("alert");
      nume.classList.add("alert-danger");
      document.getElementById('info').innerHTML+='<div class="alert alert-danger">Prenumele nu este completat</div>';
      return "Continutul nu poate fi gol<br>";
    }
    else if (/[^a-zA-Z-]/.test(nume.value)) {
      nume.parentNode.classList.add("alert");
      nume.parentNode.classList.add("alert-danger");
      document.getElementById('info').innerHTML+='<div class="alert alert-danger">Prenumele trebuie sa contina doar litere si liniuta</div>';
      return "Nu e valid!" }
    else {
      nume.parentNode.classList.remove("alert");
      nume.parentNode.classList.remove("alert-danger");
      return "";
    }
    
  }
}