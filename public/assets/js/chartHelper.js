var chartHelper = ({
    labelArr : '',
    dataArr: '',
    chartElement: '',
    chartObj: '',
    plotLineChart: function(labelArr, dataArr) {
        this.labelArr = labelArr;
        this.dataArr = dataArr;
        var data = {
            labels: this.labelArr,
            datasets: [
                {
                    label: "data",
                    backgroundColor: "rgba(0,100,255,0.5)",
                    fillColor: "rgba(0,100,255,0.5)",
                    pointBorderColor: "rgba(75,192,192,1)",
                    data: this.dataArr
                }
            ]
        };
        this.createChart('line', data);
    },
    plotPieChart: function(labelArr, dataArr, colorArr) {
        colorArr = typeof colorArr !== 'undefined' ? colorArr : [];
        this.labelArr = labelArr;
        this.dataArr = dataArr;
        if (0 === colorArr.length) {
            colorArr = ['#36A2EB', '#FF6384'];
        }
        var data = {
            labels: labelArr,
            datasets: [
                {
                    data: dataArr,
                    backgroundColor: colorArr,
                }]
        };
        this.createChart('pie', data);
    },
    setCanvasElement: function($element) {
        this.chartElement = $element.get(0).getContext("2d");
    },
    checkChartExist: function() {
        if (this.chartObj) {
            this.chartObj.destroy();
        }
    },
    createChart: function(chartType, data) {
        this.checkChartExist();
        this.chartObj = new Chart(this.chartElement, {
            type: chartType,
            data: data,
        });
    },
});
function chart() {
    this.chartObj = null;
    this.dataArr = [];
    this.labelArr = [];
    this.setCanvasElement = chartHelper.setCanvasElement;
    this.plotPieChart = chartHelper.plotPieChart;
    this.plotLineChart = chartHelper.plotLineChart;
    this.createChart = chartHelper.createChart;
    this.checkChartExist = chartHelper.checkChartExist;
}
function chartColor() {
    this.colorIndex = 0;
    this.redArray = shuffle(range(0, 255));
    this.greenArray = shuffle(range(0, 255));
    this.blueArray = shuffle(range(0, 255));
    this.alpha = (Math.floor(Math.random() * 6) + 5) / 10;
    this.getValueOfRGBA = function() {
        var red = this.redArray[this.colorIndex];
        var green = this.greenArray[this.colorIndex];
        var blue = this.blueArray[this.colorIndex];
        this.colorIndex++;
        if (255 < this.colorIndex) {
            this.colorIndex = 0;
            this.colorRotate();
        }
        return {'css': 'rgba(' + red + ',' + green + ',' + blue + ',' + this.alpha + ')'};
    };
    this.colorRotate = function(arr) {
        var randColor = Math.floor(Math.random() * 3);
        switch (randColor) {
            case 0:
                this.redArray = this.arrayRotate(this.redArray);
                break;
            case 1:
                this.greenArray = this.arrayRotate(this.greenArray);
                break;
            case 2:
                this.blueArray = this.arrayRotate(this.blueArray);
                break;
        }
    };
    this.buildArrayOfRGBA = function(count) {
        var arr = [], css;
        for (var i = 0; i < count; i ++) {
            css = this.getValueOfRGBA().css;
            arr.push(css);
        }
        return arr;
    };
    this.arrayRotate = arrayRotate;
}
function arrayRotate(arr) {
    var ele = arr.shift();
    arr.push(ele);
    return arr;
}
function range(start, count) {
    return Array.apply(0, Array(count + 1))
            .map(function (element, index) {
                return index + start;
            });
}
function shuffle(arr) {
    var length = arr.length;
    var tmpValue, randIndex;
    arr.forEach(function(val, index) {
        randIndex = Math.floor(Math.random() * length);
        tmpValue = arr[index];
        arr[index] = arr[randIndex];
        arr[randIndex] = tmpValue;
    });
    return arr;
}
