<!DOCTYPE html>
    <html>
    <body>
    <script>


var express = require('express');
var morgan = require('morgan');
var path = require('path');
var app = express();
app.use(morgan('combined'));

app.get ( ' / ' , function (req,res){
    res.send('hey');
});

</script>
</body>
</html>
