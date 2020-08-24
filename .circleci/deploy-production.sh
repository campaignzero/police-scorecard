#!/usr/bin/env bash

cat >> ~/.ssh/config  << EOF
VerifyHostKeyDNS yes
StrictHostKeyChecking no
EOF

ssh -T staywoke@policescorecard.org << EOF

echo -e "\n\033[38;5;34m✓ Police Scorecard › Starting Production Deployment\033[0m\n"

export API_NODE_ENV=production

echo -e "\n\033[38;5;34m✓ Police Scorecard › Updating Production Repository\033[0m\n"

cd /var/www/policescorecard.org/html

git fetch --tags

if [ -n "$(git describe --tags $(git rev-list --tags --max-count=1))" ]; then
    echo -e "\n\033[38;5;34m✓ Police Scorecard › Preparing to Upgrade to $(git describe --tags $(git rev-list --tags --max-count=1))\033[0m\n"

    git reset --hard
    git stash
    git checkout $(git describe --tags $(git rev-list --tags --max-count=1))

    echo -e "\n\033[38;5;34m✓ Police Scorecard › Update NPM Packages\033[0m\n"

    npm install --no-optional

    echo -e "\n\033[38;5;34m✓ Police Scorecard › Update Composer Packages\033[0m\n"

    composer install

    echo -e "\n\033[38;5;34m✓ Police Scorecard › Compile Static Assets\033[0m\n"

    npm run -s prod

    echo -e "\n\033[38;5;34m✓ Police Scorecard › Reset Cache\033[0m\n"

    npm run -s clear-cache
else
  echo -e "\n\033[38;5;34m✓ Police Scorecard › No Tagged Release\033[0m\n"
fi

echo -e "\n\033[38;5;34m✓ Police Scorecard › Production Deployment Complete\033[0m\n"

EOF
