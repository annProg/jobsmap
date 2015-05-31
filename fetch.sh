#!/bin/bash

#URL="http://www.lagou.com/jobs/list_%E8%BF%90%E7%BB%B4%E5%B7%A5%E7%A8%8B%E5%B8%88?kd=%E8%BF%90%E7%BB%B4%E5%B7%A5%E7%A8%8B%E5%B8%88&spc=1&pl=&gj=&xl=&yx=15k-25k&gx=&st=&labelWords=&lc=&workAddress=&city=%E5%8C%97%E4%BA%AC&requestId=&pn=$page"

URL="http://www.lagou.com/jobs/list_%E8%BF%90%E7%BB%B4%E5%B7%A5%E7%A8%8B%E5%B8%88?kd=%E8%BF%90%E7%BB%B4%E5%B7%A5%E7%A8%8B%E5%B8%88&spc=1&pl=&gj=&xl=&yx=&gx=&st=&labelWords=&lc=&workAddress=&city=%E5%8C%97%E4%BA%AC&requestId=&pn="
echo >links.data

for page in $(seq 1 31)
do
	echo "$URL$page"
	curl -s "$URL$page" |grep jobs |grep title \
	| awk -F "\"" '{print $2}' |tee -a links.data
done
