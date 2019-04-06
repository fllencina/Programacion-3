function Saludar(nombre){
    alert("Hola " + nombre);
}

window.onload=Carga;//la variable Carga es un puntero a funcion Carga(); guarda la referencia a la funcion

function Carga()
{
   // document.getElementById('btnEnviar').onclick=ValidarUsuario;
   document.getElementById('btnEnviar').addEventListener("click",ValidarUsuario);//add evento es para agregar varios eventos a un mismo boton
   document.getElementById('btnEnviar').addEventListener("click",function(){
       alert("otra funcion");
   });
   document.getElementById('btnEnviar').removeEventListener("click",ValidarUsuario);//remove evento
   
   
   
}
function ValidarUsuario()
{
   var usuario="fernanda";
   var contrasenia="123456";
   var usuarioIngresa=document.getElementById('inputUsuario');
   var contraseniaIngresa=document.getElementById('inputContraseña');
   if(usuarioIngresa.value!=""){

           if(usuario==usuarioIngresa.value)
           {
               if(contrasenia===contraseniaIngresa.value)
               {
                   alert("Datos ingresados correctamente");
               }
               else{
                   alert("La clave ingresada es incorrecta");
               }
           }
           else{
               alert("El usuario ingresado no es correcto");
           }
   }
   else{
       
       alert("Debe ingresar datos antes de enviar");
   }
}