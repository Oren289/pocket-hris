import Alpine from 'alpinejs';
import 'select2';
import 'select2/dist/css/select2.min.css';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    $('.searchable-select-modal').select2({
        width: '100%',
        placeholder: 'Select...',
        allowClear: true,
        dropdownParent: $('.modal'),
    });

    $('.searchable-select').select2({
        width: '100%',
        placeholder: 'Select...',
        allowClear: true,
    });
});