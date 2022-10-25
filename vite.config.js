import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/js/main.js',
                'public/js/GLTFLoader.js', 
                'public/js/OrbitControls.js'
            ],
            refresh: true,
        }),
    ],
});
