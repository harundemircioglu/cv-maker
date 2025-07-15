/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#449399",
                secondary: "#313C4E",
                secondaryGray: "#989DA6",
            },
            fontFamily: {
                ubuntuRegular: ["ubuntu-regular", "sans-serif"],
                ubuntuMedium: ["ubuntu-medium", "sans-serif"],
                ubuntuLight: ["ubuntu-light", "sans-serif"],
                ubuntuBold: ["ubuntu-bold", "sans-serif"],
            },
        },
    },
    plugins: [],
};
