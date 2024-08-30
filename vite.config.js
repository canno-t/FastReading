import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server:{
        host: '0.0.0.0',
        hmr: {
            clientPort: 3000,
            host: 'localhost',
            protocol: 'ws'
        },
        port: 3000,
        watch: {
            usePolling: true
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/game.js,', 'resources/css/game.css'],
            refresh: true,
        }),
    ],
});
