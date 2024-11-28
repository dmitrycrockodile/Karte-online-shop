import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path';

export default defineConfig({
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      // Define aliases for image imports to resolve the correct path
      '@': path.resolve(__dirname, 'src'),
      'assets': 'src/assets/',
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