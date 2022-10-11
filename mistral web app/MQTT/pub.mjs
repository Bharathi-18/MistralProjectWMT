import * as mqtt from "mqtt";
// const mqtt = require("mqtt");
var client = mqtt.connect('mqtt://test.mosquitto.org');

client.on("connect",function()
{
    setInterval(function() {
        var random = Math.random()*50;
        console.log(random);
        if(random<30){
            client.publish('bharathi','MQTT generated Random value : '+random.toString()+'.'); 
        }
    } ,1000);
});