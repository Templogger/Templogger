#!/usr/bin/python

from smbus2 import SMBus
import time
import sys
import smbus

bus = SMBus(1)
m = int(-1)
n = int(-1)

def I2C_setup(i2c_channel_setup):
    bus = smbus.SMBus(1)
    bus.write_byte(0x70,2**i2c_channel_setup)
    time.sleep(0.1)
    
def I2C_setup2(i2c_channel_setup):
    bus = smbus.SMBus(1)
    bus.write_byte(0x71,2**i2c_channel_setup)
    time.sleep(0.1)

def _rst():
	 bus = smbus.SMBus(1)
	 bus.write_byte(0x70,0)
	 
def sensors():
	 try:
		bus.write_byte_data(0x45, 0x24, 0x00)
		s ="SHT31-D Humidity"
	 except Exception:
		i = 0
	 try:
		bus.write_byte_data(0x40, 0x24, 0x00)
		s = "SI7051 Temperature"
	 except Exception:	
		i = 0
	 try:
		bus.write_byte_data(0x44, 0x24, 0x00)
		s = "OPT3001 lux"
	 except Exception:
		i = 0
	 try:
		bus.write_byte_data(0x77, 0x24, 0x00)
		s ="BMP085 Pressure"
	 except Exception:
		i = 0
	 return(s)
if __name__ == "__main__":
		
		
			
	while (m < 7):
		m = int(m) + 1

		I2C_setup(m)
		try:
			print(str(m) +" " + sensors())
		except Exception:
			w = 0
			
			
	while (n < 7):
		n = int(n + 1)
		try:
			I2C_setup2(m)
		except Exception:
			sys.exit()
		try:
			print(str(m) +" " + sensors())
		except Exception:
			w = 0
