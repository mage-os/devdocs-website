import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus';
import mermaid from 'mermaid';

import './clipboard';
import './components/search';

window.Alpine = Alpine;

Alpine.plugin(Focus);
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#docsScreen')) {
        import('./docs.js');
    }

    mermaid.initialize({
        startOnLoad: true,
        theme: 'default'
    });

    import('./components/accessibility');
});
