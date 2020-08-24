#!/usr/bin/env bash

cat >> ~/.ssh/config  << EOF
VerifyHostKeyDNS yes
StrictHostKeyChecking no
EOF

ssh -T staywoke@dev.policescorecard.org << EOF

echo -e "\n\033[38;5;34m✓ Police Scorecard › Starting Development Deployment\033[0m\n"

echo -e "\n\033[38;5;34m✓ Police Scorecard › Updating Development Repository\033[0m\n"

cd /var/www/staging.policescorecard.org/html

git reset --hard
git stash
git checkout --force staging
git fetch
git pull

echo -e "\n\033[38;5;34m✓ Police Scorecard › Update NPM Packages\033[0m\n"

npm install --no-optional

echo -e "\n\033[38;5;34m✓ Police Scorecard › Update Composer Packages\033[0m\n"

composer install

echo -e "\n\033[38;5;34m✓ Police Scorecard › Compile Static Assets\033[0m\n"

npm run -s dev

echo -e "\n\033[38;5;34m✓ Police Scorecard › Reset Cache\033[0m\n"

npm run -s clear-cache

echo -e "\n\033[38;5;34m✓ Police Scorecard › Development Deployment Complete\033[0m\n"

EOF
