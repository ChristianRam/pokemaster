function validar(){
    var nombre, apellido, region, experiencia, distincion;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    region = document.getElementById("region").value;
    experiencia = document.getElementById("experiencia").value;
    distincion = document.getElementById("distincion").value;

    if(nombre == "" || apellido == "" || region == "" || experiencia == "" || distincion == ""){
        alert ("El campo está vacío");
        return false;
    }
    if (region >= 13 || experiencia <= -1 || distincion >= 5){
        alert ("Pon un valor valido");
        return false;
    }
    if (experiencia >= 99){
        alert ("Pon una experiencia válida");
        return false;
    }

}