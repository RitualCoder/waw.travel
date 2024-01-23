/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./src/**/*.{html,js,php}", "./templates/**/*.{html,js,php}", "./lib/**/*.{html,js,php}"],
  theme: {
    colors: {
      'current': '#040512',
      'blue': '#63A9EB',
      'orange': '#F2963F',
      'white': '#FBFCFF',
      'black': '#040512',
      'filter': '#04051266',
      'red': '#F11C1C',
      'green': '#16C25B',
      'yellow': '#F2E320',
    },
    fontFamily: {
      'main': ['Montserrat', 'sans-serif'],
      'second': ['Kodchasan', 'sans-serif'],
      'sans': ['Montserrat', 'sans-serif',defaultTheme.fontFamily.sans]
    },
    boxShadow: {
      'main': '0px 0px 15px #00000040',
      'second': '0px 20px 15px #00000040',
      'null': '0 0 0 #0000'
    },
    borderRadius: {
      'main': '10px',
    },
    fontSize: {
      xxs: '.5rem',
      xs: '.75rem',
      sm: '1rem',
      base: '1.2rem',
      lg: '1.3rem',
      xl: '1.5rem',
      '2xl': '1.8rem',
      '3xl': '2rem',
      '4xl': '3rem',
      '5xl': '4rem',
      '6xl': '4.5rem',
    },
    extend: {
      backgroundImage: {
        'home': "url('images/home.jpg')",
        'roadtrips': "url('images/roadtrips.jpg')",
        'login': "url('images/login.jpg')",
        'register': "url('images/register.jpg')",
        'profil': "url('images/profil.jpg')",
      },
    },
  },
  future: {
    hoverOnlyWhenSupported: true,
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};
