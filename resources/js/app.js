import './bootstrap';

if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
    // Restart livewire on back or foward.
    Livewire.restart();
}

import '../css/app.css'

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
