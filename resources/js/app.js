import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

document.addEventListener('livewire:load', function () {
    Livewire.on('confirmDeleteMenu', (menuId) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Call the Livewire method to delete the menu
                Livewire.emit('destroy', menuId);
            }
        });
    });
});