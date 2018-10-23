#!/usr/bin/python3           # This is client.py file

import socket

# create a socket object
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM) 

# get local machine name
host = '127.0.0.1'                          

port = 9993

# connection to hostname on the port.
s.connect((host, port))                               

# Receive no more than 1024 bytes
msg = s.recv(1024)                                     
typ = 'pop3' 
#s.send(typ)


s.send(typ.encode('ascii'))


mails = s.recv(2048)

f=open("istemci_mail.txt", "a+")
f.write(mails.decode('ascii')+ "\r\n")
f.close()

f=open("istemci_mail.txt", "r")
local =f.read()
print(local)

s.close()

print (msg.decode('ascii'))
