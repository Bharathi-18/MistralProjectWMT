import * as mqtt from "mqtt";
// const mqtt = require("mqtt");
var client = mqtt.connect('mqtt://test.mosquitto.org');

client.on("connect",function(){
    client.subscribe("bharathi");
    console.log("Client has subscribed successfully");
});

client.on('message',function(topic,message){
    console.log(message.toString());
    // document.getElementById('temp') = message.toString();
})