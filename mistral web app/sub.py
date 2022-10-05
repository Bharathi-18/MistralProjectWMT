import paho.mqtt.client as mqtt

def on_connect(client, userdata, flags, rc):
    print("Connected to broker")
    # subscribe, which need to put into on_connect
    # if reconnect after losing the connection with the broker, it will continue to subscribe to the raspberry/topic topic
    client.subscribe("sensor/phv")
    client.subscribe("sensor/tempc")
    client.subscribe("sensor/tempf")
    client.subscribe("sensor/tur")
    client.subscribe("sensor/tds")

# the callback function, it will be triggered when receiving messages
def on_message(client, userdata, msg):
    a=msg.payload
    print(a)

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

# set the will message, when the Raspberry Pi is powered off, or the network is interrupted abnormally, it will send the will message to other clients
#client.will_set('raspberry/status', b'{"status": "Off"}')
broker="test.mosquitto.org"
# create connection, the three parameters are broker address, broker port number, and keep-alive time respectively
client.connect(broker, 1883, 60)

# set the network loop blocking, it will not actively end the program before calling disconnect() or the program crash
# client.loop_forever()
