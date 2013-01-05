#!/bin/bash

RED="\033[1;31m"
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
CYAN="\033[1;36m"
RESET="\033[0m"

supported_formats=( "jpg" "png" "jpeg" )
dimension="500x400"

function printk() {
    local STAT=$1

    if [ $1 -eq 0 ]; then
        echo -e "${GREEN}ok${RESET}"
    else
        echo -e "${RED}failed${RESET}"
    fi
}

echo -ne "${GREEN} Checking for ImageMagick... ${RESET}"
CONVERT=`which convert`
stat=$?
printk $stat
if [ $stat -ne 0 ]; then
	exit 1
fi

echo -ne "${GREEN} Switching to photos directory... ${RESET}"
cd photos/
stat=$?
printk $stat
if [ $stat -ne 0 ]; then
	exit 1
fi

for i in `find . -iregex .*jpg`; do
	path=$(dirname "$i")
	name=$(basename "$i")
	ext="${name##*.}"
	base="${name%.*}"
	thumb=$base"_thumb."$ext
	# echo "path: $path, full: $name, ext: $ext, base: $base, thumb: $thumb"
	if [[ $name =~ "_thumb.$ext" ]]; then
		continue
	fi

	if [[ $supported_formats =~ $ext ]]; then
		if [ -e $path/$thumb ]; then
			echo -e "${YELLOW}$name already has a thumbnail. skipping.${RESET}"
			continue
		else
			echo -ne "${CYAN}$name is a photo. converting... ${RESET}"
			$CONVERT $path/$name -resize '500x400' $path/$thumb
			printk $?
		fi
	else
		echo -e "${YELLOW}$name is not a photo. skipping.${RESET}"
		continue
	fi
done
