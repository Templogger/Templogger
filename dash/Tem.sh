 #!/bin/sh
 


tv="$(i2cset -y  1 0x45 0x22 0x2B; i2cset -y 1 0x45 0xE0 0x00; i2cget -y 1 0x45 0x00 w)"
sleep 0.5
th="$(i2cget -y 1 0x45 0x00 w)"
echo $tv
echo $th
t="$(($tv))"
echo $t

awk "BEGIN {print 175*($tv/65535)-45}"

i2cset -y  1 0x45 0x30 0x93
