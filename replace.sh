#!/bin/sh
pwd
phpunit data
data/vendor/bin/behat
data/vendor/bin/phploc data/src