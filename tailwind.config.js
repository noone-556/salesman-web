export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/views/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#f0fdfa',
          100: '#ccfbf1',
          500: '#14b8a6',
          600: '#0d9488',
          700: '#0f766e',
          800: '#115e59',
          900: '#134e4a'
        },
        navy: {
          800: '#1e293b',
          900: '#0f172a'
        },
      }
    }
  },
  plugins: [],
}