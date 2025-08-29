import { defineConfig } from "vite"
import tailwindcss from "tailwindcss"
import autoprefixer from "autoprefixer"
import { resolve } from "path"

export default defineConfig({
  // plugins: [
  //   visualizer({
  //     filename: "bundle-report.html", // file saved in dist
  //     template: "treemap",            // "sunburst", "network", "treemap"
  //     open: true,                     // auto-open after build
  //   }),
  // ],
  css: {
    postcss: {
      plugins: [
        tailwindcss(),      // process your @tailwind rules
        autoprefixer(),    // add vendor prefixes
      ],
    },
  },
  build: {
    outDir: "dist",
    emptyOutDir: true,
    rollupOptions: {
      treeshake: true, // ensures dead code is removed
      input: {
        app: resolve(__dirname, "src/app.js"),
        "app.css": resolve(__dirname, "src/app.css"),
      },
      output: {
        entryFileNames: "[name].min.js",
        chunkFileNames: "[name]-[hash].js",
        assetFileNames: (assetInfo) => {
          if (assetInfo.name && assetInfo.name.endsWith(".css")) {
            return "[name].min.css";
          }
          return "fonts/[name][extname]"; // fonts, images, etc.
        },
        manualChunks: {
          aos: ["aos"], // separate AOS for better caching
        }
      },
    },
    minify: "esbuild", // smaller + faster
  },
})