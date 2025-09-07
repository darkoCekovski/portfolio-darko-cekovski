import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class', // Ensures dark: classes work
    theme: {
        extend: {
            keyframes: {
                'rocket-launch': {
                    '0%': {transform: 'translate(-200px, 200px) scale(0.5) rotate(-20deg)', opacity: '0'},
                    '50%': {transform: 'translate(0, -50px) scale(1.1) rotate(0deg)', opacity: '1'},
                    '100%': {transform: 'translate(0, -300px) scale(1) rotate(10deg)', opacity: '1'},
                },
                'planet-spin-pulse': {
                    '0%':   { transform: 'rotate(0deg) scale(1)' },
                    '50%':  { transform: 'rotate(180deg) scale(1.1)' },
                    '100%': { transform: 'rotate(360deg) scale(1)' },
                },
            },
            animation: {
                'rocket-launch': 'rocket-launch 2s ease-out forwards',
                'planet-spin-pulse': 'planet-spin-pulse 12s ease-in-out infinite',
            },
            backgroundImage: {
                'space': "url('../../public/images/space-vector.png')",
                'stars': "url('../../public/images/stars-vector.png')",
            },
            screens: {
                'xxs': '360px',
                'xs': '425px',
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                // '2xl': '1536px',
                // '3xl': '1936px',
            },
            fontSize: {
                'xxs': '.65rem',
                'xs': '.75rem',
                'sm': '.875rem',
                'tiny': '.875rem',
                'base': '1rem',
                'lg': '1.125rem',
                'xl': '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
                '6xl': '4rem',
                '7xl': '5rem',
            },
            colors: {
                ...colors,
                // primary: '#01030F', //  for stars background
                primary: '#0A0B16',  // for space background
            },
            boxShadow: {
                // shadowLgCstm: '0 0 4px rgba(0, 0, 0, 0.07)',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
