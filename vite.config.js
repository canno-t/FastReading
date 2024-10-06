import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
	outDir: 'public/build',
	sourcemap: false,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/game.js', 'resources/css/game.css'],
            refresh: false,
        }),
    ],
});
