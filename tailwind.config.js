const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparente: 'rgba(256,256,256,0.1)',
                rojo: '#EB4327',
                naranja: '#FF4121',
                amarillo: '#FFC21E',
                violeta: '#C7227A',
                verde: '#1AA122',
                celeste: '#2E9CC7',
                morado: '#733AD4',
                azul: '#3B38BE',
            },
            boxShadow: {
                innerxl : 'inset 0 80px 80px 0 rgb(0 0 0 / 0.5);',
            },
            spacing: {
                'header' : 'calc(100vh - 6rem)',
                'nav' : '50px',
                'menuiconh' : '3px',
                'menuiconw' : '20px',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin')],
};
