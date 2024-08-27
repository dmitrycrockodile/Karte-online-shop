import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
        // Define aliases for image imports to resolve the correct path
        'assets': 'src/assets/',
        '@': path.resolve(__dirname, 'src'),
    },
  },
  rules: [
    // Add a rule to handle image imports
    {
        test: /\.(png|jpe?g|gif|svg)$/i,
        type: 'asset/resource',
    },
  ],
})