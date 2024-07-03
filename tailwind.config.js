import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                "text-base-font-normal": "Inter",
                poppins: "Poppins",
            },
            colors: {
                white: "#fff",
                "grays-gray-6": "#f2f2f7",
                slategray: "#6b7280",
                "gray-900": "#111928",
                "gray-50": "#f9fafb",
                "purple-600": "#7e3af2",
                darkorchid: "#a361ff",
                "gray-200": "#e5e7eb",
                darkslategray: "#333",
                "gray-800": "#1f2a37",
            },
            spacing: {},
            borderRadius: {
                "81xl": "100px",
            },
        },
        fontSize: {
            base: "16px",
            "5xl": "24px",
            lgi: "19px",
            sm: "14px",
            "29xl": "48px",
            "10xl": "29px",
            "19xl": "38px",
            xl: "20px",
            "17xl": "36px",
            "41xl": "60px",
            inherit: "inherit",
        },
        screens: {
            lg: {
                max: "1200px",
            },
            mq1050: {
                raw: "screen and (max-width: 1050px)",
            },
            mq750: {
                raw: "screen and (max-width: 750px)",
            },
            mq450: {
                raw: "screen and (max-width: 450px)",
            },
        },
    },

    plugins: [forms],
};
