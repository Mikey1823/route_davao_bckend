#!/bin/bash
npx concurrently -c \
"#93c5fd,#c4b5fd,#fdba74,#32a852,#32a881" \
"php artisan serve" \
"npm run dev" \
"php artisan reverb:start" \
"php artisan queue:listen redis" \
"php artisan schedule:work" \
--names=""\
"          server           ,"\
"           vite            ,"\
"          reverb           ,"\
"          redis            ,"\
"         schedule          ,"
