#!/bin/bash

# Define green color
GREEN='\033[0;32m'
# Reset color
NC='\033[0m'

# Print banners
echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}Checking for linting errors...${NC}"
echo -e "${GREEN}========================================${NC}"

echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}Running Pint...${NC}"
echo -e "${GREEN}========================================${NC}"

./vendor/bin/pint --repair --parallel
