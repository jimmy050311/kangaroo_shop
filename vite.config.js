import { build, defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import mkcert from 'vite-plugin-mkcert'
import inject from '@rollup/plugin-inject'

export default defineConfig({
    // server: {
    //     https: true
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        inject({
            $: 'jquery',
            jQuery: 'jquery',
        }),
        // mkcert()
    ],

});
// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';
// import path from "path";
// import postcssNesting from 'postcss-nesting';
// export default defineConfig({
//     plugins: [
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//         laravel(['resources/js/indexMain.js','resources/js/adminMain.js','resources/js/publicMain.js']),
//     ],
//     resolve: {
//         alias: {
//             "@/": path.join(__dirname, "/resources/js/"),
//             "~": path.join(__dirname, "/node_modules/"),
//         },
//     },
//     build: {
//         chunkSizeWarningLimit: 1600,
//     },
//     css: {
//         postcss: {
//             plugins: [
//                 postcssNesting
//             ],
//         },
//     }
// });