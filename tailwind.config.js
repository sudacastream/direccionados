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
                verde : '#1d594f',
                naranja : '#fc7a00',
            },
            boxShadow: {
                innerxl : 'inset 0 80px 80px 0 rgb(0 0 0 / 0.5);',
            },
            spacing: {
                'header' : 'calc(100vh - 6rem)',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin')],
};
