/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'azul-univ': '#2873b4',
        'azul-pedro': {
          '50': '#f3f7fc',
          '100': '#e5eff9',
          '200': '#c6ddf1',
          '300': '#93c1e6',
          '400': '#5aa1d6',
          '500': '#3484c3',
          '600': '#2873b4',
          '700': '#1f5485',
          '800': '#1d486f',
          '900': '#1d3d5d',
          '950': '#13283e',
        },

      },
      transitionProperty: {
        'max-height': 'max-height'
      },
    },
  },
  plugins: [],
}

