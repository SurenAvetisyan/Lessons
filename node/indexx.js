var http = require('http');

//create a server object:
http.createServer(function (req, res) {
    res.writeHead(200, {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'X-Powered-By': 'nodejs'
    });
    var responseBody = {testkey:123}
    console.log(JSON.stringify(responseBody));
    res.write(JSON.stringify(responseBody));
    res.end();

}).listen(8000);