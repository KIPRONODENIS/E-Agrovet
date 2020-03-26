module.exports = {
  important: true,
  theme: {
    fontFamily: {
      display: ['Gilroy', 'sans-serif'],
      body: ['Graphik', 'sans-serif'],
    },
    extend: {
      colors: {
        cyan: '#9cdbff',
      },

    }
  },
  variants: {
    opacity: ['responsive', 'hover']
  },
  plugins: [
    require('./node_modules/tailwind-percentage-heights-plugin')(),
]
}
