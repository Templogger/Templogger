#!/usr/bin/python
import json, requests, time, os, subprocess

url = 'http://rms.rotronic.com/rmsService/wService3.DeviceService.svc/UpdateDataJson'

headers = {'Content-Type' : 'Application/json', 'Expect' : '100-continue', 'Connnection' : 'Close', 'Host' : 'rms.rotronic.com'}


proc1 =   subprocess.Popen("/home/pi/Tempreture-logger/hum.php", stdout=subprocess.PIPE)
output1 = proc1.stdout.read()
temp1 = output1
Value1 = temp1

proc =   subprocess.Popen("/home/pi/Tempreture-logger/tmpw.php", stdout=subprocess.PIPE)
output = proc.stdout.read()

temp2 = output.rstrip('\n')
tempp = float(temp2)
flo = str(round(tempp,2))

Value2 = flo

proc =   subprocess.Popen("/home/pi/Tempreture-logger/Si1.php", stdout=subprocess.PIPE)
output = proc.stdout.read()
temp3 = output.rstrip('\n')
tempfr = float(temp3)
Value3 = tempfr

proc =   subprocess.Popen("/home/pi/Tempreture-logger/pre.php", stdout=subprocess.PIPE)
output = proc.stdout.read()

temp4 = output
temppp = float(temp4)
Value4 = temppp


proc =   subprocess.Popen("/home/pi/Tempreture-logger/therm.php", stdout=subprocess.PIPE)
output = proc.stdout.read()

temp = output


Value5 = temp



payload = {'DeviceId':'2703','Name':'"logger"','Serial':'001','Token':'1254621462','Values': \

                [{'Index':'1','Value':Value1 },{'Index':'2','Value':Value2 },{'Index':'3','Value':Value3 },{'Index':'4','Value':Value4 },{'Index':'5','Value':Value5 }]}

print (payload)

r = requests.post(url, headers=headers, data =json.dumps (payload)) 
