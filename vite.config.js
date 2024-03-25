import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { fileURLToPath, URL } from "url";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: [
            { find: '@', replacement: fileURLToPath(new URL('resources/js', import.meta.url)) },
            { find: '@component', replacement: fileURLToPath(new URL('resources/js/components', import.meta.url)) },
            { find: '@store', replacement: fileURLToPath(new URL('resources/js/stores', import.meta.url)) },
            { find: '@page', replacement: fileURLToPath(new URL('resources/js/pages', import.meta.url)) },
        ],
    },
});
