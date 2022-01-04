#!/usr/bin/env bash

set -eu

rsync --version

# Change owner as docker generated files
# are usually owned by root
sudo chown "${USER}:" . -R

echo "Deploying site..."

if [[ "${TRAVIS_BRANCH}" != "main" && "${TRAVIS_BRANCH}" != "develop" ]]; then
    exit 0
fi

if [[ "${TRAVIS_PULL_REQUEST}" != "false" ]]; then
    exit 0
fi

FOLDER="idh-demo.tc.akvo.org"
if [[ "${TRAVIS_BRANCH}" == "main" ]]; then
    FOLDER="idh-prod.tc.akvo.org"
    echo "Deploying Production"
else
    echo "Deploying Test"
fi

echo "===================================================="
echo "START SYNC ${FOLDER}"
rsync \
    --archive \
    --compress \
    --progress \
    --exclude=ci \
    --exclude=node_modules \
    --rsh="ssh -i ${SITES_SSH_KEY} -o BatchMode=yes -p 18765 -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no" \
    . u7-nnfq7m4dqfyx@35.214.170.100:/home/customer/www/$FOLDER/public_html/

echo "Fixing permissions..."

ssh -i "${SITES_SSH_KEY}" -o BatchMode=yes \
    -p 18765 \
    -o UserKnownHostsFile=/dev/null \
    -o StrictHostKeyChecking=no \
    u7-nnfq7m4dqfyx@35.214.170.100 "find www/${FOLDER}/public_html/ -not -path "*.well-known*" -type f -print0 | xargs -0 -n1 chmod 644"

ssh -i "${SITES_SSH_KEY}" -o BatchMode=yes \
    -p 18765 \
    -o UserKnownHostsFile=/dev/null \
    -o StrictHostKeyChecking=no \
    u7-nnfq7m4dqfyx@35.214.170.100 "find www/${FOLDER}/public_html/ -type d -print0 | xargs -0 -n1 chmod 755"

echo "Copy the config..."

ssh -i "${SITES_SSH_KEY}" -o BatchMode=yes \
    -p 18765 \
    -o UserKnownHostsFile=/dev/null \
    -o StrictHostKeyChecking=no \
    u7-nnfq7m4dqfyx@35.214.170.100 "cp ~/env/${FOLDER} www/${FOLDER}/public_html/.env"

echo "Clearing cache..."

ssh -i "${SITES_SSH_KEY}" -o BatchMode=yes \
    -p 18765 \
    -o UserKnownHostsFile=/dev/null \
    -o StrictHostKeyChecking=no \
    u7-nnfq7m4dqfyx@35.214.170.100 "cd www/${FOLDER}/public_html/ && /usr/local/bin/php73 artisan cache:clear"

echo "Migrating database - ${FOLDER}"

ssh -i "${SITES_SSH_KEY}" -o BatchMode=yes \
    -p 18765 \
    -o UserKnownHostsFile=/dev/null \
    -o StrictHostKeyChecking=no \
    u7-nnfq7m4dqfyx@35.214.170.100 "cd www/${FOLDER}/public_html/ && /usr/local/bin/php73 artisan migrate --force --no-interaction"

echo "===================================================="
echo "Done deploying ${FOLDER}"
