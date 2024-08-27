document.addEventListener('DOMContentLoaded', function() {
    darkMode();
    cambiarDias();
});

function darkMode() {
    const prefersDarkMode=window.matchMedia('(prefers-color-scheme:dark)');//chequea preferencias por defecto
    if(prefersDarkMode.matches){//si coincide inserta el class
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");
    } 
    prefersDarkMode.addEventListener('change',()=>{//ve cambios en preferencias
        if(prefersDarkMode.matches){
            document.body.classList.add("dark-mode");
        }
        else{
            document.body.classList.remove("dark-mode");
    
        } 
    });

    const darkModeButton = document.querySelector('.dark-mode-btn');
    if (darkModeButton) {
        darkModeButton.addEventListener("click", function() {
            console.log("dark");
            document.body.classList.toggle("dark-mode");
        });
    } else {
        console.error("No se encontró el botón para activar el modo oscuro.");
    }
}
function cambiarDias(){
    const btn_dia_back=document.querySelector('#btn-dia-back');
    const btn_dia_next=document.querySelector('#btn-dia-next');
    const h1=document.querySelector('.dia');


    $dias=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    //i=4 ;//posicion dentro del array
     // Recuperar el valor de 'i' desde el localStorage o establecerlo en 4 si no existe
    let i = localStorage.getItem('diaIndex') ? parseInt(localStorage.getItem('diaIndex')) : 0;

    h1.textContent=$dias[i];
    btn_dia_next.addEventListener('click',function(){
        
       i++;
    
       if (i >5) {//si indice del array supera 5 le asigna 0 a dicho indice
        i = 0;
        }
        h1.textContent=$dias[i];//inyecta valor de array en indice al titulo

            // Guardar el valor actualizado de 'i' en el localStorage
            localStorage.setItem('diaIndex', i);
    });
    btn_dia_back.addEventListener('click',function(){
        
       i--;
    
       if (i <0) {//si indice del array baja de 0 le asigna 5 a dicho indice
        i = 5;
        }
        h1.textContent=$dias[i];//inyecta valor de array en indice al titulo
            // Guardar el valor actualizado de 'i' en el localStorage
            localStorage.setItem('diaIndex', i);
    });
}
