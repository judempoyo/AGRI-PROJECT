import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';



export default defineConfig({
    /* server: {
        host: '192.168.179.53',
        port: '80',
    
    }, */
    plugins: [
        laravel({
            input: [
               
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
