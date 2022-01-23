#!/bin/sh

docker run \
    --rm \
    -i \
    --network=host \
    -v "$HOME":"$HOME":ro \
    -u $(id -u) \
    -w "$PWD" \
    php:5.6-fpm \
    php "$@"

exit $?