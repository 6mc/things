import requests
import json
import datetime

today = datetime.date.today()

def  fixdate(num):
    if num<10:
        return "0"+str(num)
    else:
        return str(num)    


data =requests.get("http://data.nba.net/10s/prod/v1/"+fixdate(today.year)+fixdate(today.month)+fixdate(today.day)+"/scoreboard.json")

raw = json.loads(data.content)

for game in raw["games"]:
    hour = int(game["startTimeUTC"][11:13]) + 3
    minute = game["startTimeUTC"][14:16]
    print()
    print(game["gameUrlCode"].split("/")[1][3:7])
    if hour < 24:
        print("its Game Time Baby! "+ game["gameUrlCode"].split("/")[1][0:3] +" - "+ game["gameUrlCode"].split("/")[1][3:7] + " at " + str(hour) +":"+minute )
