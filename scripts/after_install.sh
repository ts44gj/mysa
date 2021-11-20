#!/bin/bash

set -eux

cd ~/mysa
php artisan migrate --force
php artisan config:cache
