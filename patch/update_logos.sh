#!/bin/bash

set -x -e

STORED_PATH=`pwd`

CMD_PATH=`dirname $0`
cd ${CMD_PATH}

TARGET=root@47.100.177.216

if [ -n "$2" ]; then
    TARGET=$2
fi

PC_SRC=./temp/logos/pc/logo.png
NORMAL_SRC=./temp/logos/normal/logo.png
TOUCH_SRC=./temp/logos/touch/logo.png

PC_LOGO=upload/static/image/common/logo.png
NORMAL_LOGO=upload/static/image/mobile/logo.png
TOUCH_LOGO=upload/static/image/mobile/images/logo.png

if [ xCP==x"$1" ]; then
    cp -f $PC_SRC ../$PC_LOGO
    cp -f $NORMAL_SRC ../$NORMAL_LOGO
    cp -f $TOUCH_SRC ../$TOUCH_LOGO
fi

scp $PC_SRC ${TARGET}:/data/wwwroot/discuz/$PC_LOGO
scp $NORMAL_SRC ${TARGET}:/data/wwwroot/discuz/$NORMAL_LOGO
scp $TOUCH_SRC ${TARGET}:/data/wwwroot/discuz/$TOUCH_LOGO

cd ${STORED_PATH}
