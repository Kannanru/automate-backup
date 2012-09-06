#!/bin/bash
# Clean up the old backup files
rm -rf /var/www/vhosts/website/httpdocs/bk

#Make new directory
mkdir bk

# Source Folder
cd /var/www/vhosts/website/httpdocs/

# Dirs to backups
DIRS="/var/www/vhosts/website/httpdocs/site/"

# Save zip file elsewhere on the server
DEST="/var/www/vhosts/website/httpdocs/bk/"

#Path to binary files
ZIP=/usr/bin/zip
for d in $DIRS
do
zipfile="${DEST}/`date ‘+%Y%m%d’`.zip"
echo -n “Creating $zipfile…”

# create zip file
${ZIP} -r $zipfile $d &>/dev/null && echo "Done!"
done