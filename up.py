#!/usr/bin/python
import json, requests, time, os, subprocess

url = 'http://rms.rotronic.com/rmsService/wService3.DeviceService.svc/UpdateDataJson'

headers = {'Content-Type' : 'Application/json', 'Expect' : '100-continue', 'Connnection' : 'Close', 'Host' : 'rms.rotronic.com'}


proc1 =   subprocess.Popen("/home/pi/Tempreture-logger/hum.php", stdout=subprocess.PIPE)
output = proc1.stdout.read()
temp1 = output
Value1 = temp1

proc =   subprocess.Popen("/home/pi/Tempreture-logger/ther.php", stdout=subprocess.PIPE)
output = proc.stdout.read()
temp = output.rstrip('\n')



Value2 = temp



payload = {'DeviceId':'2688','Name':'"stove"','Serial':'123456','Token':'-471754004','Values': \

                [{'Index':'1','Value':Value1 },{'Index':'2','Value':Value2 }]}

print (payload)

r = requests.post(url, headers=headers, data =json.dumps (payload)) 
