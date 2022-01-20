#!/bin/bash
USERNAME="bupt"
TBNAME1="bupt.ykg2050911_i"
# TBNAME2="bupt.ykg2050911_s"
DATE=$(date +%Y%m%d)
mysql -u $USERNAME -e "alter table "$TBNAME1" add column \`"$DATE"\` tinyint(1) default 0;"
# mysql -u $USERNAME -e "alter table "$TBNAME2" add column \`"$DATE"\` tinyint(1) default 0;"
# /etc/crontab
# 0 0,12 * * * cd /home/wwwroot/www.intelclass.org;./makeColumn.sh