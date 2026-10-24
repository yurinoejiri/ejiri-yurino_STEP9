import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.sass',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/js/purchase.js',
            ],
            refresh: true,
        }),
    ],
});
