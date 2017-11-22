#!/bin/sh
phpunit -c data
data/vendor/bin/behat
data/vendor/bin/phploc data/src