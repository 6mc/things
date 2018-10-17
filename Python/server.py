#!/usr/bin/python3           # This is server.py file
import socket                                         

# create a socket object
serversocket = socket.socket(
	        socket.AF_INET, socket.SOCK_STREAM) 

# get local machine name
host = socket.gethostname()                           

port = 9994                                           

# bind to the port
serversocket.bind((host, port))                                  

# queue up to 5 requests
serversocket.listen(5)                                           

while True:
    # establish a connection
    clientsocket,addr = serversocket.accept()  
    print("Got a connection from %s" % str(addr))
    msg='Thank you for connecting'+ "\r\n"
    clientsocket.send(msg.encode('ascii'))
    mail = clientsocket.recv(2048)
    while mail != 'q':
          f=open("mails.txt", "a+")
          f.write(mail+ "\r\n")
          f.close()
          response =  "mail kaydedildi:" + str(mail)
          clientsocket.send(response.encode('ascii'))
          mail = clientsocket.recv(2048)
    clientsocket.close()