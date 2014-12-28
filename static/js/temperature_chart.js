google.load("visualization", "1", {
    packages: ["corechart"]
});
google.setOnLoadCallback(getData);

function getData() {
    $.ajax({
        response: "json",
        url: 'get_temperature_data',
        success: onGetData
    });
}

function onGetData(response) {
    var tempsArray = getTempsArray(response.data);
    drawChart(tempsArray);
}

function getTempsArray(data) {
    var tempsArray = [];
    $.each(data, function(key, value) {
        var tempItem = [new Date(value.time * 1000), parseFloat(value.temperature)];
        tempsArray.push(tempItem);
    });
    return tempsArray;
}

function drawChart(tempsArray) {
    var data = new google.visualization.DataTable();
    data.addColumn('datetime', 'Fecha');
    data.addColumn('number', 'º');
    data.addRows(tempsArray);
    var options = {
        title: 'Temperatura',
        hAxis: {
            format: 'dd/MM/yy HH:mm'
        }
    };
    var dateFormatter = new google.visualization.DateFormat({
        pattern: 'dd/MM/yyyy HH:mm'
    });
    dateFormatter.format(data, 0);
    var chart = new google.visualization.AreaChart(document.getElementById('chart-div'));
    chart.draw(data, options);
}
$('#chart-refresh_btn').click(getData);

//TODO: Dynamic resizing without fetching data
$(window).resize(function() {
    getData();
});