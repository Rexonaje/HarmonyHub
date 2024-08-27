document.addEventListener('DOMContentLoaded', function() {
    darkMode();
    cambiarDias();
    presentismo();
    noPresentismo();
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
function presentismo(){
    const btn =document.querySelectorAll('.presente');
    btn.forEach(btn => {
        // Verificar si el botón tiene un id y es un elemento válido
        if (btn.id) {
            // Usar el id del botón para obtener su estado específico de localStorage
            const btnId = btn.id;
            let value = localStorage.getItem(`presentismo_${btnId}`) || 'Presente'; // Valor almacenado de btn
            btn.innerHTML = value;
            
            // Ajustar la clase del botón según el valor recuperado
            if (value === 'Ausente') {
                btn.classList.remove("boton-verde");
                btn.classList.add("boton-rojo");
            } else {
                btn.classList.remove("boton-rojo");
                btn.classList.add("boton-verde");
            }

            // Agregar el event listener al botón
            btn.addEventListener('click', function() {
                if (btn.textContent === 'Presente') {
                    btn.classList.remove("boton-verde");
                    btn.innerHTML = 'Ausente';
                    btn.classList.add("boton-rojo");

                    // Guardar el estado en localStorage con el id del botón
                    localStorage.setItem(`presentismo_${btnId}`, 'Ausente');
                } else {
                    btn.classList.remove("boton-rojo");
                    btn.innerHTML = 'Presente';
                    btn.classList.add("boton-verde");

                    // Guardar el estado en localStorage con el id del botón
                    localStorage.setItem(`presentismo_${btnId}`, 'Presente');
                }
            });
        } else {
            console.error('El botón no tiene un id único:', btn);
        }
    });
}
/*function noPresentismo(){
    const noPresentismo =document.querySelector('#no-presentismo');
    const btns =document.querySelectorAll('.presente');
    
    noPresentismo.addEventListener('click',function(){
        btns.forEach(btns =>{
            if(btns.disabled){
                btns.disabled=false;
            }else{
                btns.disabled=true;
            }
        });
    });

}*/
function noPresentismo() {
    const noPresentismo = document.querySelector('#no-presentismo');
    const btns = document.querySelectorAll('.presente');

    // Al cargar la página, aplicar el estado guardado en localStorage
    btns.forEach((btn, index) => {
        const savedState = localStorage.getItem(`btn_disabled_${index}`);
        if (savedState === 'true') {
            btn.disabled = true;
        } else {
            btn.disabled = false;
        }
    });

    noPresentismo.addEventListener('click', function() {
        if(noPresentismo.textContent==="Habilitar Presentismo"){
            noPresentismo.innerHTML="Deshabilitar Presentismo";
        }else{
            noPresentismo.innerHTML="Habilitar Presentismo";
        }
        btns.forEach((btn, index) => {
            if (btn.disabled) {
                btn.disabled = false;
                localStorage.setItem(`btn_disabled_${index}`, 'false');
                 
            } else {
                btn.disabled = true;
               
                localStorage.setItem(`btn_disabled_${index}`, 'true');
            }
        });
    });
}

