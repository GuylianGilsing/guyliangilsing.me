/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/views/twig/**/*.{html,js,twig}"],
    theme: {
        extend: {
            colors: {
                "brand-primary": "#a071ff",
            }
        },
    },
    plugins: [],
}
