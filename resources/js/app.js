import './bootstrap';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

(function(){
    // JavaScript externo
  function confirmarPedido(event) {
      event.preventDefault(); // Prevent default form submission
  
      // Utilizando SweetAlert para mostrar una alerta de confirmación
      Swal.fire({
          title: '¿Estás seguro de querer ordenar esto?',
          text: "No podras cancelarlo",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: 'green',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Sí, confirmo',
          cancelButtonText: 'Cancelar'
      }).then((result) => {
          if (result.isConfirmed) {
              // Si el usuario hace clic en "Aceptar", enviar el formulario
              Swal.fire({
                title: 'Pedido realizado correctamente',
                text: "Espera a que este listo",
                icon: 'success',
              })
              setTimeout(() => {
                  event.target.closest('form').submit();
                
              }, 1500);
          }
      });
  }
  
  // Esperar a que se cargue el DOM antes de agregar el evento
  document.addEventListener('DOMContentLoaded', function() {
      const btnPedido = document.querySelectorAll('#pedido');
      
      btnPedido.forEach(button => {
          button.addEventListener('click', confirmarPedido);
      });
  });
    
}());