#!/bin/bash
while :
do
  hn=$(hostname)
  var4='User:'
  var5=$var4$hn
  #ps -e -orss=,args= |awk '{print $1 " " $2 }'| awk '{tot[$2]+=$1;count[$2]++} END {for (i in tot) {print tot[i],i,count[i]}}' | sort -n | tail | while read line ; do curl --location --request POST 'http://monitor.pxo.ai/api/save' --header $var5 --header 'Content-Type: text/plain' --data $line; done
  ps -e -orss=,args= |awk '{print $1 " " $2 }'| awk '{tot[$2]+=$1;count[$2]++} END {for (i in tot) {print tot[i],i,count[i]}}' | sort -n | tail | while read line ; do curl --location --request POST 'http://monitor.pxo.ai/api/save' --header $var5 --header 'Content-Type: text/plain' --data "($line)"; done
  sleep 600
done
#ps -e -orss=,args= |awk '{print $1 " " $2 }'| awk '{tot[$2]+=$1;count[$2]++} END {for (i in tot) {print tot[i],i,count[i]}}' | sort -n | tail | while read line ; do echo 'baq' $line ; done
#ps -e -orss=,args= |awk '{print $1 " " $2 }'| awk '{tot[$2]+=$1;count[$2]++} END {for (i in tot) {print tot[i],i,count[i]}}' | sort -n | tail | while read line ; do curl --location --request POST 'http://monitor.pxo.ai/api/save' --header $var5 --header 'Content-Type: text/plain' --data $line; done
