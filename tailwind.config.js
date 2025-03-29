/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{html,js,php}",
    "./src/**/*.{html,js,php}"
  ],
  theme: {
    extend: {
      colors: {
        'law-gold': '#C5A572',
        'law-navy': '#1B2634',
        'law-gray': '#F5F5F5',
      },
      fontFamily: {
        'crimson': ['Crimson Text', 'serif'],
        'inter': ['Inter', 'sans-serif'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}