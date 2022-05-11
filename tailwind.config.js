const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        "my-gray": "#EFEFEF",
        "my-blue": "#428BCA",
        "my-light-blue": "#E0FFFF",
      },
    },
  },

  plugins: [require("@tailwindcss/forms")],
};
