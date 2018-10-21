#!/usr/bin/python3           # This is client.py file

import socket

# create a socket object
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM) 

# get local machine name
host = socket.gethostname()                           

port = 9994

# connection to hostname on the port.
s.connect((host, port))                               

# Receive no more than 1024 bytes
msg = s.recv(2048)
print str((msg.decode('ascii')))
mail = raw_input("-->")

while mail != 'q':
	s.send(mail)
	data =s.recv(2048)
	print "sonuc" + str(data)
	mail = raw_input("-->")

s.close()

