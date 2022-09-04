#!/usr/bin/python
import time
import board
import adafruit_dht
import MySQLdb

dhtDevice1 = adafruit_dht.DHT11(board.D17)
dhtDevice2 = adafruit_dht.DHT11(board.D22)
dhtDevice3 = adafruit_dht.DHT11(board.D27)

host_ip = "localhost"
user = "test"
passw = "password"
database = "test_data"



connect = MySQLdb.connect(host=host_ip,user=user,passwd=passw,db=database)
c = connect.cursor()
i=1
while True:
	try:
		temp1 =dhtDevice1.temperature
		hum1 = dhtDevice1.humidity

		temp2 =dhtDevice2.temperature
		hum2 = dhtDevice2.humidity

		temp3 =dhtDevice3.temperature
		hum3 = dhtDevice3.humidity

		temp=(temp1+temp2+temp3)/3
		hum=(hum1+hum2+hum3)/3


		i=i+1
	except RuntimeError as e:
		print("Error Reading from DHT. Trying Again..")

	tim=time.strftime("%H:%M:%S")
	date=time.strftime("%d-%m-%Y")

	try:
		c.execute("""INSERT INTO WeatherStat(Temperature1, Temperature2, Temperature3, Temperature, Humidity1, Humidity2, Humidity3, Humidity, Time, Date) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)""",(temp1,temp2,temp3,temp,hum1,hum2,hum3,hum,tim,date))
		connect.commit()
	except:
		print("writing to database failed! Check your code")
		connect.rollback()

	time.sleep(600)

c.close()
connect.close()
