import * as mqtt from "mqtt";
var client = mqtt.connect('mqtt://test.mosquitto.org');

setInterval(()=>{
client.on("connect",function(){
    client.subscribe("bharathi");
    console.log("Client has subscribed successfully");
});

    client.on('message',function(topic,message){
        console.log(message.toString());
        document.getElementsByClassName("live-data")+=message.toString();
    })

},100000)


