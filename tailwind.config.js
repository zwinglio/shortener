/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("daisyui")
  ],

  daisyui: {
    styled: true,
    themes: ["emerald", "bumblebee"],
    base: true,
    utils: true,
    logs: true,
    rtl: false,
  },
}
