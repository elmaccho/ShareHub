import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Fontawesome from '@fortawesome/fontawesome-free';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  optimizeDeps: {
    include: ['@fortawesome/fontawesome-free'],
  },
});
