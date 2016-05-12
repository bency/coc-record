$.get('/clan/history/trophins', function (ret) {
    var trophins = document.getElementById("trophins-history");
    var trophinsChart = new Chart(trophins, {
        type: 'line',
        data: ret
    });
});
