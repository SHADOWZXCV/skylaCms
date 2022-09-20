#!/bin/bash
USERNAME=root
PW=Zxc01154564748.
SCRIPT_PATH=$(dirname $(realpath -s "$0"))

sudo mysql -u$USERNAME -p$PW skylaCms < $SCRIPT_PATH/tables.sql
sudo mysql -u$USERNAME -p$PW skylaCms < $SCRIPT_PATH/admins.sql