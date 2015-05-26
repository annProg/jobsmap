#!/bin/bash
[ $# -lt 1 ] && exit 1
file=$1
while read id
do
	curl $id
done <$file
