#!/bin/bash

RED="\033[1;31m"
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
CYAN="\033[1;36m"
RESET="\033[0m"

if [ ! -f next_session.id ]; then
	echo -e "${RED}next_session.id file does not exist. cannot continue: please manually edit or recreate the file.${RESET}"
	exit 1
fi

if [ ! -f next_session.date ]; then
	echo -e "${RED}next_session.date file does not exist. cannot continue; please manually edit or recreate the file.${RESET}"
	exit 1
fi

nid=`cat next_session.id`
ndate=`cat next_session.date`
if [ -f ../contents/entries/${nid}.php ]; then
	echo -e "${RED}session already exists. cannot continue: please manually edit next_session.id file.${RESET}"
	exit 1
fi

cd ../contents/entries/
touch ${nid}.php

echo -e "<div class=\"type\">" >> ${nid}.php
echo -e "\tSession" >> ${nid}.php
echo -e "</div>" >> ${nid}.php
echo -e "" >> ${nid}.php
echo -e "<div class=\"title\">" >> ${nid}.php
echo -e "" >> ${nid}.php
echo -e "</div>" >> ${nid}.php
echo -e "" >> ${nid}.php
echo -e "<div class=\"subject\">" >> ${nid}.php
echo -e "نامشخص" >> ${nid}.php
echo -e "</div>" >> ${nid}.php
echo -e "" >> ${nid}.php
echo -e "<div class=\"date\">" >> ${nid}.php
echo -e ${ndate} >> ${nid}.php
echo -e "</div>" >> ${nid}.php
echo -e "" >> ${nid}.php
echo -e "<div class=\"body\">" >> ${nid}.php
echo -e "موضوع جلسه‌ی آینده ما هنوز نامشخص است. در صورت تمایل به ارائه مطلب یا مدیریت بحث آزاد موضوع را با لیست پستی گروه در میان بگذارید." >> ${nid}.php
echo -e "<br />" >> ${nid}.php
echo -e "<br />" >> ${nid}.php
echo -e "</div>" >> ${nid}.php

let nid_r=${nid}+1
# echo $nid_r
ndate_ts=`jdate +%s -d "%Y/%m/%d;"${ndate}`
# echo $ndate_ts
ndate_ts_r=`echo $ndate_ts + 1209600 | bc`
# echo $ndate_ts_r
ndate_r=`jdate +%Y/%m/%d -d "%s;"${ndate_ts_r}`
# echo $ndate_r

cd ../../scripts/
echo $nid_r > next_session.id
echo $ndate_r > next_session.date

echo -e "${GREEN}session file created successfully. review your changes.${RESET}"
exit 0
