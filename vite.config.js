import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { PurgeCSS } from 'purgecss';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/app.scss',
                'resources/css/home.css'
            ],
            refresh: true,
        }),
        {
            name: 'purgecss',
            apply: 'build',
            async transformIndexHtml(html) {
                const purgeCss = new PurgeCSS();
                const result = await purgeCss.purge({
                    content: ['./resources/**/*.blade.php',
                        './resources/**/*.js',
                        './resources/**/*.vue'],
                    css: ['public/css/*.css', 'public/css/*.scss'],
                    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
                });
                return html.replace('<head>', `<head><style>${result[0].css}</style>`)
            }
        }
    ],
    resolve: {
        alias: {
            '~bootstrap': 'node_modules/bootstrap/',
        }
    }
});
