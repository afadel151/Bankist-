import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'custom-gradient': 'linear-gradient(to top left, #39b385, #9be15d)',
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            transform: ['hover', 'focus'], // Optionnel pour ajouter des états
            scale: {
                '107-105': 'scale(1.07, 1.05)', // Classe personnalisée pour le scale
            },
            skew: {
                '-15': '-15deg',
            },
        },
    },

    plugins: [forms, require('taos/plugin')],
};
