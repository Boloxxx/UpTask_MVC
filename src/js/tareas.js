(function () {
  // boton para mostrar el modal de agregar tarea
  const nuevaTareaBtn = document.querySelector("#agregar-tarea");
  nuevaTareaBtn.addEventListener("click", mostrarFormulario);

  function mostrarFormulario() {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");
    modal.innerHTML = `
        <form class="formulario nueva-tarea">
            <legend>Añade una nueva tarea</legend>
            <div class="campo">
            <label>Tarea</label>
            <input type="text" name="tarea" placeholder="Añadir Tarea al Proyecto Actual"
            id="tarea"
            />
            </div>
            <div class="opciones">
                <input type="submit" class="submit-nueva-tarea" value="Añadir Tarea" />
                <button type="button" class="cerrar-modal">Cancelar</button>
            </div>
        
        </form>
        
        `;

    setTimeout(() => {
      const formulario = document.querySelector(".formulario");
      formulario.classList.add("animar");
    }, 0);

    modal.addEventListener("click", function (e) {
      e.preventDefault();

      if (e.target.classList.contains("cerrar-modal")) {
        const formulario = document.querySelector(".formulario");
        formulario.classList.add("cerrar");
        setTimeout(() => {
          modal.remove();
        }, 500);
      }
      if (e.target.classList.contains("submit-nueva-tarea")) {
        submitFormularioNuevaTarea();
      }
    });

    document.querySelector(".dashboard").appendChild(modal);
  }

  function submitFormularioNuevaTarea() {
    const tarea = document.querySelector("#tarea").value.trim();

    if (tarea === "") {
      // Mostrar una alerta de error
      mostrarAlerta('El Nombre de la tarea es Obligatorio', 'error', document.querySelector('.formulario legend'));
        return
    }

    agregarTarea(tarea)
  }
  // Muestra un mensaje en la interfaz
  function mostrarAlerta(mensaje, tipo, referencia) {
    // Previene la creacion de multiples alertas
    const alertaPrevia = document.querySelector('.alerta')
    if(alertaPrevia) {
      alertaPrevia.remove()
    }

    const alerta = document.createElement('DIV')
    alerta.classList.add('alerta', tipo)
    alerta.textContent = mensaje

    // Inserta la alerta antes del legend
    referencia.parentElement.insertBefore(alerta, referencia)

    // Eliminar la alerta despues de 5 segundos
    setTimeout(() => {
      alerta.remove()
    }, 5000);
  }

  // Consultar el servidor para agregar una nueva tarea
  async function agregarTarea(tarea) {
    // Contruir la peticion
    const datos = new FormData()
    datos.append('nombre', tarea)

    try {
      const url = 'http://localhost:3000/api/tarea'
      const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
      })

      const resultado = await respuesta.json()
      console.log(resultado)

    } catch (error) {
      console.log(error)
    }
  }
})();