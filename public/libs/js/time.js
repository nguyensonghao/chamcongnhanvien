$(document).ready(function () {
    function getTime () {
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();    
        return time;
    }

    function getDate () {
        var dt = new Date();
        var date = 'Ngày ' + dt.getDate() + '/' + dt.getMonth() + '/' +dt.getFullYear();
        return date;
    }

    function setDate () {
        $('#date').html(getDate());    
    }

    function setTime () {
        $('#time').html(getTime());
    }
    
    setTime();
    setDate();
    
    setInterval(function () {
        setTime();
    }, 1000);
})