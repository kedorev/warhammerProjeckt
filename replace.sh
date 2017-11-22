#!/bin/sh
cd data
phpunit
vendor/bin/behat
vendor/bin/phploc src