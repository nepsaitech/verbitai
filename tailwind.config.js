/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    "./src/**/*.php",
    "*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        primary: ['Nunito', 'sans-serif'],
        secondary: ['Inter', 'sans-serif'],
        poppins: ['Poppins', 'sans-serif'],
        sfpro: ['SF Pro Text', 'sans-serif'],
        sfpro600: ['SF Pro Text Semibold', 'sans-serif'],
        sfpro700: ['SF Pro Text Bold', 'sans-serif'],
      },
      colors: {
        primary: '#5148F9',
        secondary: '#3DDED1',
      },
    },
  },
  plugins: [],
  safelist: [
    'mt-[45px]',
    'bottom-[22px]',
    'max-md:p-0',
    'max-[999px]:mb-0',
    'max-[1050px]:p-0',
    'max-[1050px]:mb-0',
    'max-[1050px]:max-w-[328px]',
    'max-[1050px]:mx-auto',
  ],
}