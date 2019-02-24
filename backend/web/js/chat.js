var websocketPort = wsPort ? wsPort : 8080,
  conn = new WebSocket('ws://localhost:' + websocketPort),
  idMessage = 'chatMessages';

var conn = new WebSocket('ws://localhost:8080');

conn.onopen = function (e) {
  console.log("Connection established!");
};

conn.onerror = function (e) {
  console.log("Connection fail!");
};

conn.onmessage = function (e) {
  document.getElementById(idMessage.value).value = e.data + '\n' +
    document.getElementById(idMessage).value;
  console.log(e.data);
};
