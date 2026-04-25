import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'

const isCodespaces = process.env.CODESPACES === 'true'
const codespaceName = process.env.CODESPACE_NAME
const forwardingDomain = process.env.GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN

const codespacesHost =
  isCodespaces && codespaceName && forwardingDomain
    ? `${codespaceName}-5173.${forwardingDomain}`
    : null

export default defineConfig({
  plugins: [
    tailwindcss(),
    laravel([
      'resources/css/app.css',
      'resources/js/app.js',
    ]),
  ],
  server: isCodespaces
    ? {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,

        // Důležité: URL generované do HTML nebudou localhost
        origin: `https://${codespacesHost}`,

        // Důležité pro HMR websocket
        hmr: {
          protocol: 'wss',
          host: codespacesHost,
          clientPort: 443,
        },
      }
    : undefined,
})