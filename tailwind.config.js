/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        'fun-blue': {
          '50': '#f1f7fe',
          '100': '#e2eefc',
          '200': '#bedcf9',
          '300': '#84bff5',
          '400': '#439fed',
          '500': '#1a82dd',
          '600': '#0d65bc',
          '700': '#0d59a7',
          '800': '#0e467e',
          '900': '#113c69',
          '950': '#0c2545',
        },
        'primary': '#0d65bc',
        'secundary': '#040C17',
        aspectRatio: {
          '2/1': '2 / 1',
        },
      },
    },
  },
  plugins: [],
}

