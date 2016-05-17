$.get('/clan/history/trophins', function (ret) {
    var trophins = document.getElementById("trophins-history");
    var trophinsChart = new Chart(trophins, {
        type: 'line',
        data: ret
    });
});
$(function() {
    colorObj = new chartColor();
    $.get('/member/donations', function(ret){
        var labels = ret.label_array;
        var data = ret.data_array;
        donationChart = new chart();
        donationChart.setCanvasElement($('#donations'));
        var colors = colorObj.buildArrayOfRGBA(labels.length);
        donationChart.plotPieChart(labels, data, colors);
    });
});
