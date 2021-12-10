const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
    "./resources/views/front/**/*.blade.php",
    "./resources/views/components/alert.blade.php",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        ...colors,
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/line-clamp'),
  ],
}
