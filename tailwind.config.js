module.exports = {
  purge: ['./public/**/*.html', './src/**/*.vue'],
  darkMode: false, // or 'media' or 'class',
  theme: {
    extend: {
      zIndex: {
        '-10': '-10',
       },
       colors:{
         tfa_primary:'#37218E'
       }
    },
  },
  variants: {
    extend: {
      opacity: ['disabled']
    },
  },
  plugins: [],
}
