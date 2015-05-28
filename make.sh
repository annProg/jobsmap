#!/bin/bash
[ $# -lt 1 ] && exit 1
file=$1
rm -f yunwei.txt
while read id
do
	date=`date +%s`
	curl -s $id -o $date.html
	name=`sed -n "/<h1 title/,/<\/h1>/p" $date.html |grep "<div" |awk -F '[>|<]' '{print $3}'`
	address=`grep "var address" $date.html |awk -F "\"" '{print $2}'`
	echo "$name        $address" >>yunwei.txt
	rm -f $date.html
done <$file
