import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans]
      },
      colors: {
        'denim': {
          '50': '#f1f7fd',
          '100': '#dfecfa',
          '200': '#c6def7',
          '300': '#9ecaf2',
          '400': '#70adea',
          '500': '#4f8ee2',
          '600': '#3a72d6',
          '700': '#315fc6',
          '800': '#2d4da0',
          '900': '#29437f',
          '950': '#1d2a4e',
        },
      }
    },
  },

  plugins: [forms],
};
