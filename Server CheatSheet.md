# Connection to tekstil.netadim.com
ssh mehmet@94.102.3.246 -p 1337

# Dump Database
 mysqldump --databases starteks_otomasyon2 -u root -p > starteks.sql
 
# Network Configuration Windows
- Network Share Center Properties ipv4
- root@ubuntu:/etc/network# cat interfaces => helps you to see default gateway
- DNS servers are generally provided by your ISP e.g. Turk Telekom DNS
- and you can see your ip address and SubNet Mask with `ifconfig` command

# Network Configuration Ubuntu
-  root@ubuntu:/etc/network# nano interfaces => configure network as 

```
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto ens33
iface ens33 inet static
address 192.168.0.2
netmask 255.255.255.0
network 192.168.0.0
broadcst 192.168.0.255
gateway 192.168.0.1
dns-nameservers 192.168.0.3
```

# Ubuntu Firewall
- sudo netstat -ntlp | grep LISTEN => see Open Ports
- [Check Open Ports Firewall](https://www.yougetsignal.com/tools/open-ports/) 
## UFW Configuration
- sudo ufw allow 80/tcp
- sudo ufw deny 3306
- sudo ufw allow from 192.168.0.1 to any port 22
- sudo ufw enable


# General OS manipulation
- cat = peek into a text file
- find = seach a file in ubuntu
- touch = create a new file
- grep = search a word in a a text file
- vi = default text editor of unix systems, similar: nano, vim
- top/htop = server perfomance monitoring 
- ps = show running processes
- kill = helps killing a process

# Log Listing
- root@tekstil:/var/log/nginx# cat access.log
- ngxtop 
- sudo ngxtop remote_addr -l  /var/log/nginx/site1/access.log
