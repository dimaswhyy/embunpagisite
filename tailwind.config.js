import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Open sans", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        blue: {
          light: '#CDE7F5',
          deepsky: '#00B1DB',
          DEFAULT: '#1C94D2',
          dark: '#063046',
        },
        green: {
          light: '#D0EBDA',
          DEFAULT: '#20A051',
        },
        orange: {
          light: '#F9D49C',
          DEFAULT: '#F09D20',
        },
        palegoldenrod: {
          DEFAULT: '#EEE8A9',
        },
        yellow: {
          light: '#F9F4B7',
        }
      }
    },
  },
  plugins: [],
};
