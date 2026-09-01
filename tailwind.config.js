import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // `is-scrolling` is toggled by app.js (auto-hide scrollbar), not
    // written in any Blade file, so Tailwind's content scanner never sees
    // it and silently strips the CSS rules that reference it. Safelisted
    // so those rules always make it into the compiled output.
    safelist: ['is-scrolling'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
