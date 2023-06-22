#!/bin/bash

DOCS_VERSIONS=(
  main
  2.4.6
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/docs/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/docs/$v && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" https://github.com/DavidLambauer/devdocs.git "resources/docs/$v"
        cp storage/navigation/$v/documentation.md "resources/docs/$v/"
    fi;
done
