module.exports = {
    content: [
        './resources/**/*.blade.php', // Все Blade-файлы в resources
        './resources/views/components/**/*.blade.php', // Конкретно компоненты
        './resources/js/**/*.js', // JS-файлы
        './resources/js/**/*.vue', // Vue-файлы, если используются
    ],
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
