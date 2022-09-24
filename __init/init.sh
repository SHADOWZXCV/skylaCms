#!/bin/bash
USERNAME=$1
PW=$2
SCRIPT_PATH=$(dirname $(realpath -s "$0"))

echo "Backing up old database if exists...";
sudo mysqldump -u$USERNAME -p$PW skylaCms > $SCRIPT_PATH/backup.sql 2>> sql_tables.log
echo "Adding MYSQL tables...";
sudo mysql -u$USERNAME -p$PW skylaCms < $SCRIPT_PATH/tables.sql 2>> sql_tables.log

echo "Done with tables!"