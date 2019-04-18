# Connection to tekstil.netadim.com
ssh mehmet@94.102.3.246 -p 1337

# Dump Database
 mysqldump --databases starteks_otomasyon2 -u root -p > starteks.sql
 
# Network Configuration
- root@ubuntu:/etc/network# cat interfaces => helps you to see default gateway
- DNS servers are generally provided by your ISP e.g. Turk Telekom DNS
- and you can see your ip address and SubNet Mask with "ifconfig" command

# General OS manipulation
- cat = peek into a text file
- find = seach a file in ubuntu
- touch = create a new file
- grep = search a word in a a text file
- vi = default text editor of unix systems, similar: nano, vim
- top/htop = server perfomance monitoring 
- ps = show running processes
- kill = helps killing a process
