$(document).ready(function() {

    var ctx1 = document.getElementById("chart1").getContext("2d");
    var data1 = {
        labels: ["หน่วยงานที่ 1", "หน่วยงานที่ 2", "หน่วยงานที่ 3", "หน่วยงานที่ 4", "หน่วยงานที่ 5", "หน่วยงานที่ 6", "หน่วยงานที่ 7"],
        datasets: [{
                label: "My First dataset",
                fillColor: "rgba(255,118,118,0.8)",
                strokeColor: "rgba(255,118,118,0.8)",
                highlightFill: "rgba(255,118,118,1)",
                highlightStroke: "rgba(255,118,118,1)",
                data: [10, 30, 80, 61, 26, 75, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(180,193,215,0.8)",
                strokeColor: "rgba(180,193,215,0.8)",
                highlightFill: "rgba(180,193,215,1)",
                highlightStroke: "rgba(180,193,215,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: "My Second dataset",
                fillColor: "#edf1f5",
                strokeColor: "#edf1f5",
                highlightFill: "#edf1f5",
                highlightStroke: "#edf1f5",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var chart1 = new Chart(ctx1).Bar(data1, {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.005)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 0,
        tooltipCornerRadius: 2,
        barDatasetSpacing: 3,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });

    var ctx2 = document.getElementById("chart2").getContext("2d");
    var data2 = {
        labels: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิยน", "ธันวาคม"],
        datasets: [{
                label: "My First dataset",
                fillColor: "red",
                strokeColor: "red",
                highlightFill: "rgba(255,118,118,1)",
                highlightStroke: "rgba(255,118,118,1)",
                data: [10, 30, 80, 61, 26, 75, 40, 10, 30, 80, 61, 26]
            },
            {
                label: "My Second dataset",
                fillColor: "yellow",
                strokeColor: "yellow",
                highlightFill: "rgba(180,193,215,1)",
                highlightStroke: "rgba(180,193,215,1)",
                data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86]
            }, {
                label: "My third dataset",
                fillColor: "blue",
                strokeColor: "blue",
                highlightFill: "rgba(180,193,215,1)",
                highlightStroke: "rgba(180,193,215,1)",
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            }
        ]
    };

    var chart2 = new Chart(ctx2).Bar(data2, {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.005)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 0,
        tooltipCornerRadius: 2,
        barDatasetSpacing: 3,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });

    var ctx3 = document.getElementById("chart3").getContext("2d");
    var data3 = [{
            value: 300,
            color: "#2cabe3",
            highlight: "#2cabe3",
            label: "Blue"
        },
        {
            value: 50,
            color: "#edf1f5",
            highlight: "#edf1f5",
            label: "Light"
        },
        {
            value: 50,
            color: "#b4c1d7",
            highlight: "#b4c1d7",
            label: "Dark"
        },
        {
            value: 50,
            color: "#53e69d",
            highlight: "#53e69d",
            label: "Megna"
        },
        {
            value: 100,
            color: "#ff7676",
            highlight: "#ff7676",
            label: "Orange"
        }
    ];

    var myPieChart = new Chart(ctx3).Pie(data3, {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 0,
        animationSteps: 100,
        tooltipCornerRadius: 0,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });


});