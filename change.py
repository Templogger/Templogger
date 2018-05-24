#!/usr/bin/python

import binascii
import time
import mraa
import smbus
import sys




def I2C_setup(i2c_channel_setup):
    bus = smbus.SMBus(1)
    bus.write_byte(0x70,2**i2c_channel_setup)
    time.sleep(0.01)

def _rst():
	 bus = smbus.SMBus(1)
	 bus.write_byte(0x70,0)
	 


I2C_setup(int(sys.argv[1]))		
