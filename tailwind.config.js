import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: false,

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'navy-blue': '#0A2239',
                'teal-Blue': '#1F5D83',
                'aqua-green': '#6AB8A5',
                'light-gray': '#E0E0E0',

                'light-background': '#79b6c8',
                'water-blue-background': '#c7d1d4',
                'light-text': '#061722'
            }
        },
    },

    plugins: [forms, typography],
};
