from typing import Collection
import paho.mqtt.client as mqtt
import pymongo
import datetime
from pymongo.server_api import ServerApi
import sys;

client = pymongo.MongoClient("mongodb://localhost:27017", server_api=ServerApi('1'))
db = client.wmt
col = db.test

def on_connect(client, userdata, flags, rc):
    print("Connected to broker")

    # subscribe, which need to put into on_connect
    # if reconnect after losing the connection with the broker, it will continue to subscribe to the raspberry/topic topic
    client.subscribe("sensor/tur")
    client.subscribe("sensor/tds")
    client.subscribe("sensor/tempc")
    client.subscribe("sensor/tempf")
    client.subscribe("sensor/phv")
    client.subscribe("sensor/turbst")
    client.subscribe("sensor/tdsva")
    client.subscribe("sensor/phva")
    client.subscribe("sensor/phst")
    client.subscribe("sensor/dist")

# the callback function, it will be triggered when receiving messages

def on_message(client, userdata, msg):
    a = str(msg.payload)
    global data
    global count
    count += 1
    if (a[2:9] == "Turbidity"):
        data["Turbidity"] = a[11:]
        if (int(data["Turbidity"]) < 20):
            data["Turb_status"] = "Clear water"
        elif int(data["Turbidity"] >= 20 and int(data["Turbidity"]) <= 50):
            data["Turb_status"] = "Cloudy"
        elif int(data["Turbidity"] > 50):
            data["Turb_status"] = "Dirty"

    elif (a.startswith("b'TDS")):
        data["TDS"] = a[11:]
        data["TDS_status"] = "OK"
    elif (a.startswith("b'Celsius")):
        data["TemperatureCelsius"] = a[21:]
    elif (a.startswith("b'Farenheit")):
        data["TemperatureFarenheit"] = a[23:]
    elif (a.startswith("pH")):
        data["PH_value"] = a[5:-1]
        if (float(a[5:-1]) >= 0 and float(a[5:-1]) < 6.5):
            data["PH_status"] = "Acidic water"
        elif (float(a[5:-1]) >= 6.5 and float(a[5:-1]) >= 7.5):
            data["PH_status"] = "Pure Water"
        elif (float(a[5:-1]) >= 7.5 and float(a[5:-1]) >= 14):
            data["PH_status"] = "Alkaline water"
    if count == 5:
        print(data)
        col_id = col.insert_one(data).inserted_id
        count = 0

    print(data[sys.argv[0]]+" - "+data[sys.argv[1]])
    # print(a)


data = {}
date, time = str(datetime.datetime.now()).split(" ")
data["Date"] = date
data["Time"] = time
#data = {"Turbidity": "", "Turb_status": "", "TDS": "", "TemperatureCelsius": "","TemperatureFarenheit": "", "PH_value": "", "PH_status": "", "Date": "", "Time": ""}
count = 0
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

# set the will message, when the Raspberry Pi is powered off, or the network is interrupted abnormally, it will send the will message to other clients
#client.will_set('raspberry/status', b'{"status": "Off"}')
broker = "test.mosquitto.org"
# create connection, the three parameters are broker address, broker port number, and keep-alive time respectively
client.connect(broker, 1883, 60)

# set the network loop blocking, it will not actively end the program before calling disconnect() or the program crash
client.loop_forever()
