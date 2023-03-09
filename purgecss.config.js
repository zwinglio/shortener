module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue'
    ],
    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
  }