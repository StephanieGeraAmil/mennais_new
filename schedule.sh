#!/bin/bash
cd /home/u370571502/domains/audec.org/public_html && php artisan schedule:run >> /dev/null 2>&1
