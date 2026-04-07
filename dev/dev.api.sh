#!/bin/bash

ip_address=$(ipconfig.exe 2>/dev/null | grep -v 'vEthernet\|Hyper-V' | grep -A 10 'Wireless LAN adapter\|Ethernet adapter' | grep -im1 'IPv4 Address' | head -1 | cut -d ':' -f2 | tr -d '[:space:]')

echo "Local IP Address: $ip_address"

if [ -z "$ip_address" ]; then
  echo "No local IP address found via ipconfig. Trying linux style IP address extraction..."
  ip_address=$(ip -4 addr show | grep -oP '(?<=inet\s)\d+(\.\d+){3}' | grep -v '127\.0\.0\.1' | head -n 1)
fi

if [ -z "$ip_address" ]; then
  echo "No local IP address found. Please check your network connection."
  exit 1
fi

npx concurrently -c \
"#ff0000,#93c5fd,#c4b5fd,#fdba74,#32a852" \
"php artisan queue:listen redis" \
"php artisan serve --host=$ip_address" \
"npm run dev -- --host=$ip_address" \
"php artisan reverb:start" \
"php artisan schedule:work" \
--names=""\
"           redis            ,"\
"          server           ,"\
"           vite            ,"\
"          reverb           ,"\
"         schedule          ,"
