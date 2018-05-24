<!DOCTYPE html>
<html>
<style>
span {
	 font-size: 2.5em;


    padding: 0px;

    display: inline-block;
	 color: black;
	 
}
</style>
<head>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>

<body onload="startTime()" style="color: rgb(0, 0, 0); font-family: monospace; background-color: #BDBDBD;">

<span><div id="txt"></span></div></span>

</body>
</html>
