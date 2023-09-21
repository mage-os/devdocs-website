#!/usr/bin/env bash

set -e

if [ ! -f "composer.json" ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

composer install

if [ ! -f ".env" ]; then
    cp .env.example .env
fi

php artisan key:generate

source .env
if [ -z "$TORCHLIGHT_TOKEN" ]; then
    # Colorized text for added visibility.
    echo "$(tput setaf 3)Please enter your Torchlight token. You can create it for free at https://torchlight.dev/$(tput sgr0)"
    read TORCHLIGHT_TOKEN_INPUT

    # Modify .env
    sed -i '' "s/TORCHLIGHT_TOKEN=/TORCHLIGHT_TOKEN=$TORCHLIGHT_TOKEN_INPUT/g" .env
    echo "Torchlight token set successfully!"
fi

source "$(dirname "$0")/checkout_latest_docs.sh"
npm install
npm run build
