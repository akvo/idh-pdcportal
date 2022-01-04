#!/usr/bin/env bash

set -eu

#cp .env.prod .env

docker run \
       --rm \
       --volume "$(pwd):/home/tcakvo/public_html/idh-dashboard" \
       --workdir /home/tcakvo/public_html/idh-dashboard \
       --entrypoint /bin/sh \
       composer:1.10.17 -c 'composer install'

docker run \
       --rm \
       --volume "$(pwd):/home/tcakvo/public_html/idh-dashboard" \
       --workdir /home/tcakvo/public_html/idh-dashboard \
       --entrypoint /bin/sh \
       composer:1.10.17 -c 'composer dump-autoload'

docker run \
       --rm \
       --volume "$(pwd):/home/tcakvo/public_html/idh-dashboard" \
       --workdir "/home/tcakvo/public_html/idh-dashboard" \
       --entrypoint /bin/sh \
       node:14-alpine -c 'npm i && npm run prod'

ls -al

grep -rl 'mix' ./resources | xargs sed -i 's/mix/asset/g'
