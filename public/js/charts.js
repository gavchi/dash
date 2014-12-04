function setCharts(data){

    if(!data){
        data = {
            visitsDay: {
                hours: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    hour: 14,
                    day: 7
                }
            },
            visitsMonth: {
                day: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81,
                    62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    day: 1,
                    month: 7
                }
            },
            regs: {
                day: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81,
                    62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    day: 1,
                    month: 7
                }
            },
            sessionDurationByDate: {
                day: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81,
                    62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    day: 1,
                    month: 7
                }
            },
            pageDepthByDate: {
                day: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81,
                    62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    day: 1,
                    month: 7
                }
            },
            typesTraffic: [{
                y: 42,
                name: 'Соц. Сети',
                selected: true
            }, {
                y: 41,
                name: 'Поисковики'
            }, {
                y: 17,
                name: 'Прямые заходы'
            }],
            typesSourceTraffic: [{
                y: 33,
                name: 'Google',
                selected: true
            }, {
                y: 31,
                name: 'Yandex'
            }, {
                y: 17,
                name: 'VK'
            }, {
                y: 19,
                name: 'FaceBook'
            }]
        };
    }


    function setInitValues(field, data) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].selected) {
                field.siblings('.dashboard-chart__pie-value').text(data[i].y + '%');
                field.closest('.dashboard-item').find('.dashboard-item__title').text(data[i].name);
            }
        }
    }

    Highcharts.theme = {
        colors: ['#33bbef'],
        title: {
            text: ''
        },
        chart: {
            borderWidth: 0,
            backgroundColor: null,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        xAxis: {
            lineWidth: 0,
            gridLineWidth: 0,
            tickColor: '#ebf0f0',
            tickWidth: 3,
            tickLength: 3,
            startOnTick: true,
            minPadding: 0,
            labels: {
                enabled: false,
                useHTML: true,
                step: 1
            },
            title: {
                enabled: false,
                style: {
                    color: '#9de4ff',
                    font: '18px ProximaNova, Arial, Helvetica, sans-serif'
                },
                align: 'middle',
                offset: 25
            }
        },
        yAxis: {
            gridLineWidth: 0,
            tickColor: '#ebf0f0',
            tickWidth: 3,
            tickLength: 3,
            labels: {
                enabled: false
            },
            title: {
                style: {
                    color: '#9de4ff',
                    font: '18px ProximaNova, Arial, Helvetica, sans-serif'
                },
                align: 'high',
                y: 0,
                x: -20,
                offset: -10
            }
        },
        legend: {
            enabled: false
        },
        labels: {
            style: {
                color: '#3E576F'
            }
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            line: {
                color: '#ebf0f0',
                marker: {
                    lineColor: '#ebf0f0',
                    lineWidth: 1,
                    radius: 3,
                    states: {
                        hover: {
                            enabled: false
                        }
                    },
                    symbol: 'circle'
                },
                states: {
                    hover: {
                        lineWidthPlus: 0
                    }
                }
            },
            pie: {
                shadow: false,
                borderColor: '#ebf0f0',
                borderWidth: 2,
                center: ['50%', '50%'],
                allowPointSelect: false,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                slicedOffset: 0,
                states: {
                    hover: {
                        brightness: 1
                    },
                    select: {
                        color: '#ebf0f0'
                    }
                },
                size: '100%',
                innerSize: '75%'
            }
        }
    };
    Highcharts.setOptions(Highcharts.theme);

    var highchartsLineOptions = {
        chart: {
            type: 'line'
        },
        xAxis: {
            tickInterval: 1
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Значение'
            }
        }
    };

    var highchartsPieOptions = {
        chart: {
            type: 'pie'
        },
        tooltip: {
            valueSuffix: '%',
            enabled: false
        }
    };

    var visitsDay = $('.jsChartVisitsDay').highcharts({
        chart: highchartsLineOptions.chart,
        xAxis: highchartsLineOptions.xAxis,
        yAxis: highchartsLineOptions.yAxis,
        plotOptions: {
            line: {
                events: {
                    mouseOut: function () {
                        visitsDay.siblings('.jsChartVisitsDayDate').hide();
                    }
                }
            }
        },
        tooltip: {
            backgroundColor: '#ebf0f0',
            borderRadius: 10,
            borderWidth: 0,
            crosshairs: [{
                color: '#9de3ff'
            }],
            shadow: false,
            shared: true,
            style: {
                padding: 0
            },
            useHTML: true,
            formatter: function () {
                var formatHour = function (h) {
                    if (h >= 24) {
                        return formatHour(h - 24);
                    }
                    if (h <= 9) {
                        return '0' + h;
                    }
                    return h;
                };
                var formatDay = function (m, h) {
                    if (h >= 24) {
                        return formatDay(m + 1);
                    }
                    if (m <= 9) {
                        return '0' + m;
                    }
                    return m;
                };
                visitsDay.siblings('.jsChartVisitsDayDate').show().css('left', this.points[0].point.plotX)
                    .text(formatHour(this.x) + '.' + formatDay(data.visitsDay.start.day, this.x));
                return '<div class="charts-tooltip">' + this.y + '</div>';
            }
        },
        series: [{
            data: data.visitsDay.hours,
            pointStart: data.visitsDay.start.hour
        }]
    });
    visitsDay.siblings('.jsChartVisitsDayXTitle').text('Время');

    var visitsMonth = $('.jsChartVisitsMonth').highcharts({
        chart: highchartsLineOptions.chart,
        xAxis: highchartsLineOptions.xAxis,
        yAxis: highchartsLineOptions.yAxis,
        plotOptions: {
            line: {
                events: {
                    mouseOut: function () {
                        visitsMonth.siblings('.jsChartVisitsMonthDate').hide();
                    }
                }
            }
        },
        tooltip: {
            backgroundColor: '#ebf0f0',
            borderRadius: 10,
            borderWidth: 0,
            crosshairs: [{
                color: '#9de3ff'
            }],
            shadow: false,
            shared: true,
            style: {
                padding: 0
            },
            useHTML: true,
            formatter: function () {
                // TODO: Number days in month
                var formatDay = function (d) {
                    if (d >= 31) {
                        return formatDay(d - 30);
                    }
                    if (d <= 9) {
                        return '0' + d;
                    }
                    return d;
                };
                var formatMonth = function (m, d) {
                    if (d >= 31) {
                        return formatDay(m + 1);
                    }
                    if (m <= 9) {
                        return '0' + m;
                    }
                    return m;
                };
                visitsMonth.siblings('.jsChartVisitsMonthDate').show().css('left', this.points[0].point.plotX)
                    .text(formatDay(this.x) + '.' + formatMonth(data.visitsMonth.start.month, this.x));
                return '<div class="charts-tooltip">' + this.y + '</div>';
            }
        },
        series: [{
            data: data.visitsMonth.day,
            pointStart: data.visitsMonth.start.day
        }]
    });
    visitsMonth.siblings('.jsChartVisitsMonthXTitle').text('День');



    var sessionDurationMonth = $('.jsChartSessionDurationMonth').highcharts({
        chart: highchartsLineOptions.chart,
        xAxis: highchartsLineOptions.xAxis,
        yAxis: highchartsLineOptions.yAxis,
        plotOptions: {
            line: {
                events: {
                    mouseOut: function () {
                        sessionDurationMonth.siblings('.jsChartSessionDurationMonthDate').hide();
                    }
                }
            }
        },
        tooltip: {
            backgroundColor: '#ebf0f0',
            borderRadius: 10,
            borderWidth: 0,
            crosshairs: [{
                color: '#9de3ff'
            }],
            shadow: false,
            shared: true,
            style: {
                padding: 0
            },
            useHTML: true,
            formatter: function () {
                // TODO: Number days in month
                var formatDay = function (d) {
                    if (d >= 31) {
                        return formatDay(d - 30);
                    }
                    if (d <= 9) {
                        return '0' + d;
                    }
                    return d;
                };
                var formatMonth = function (m, d) {
                    if (d >= 31) {
                        return formatDay(m + 1);
                    }
                    if (m <= 9) {
                        return '0' + m;
                    }
                    return m;
                };
                sessionDurationMonth.siblings('.jsChartSessionDurationMonthDate').show().css('left', this.points[0].point.plotX)
                    .text(formatDay(this.x) + '.' + formatMonth(data.sessionDurationByDate.start.month, this.x));
                return '<div class="charts-tooltip">' + this.y + '</div>';
            }
        },
        series: [{
            data: data.sessionDurationByDate.day,
            pointStart: data.sessionDurationByDate.start.day
        }]
    });
    sessionDurationMonth.siblings('.jsChartSessionDurationMonthXTitle').text('День');

    var typesTraffic = $('.jsChartTypesTraffic').highcharts({
        chart: highchartsPieOptions.chart,
        tooltip: highchartsPieOptions.tooltip,
        series: [{
            data: data.typesTraffic,
            point: {
                events: {
                    mouseOver: function () {
                        if (!this.selected) {
                            this.select();
                            typesTraffic.siblings('.dashboard-chart__pie-value').text(this.y + '%');
                            typesTraffic.closest('.dashboard-item').find('.dashboard-item__title').text(this.name);
                        }
                    }
                }
            }
        }]
    });
    setInitValues(typesTraffic, data.typesTraffic);

    var typesSourceTraffic = $('.jsChartTypesSourceTraffic').highcharts({
        chart: highchartsPieOptions.chart,
        tooltip: highchartsPieOptions.tooltip,
        series: [{
            data: data.typesSourceTraffic,
            point: {
                events: {
                    mouseOver: function () {
                        if (!this.selected) {
                            this.select();
                            typesSourceTraffic.siblings('.dashboard-chart__pie-value').text(this.y + '%');
                            typesSourceTraffic.closest('.dashboard-item').find('.dashboard-item__title').text(this.name);
                        }
                    }
                }
            }
        }]
    });
    setInitValues(typesSourceTraffic, data.typesSourceTraffic);

}

$(document).ready(function(){
    setCharts();
});