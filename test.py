from bs4 import BeautifulSoup
import requests
import xlwt 
from xlwt import Workbook 

wb = Workbook() 
  
# add_sheet is used to create sheet. 
sheet1 = wb.add_sheet('Sheet 1') 
  
#sheet1.write(1, 0, 'ISBT DEHRADUN') 

page = requests.get("https://apps.apple.com/tr/genre/ios-games/id6014?letter=A&page=1#page")

soup = BeautifulSoup(page.content, 'html.parser')
# print(soup.find_all('figcaption')[0].get_text())
link_list = [a['href'] for a in soup.find_all('a', href=True)]

# print(link_list[70])

# app = requests.get(link_list[70])

for x in xrange(70,167):
	print(x)
	details = BeautifulSoup(requests.get(link_list[x]).content, 'html.parser')
	title = details.find('title').get_text()[:-16] 
	title = title[1:]
	sheet1.write(x-69, 0, title)
	sheet1.write(x-69, 1, link_list[x])
	properties= details.find_all('dd');
	try:
		print( properties[8].get_text().strip())
		sheet1.write(x-69, 2, soup.find_all('figcaption')[0].get_text().strip())
	except Exception as e:
		print("The App has 8 variables")
	for y in xrange(0,7):
		sheet1.write(x-69, y+3, properties[y].get_text().strip()) 
	try:
		print( properties[8].get_text().strip())
		sheet1.write(x-69, 11, properties[8].get_text().strip())
	except Exception as e:
		print("The App has 8 variables")		
	try:
		print( properties[9].get_text().strip())
		sheet1.write(x-69, 12, properties[9].get_text().strip())
	except Exception as e:
		print("The App has 8 variables")
	try:
		print( properties[10].get_text().strip())
		sheet1.write(x-69, 13, properties[10].get_text().strip())
	except Exception as e:
		print("The App has 8 variables")
	
# details = BeautifulSoup(requests.get(link_list[70]).content, 'html.parser')

# title = details.find('title').get_text()[:-16] 

# title = title[1:]

# sheet1.write(1, 0, title)
# sheet1.write(1, 1, link_list[70])

#print( title)

# properties= details.find_all('dd');

# print( properties[0].get_text().strip())
# print( properties[1].get_text().strip())
# print( properties[2].get_text().strip())
# print( properties[3].get_text().strip())
# print( properties[4].get_text().strip())
# print( properties[5].get_text().strip())
# print( properties[6].get_text().strip())
# print( properties[7].get_text().strip())
# try:
# 	print( properties[8].get_text().strip())
# 	sheet1.write(1, 2, properties[8].get_text().strip())
# except Exception as e:
# 	print("The App has 8 variables")

		
        

# for x in xrange(0,8):
# 	sheet1.write(1, x+3, properties[x].get_text().strip()) 
# 	pass
wb.save('Apps.xls') 