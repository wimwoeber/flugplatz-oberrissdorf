#!/bin/bash
# Deploy-Script fuer Plesk Git-Integration
# Wird nach jedem git pull automatisch ausgefuehrt

set -e

echo "=== Flugplatz Oberrissdorf Deploy ==="
echo "Node: $(node --version)"
echo "NPM: $(npm --version)"

# Abhaengigkeiten installieren
npm install --production=false

# Astro Build
npm run build

echo "=== Build erfolgreich ==="
echo "Dateien in dist/:"
ls -la dist/
