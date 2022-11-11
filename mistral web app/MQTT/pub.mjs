import * as mqtt from "mqtt";
// const mqtt = require("mqtt");
var client = mqtt.connect('mqtt://test.mosquitto.org');

client.on("connect",function()
{
    setInterval(function() {
        var random = Math.random()*50;
        var st = '{"tem":'+random+',"hum":'+(random+1)+',"tds":'+(random+2)+'}';
        console.log(random);
        if(random<30){
            client.publish('mistral',''+st.toString());
        }
    } ,1000);
});