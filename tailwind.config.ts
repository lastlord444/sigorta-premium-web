import type { Config } from "tailwindcss";

const config: Config = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      colors: {
        background: "#030712",
        foreground: "#F8FAFC",
        surface: {
          50: "#0F1A30",
          100: "#0C1527",
          200: "#080E1B",
          300: "#050912",
        },
        navy: {
          950: "#030712",
          900: "#060D1F",
          850: "#09142E",
          800: "#0D1E42",
          700: "#142D63",
        },
        electric: {
          DEFAULT: "#0066FF",
          light: "#38BDF8",
          neon: "#00F0FF",
          glow: "rgba(0, 102, 255, 0.4)",
        },
        accent: {
          violet: "#8B5CF6",
          purple: "#6366F1",
          indigo: "#4F46E5",
        },
        silver: {
          100: "#F8FAFC",
          200: "#E2E8F0",
          300: "#CBD5E1",
          400: "#94A3B8",
          500: "#64748B",
        }
      },
      fontFamily: {
        sans: ["var(--font-sans)", "Plus Jakarta Sans", "Inter", "sans-serif"],
        serif: ["var(--font-serif)", "Playfair Display", "Cinzel", "serif"],
      },
      animation: {
        "marquee": "marquee 35s linear infinite",
        "marquee-reverse": "marquee-reverse 35s linear infinite",
        "pulse-subtle": "pulse-subtle 4s ease-in-out infinite",
        "shimmer": "shimmer 2.5s ease-in-out infinite",
        "float": "float 6s ease-in-out infinite",
      },
      keyframes: {
        marquee: {
          "0%": { transform: "translateX(0%)" },
          "100%": { transform: "translateX(-50%)" },
        },
        "marquee-reverse": {
          "0%": { transform: "translateX(-50%)" },
          "100%": { transform: "translateX(0%)" },
        },
        "pulse-subtle": {
          "0%, 100%": { opacity: "0.2" },
          "50%": { opacity: "0.4" },
        },
        shimmer: {
          "0%": { backgroundPosition: "-200% 0" },
          "100%": { backgroundPosition: "200% 0" },
        },
        float: {
          "0%, 100%": { transform: "translateY(0)" },
          "50%": { transform: "translateY(-10px)" },
        },
      },
      backgroundImage: {
        "radial-glow": "radial-gradient(circle at 50% 50%, rgba(0, 102, 255, 0.15), transparent 70%)",
        "radial-purple": "radial-gradient(circle at 50% 50%, rgba(139, 92, 246, 0.12), transparent 70%)",
      },
      borderWidth: {
        "0.5": "0.5px",
      }
    },
  },
  plugins: [],
};

export default config;
