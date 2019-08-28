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

counter=0

for pn in xrange(1,2):
	
	if len(link_list)<286:
		break		
	
	page = requests.get("https://apps.apple.com/tr/genre/ios-games/id6014?letter=A&page=" + str(pn) +"#page")

	soup = BeautifulSoup(page.content, 'html.parser')
	# print(soup.find_all('figcaption')[0].get_text())
	link_list = [a['href'] for a in soup.find_all('a', href=True)]

	# print(link_list[70])
	#print(len(link_list))
	# app = requests.get(link_list[70])

	for x in xrange(71,75):
		counter=counter+1
		print(counter)
		details = BeautifulSoup(requests.get(link_list[x]).content, 'html.parser')
		title = details.find('title').get_text()[:-16] 
		title = title[1:]
		sheet1.write(counter, 0, title)
		sheet1.write(counter, 1, link_list[x])
		properties= details.find_all('dd')

		website = [a['href'] for a in details.find_all('a', href=True)]
		try:		
			sheet1.write(counter, 15, website[20])
		except Exception as e:
			print("Couldnt Get the website")

		try:		
			image = details.find_all('source')[0]
			sheet1.write(counter, 14, image['srcset'].split(" ")[0])
		except Exception as e:
			print("The App doesnt have an icon")
		try:		
			sheet1.write(counter, 2, details.find_all('figcaption')[0].get_text().strip())
		except Exception as e:
			print("The App has 8 variables")
		for y in xrange(0,7):
	#		sheet1.write(counter, y+3, properties[y].get_text().strip())
			try:
				sheet1.write(counter, y+3, properties[y].get_text().strip())
			except Exception as e:
				print("No internet")
		try:
			print( properties[8].get_text().strip())
			sheet1.write(counter, 11, properties[8].get_text().strip())
		except Exception as e:
			print("The App has 8 variables")		
		try:
			print( properties[9].get_text().strip())
			sheet1.write(counter, 12, properties[9].get_text().strip())
		except Exception as e:
			print("The App has 8 variables")
		try:
			print( properties[10].get_text().strip())
			sheet1.write(counter, 13, properties[10].get_text().strip())
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
wb.save('epl.xls') 