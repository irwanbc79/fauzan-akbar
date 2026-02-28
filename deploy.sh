#!/bin/bash
# ============================================================
# Deploy Script – Sahabat Ilmu PMI
# Domain : fauzan-akbar.org
# Server : Hostinger Shared Hosting
# ============================================================

set -e

# ── Configuration ────────────────────────────────────────────
SERVER_USER="u301249154"
SERVER_HOST="31.97.104.23"
SERVER_PORT="65002"
SERVER_PATH="~/domains/fauzan-akbar.org/laravel"
PHP="/opt/alt/php84/usr/bin/php"
COMPOSER="/opt/alt/php84/usr/bin/composer.phar"

# ── Colors ───────────────────────────────────────────────────
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

info()  { echo -e "${GREEN}[✓]${NC} $1"; }
warn()  { echo -e "${YELLOW}[!]${NC} $1"; }
error() { echo -e "${RED}[✗]${NC} $1"; exit 1; }

# ── Pre-flight checks ───────────────────────────────────────
command -v sshpass >/dev/null 2>&1 || error "sshpass is required. Install: brew install sshpass"
command -v npm     >/dev/null 2>&1 || error "npm is required."

# ── Step 1: Build frontend assets locally ────────────────────
info "Building frontend assets..."
npm run build
info "Assets built successfully."

# ── Step 2: SSH command helper ───────────────────────────────
SSH_CMD="sshpass -p '${DEPLOY_PASS}' ssh -o StrictHostKeyChecking=no -p ${SERVER_PORT} ${SERVER_USER}@${SERVER_HOST}"
SCP_CMD="sshpass -p '${DEPLOY_PASS}' scp -o StrictHostKeyChecking=no -P ${SERVER_PORT}"

if [ -z "$DEPLOY_PASS" ]; then
    echo -n "Enter server password: "
    read -s DEPLOY_PASS
    echo ""
    SSH_CMD="sshpass -p '${DEPLOY_PASS}' ssh -o StrictHostKeyChecking=no -p ${SERVER_PORT} ${SERVER_USER}@${SERVER_HOST}"
    SCP_CMD="sshpass -p '${DEPLOY_PASS}' scp -o StrictHostKeyChecking=no -P ${SERVER_PORT}"
fi

remote() {
    eval "${SSH_CMD} '$1'"
}

# ── Step 3: Pull latest code on server ───────────────────────
info "Pulling latest code from GitHub..."
remote "cd ${SERVER_PATH} && git pull origin main"
info "Code updated."

# ── Step 4: Install/update Composer dependencies ─────────────
info "Installing Composer dependencies..."
remote "cd ${SERVER_PATH} && ${PHP} ${COMPOSER} install --no-dev --optimize-autoloader --no-interaction 2>&1"
info "Dependencies installed."

# ── Step 5: Upload build assets ──────────────────────────────
info "Uploading build assets..."
eval "${SCP_CMD} -r public/build ${SERVER_USER}@${SERVER_HOST}:${SERVER_PATH}/public/"
info "Build assets uploaded."

# ── Step 6: Run migrations ───────────────────────────────────
info "Running database migrations..."
remote "cd ${SERVER_PATH} && ${PHP} artisan migrate --force"
info "Migrations complete."

# ── Step 7: Clear and rebuild caches ─────────────────────────
info "Rebuilding caches..."
remote "cd ${SERVER_PATH} && ${PHP} artisan config:cache && ${PHP} artisan route:cache && ${PHP} artisan view:cache && ${PHP} artisan event:cache"
info "Caches rebuilt."

# ── Step 8: Restart queues (if applicable) ───────────────────
# remote "cd ${SERVER_PATH} && ${PHP} artisan queue:restart"

# ── Step 9: Storage link & permissions ───────────────────────
remote "cd ${SERVER_PATH} && ${PHP} artisan storage:link 2>/dev/null; chmod -R 775 storage bootstrap/cache"
info "Permissions set."

# ── Done ─────────────────────────────────────────────────────
echo ""
info "🚀 Deployment complete! Visit: https://fauzan-akbar.org"
echo ""
