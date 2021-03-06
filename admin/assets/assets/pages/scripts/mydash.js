var Dashboard = function() {
    return {
        initJQVMAP: function() {
            if (jQuery().vectorMap) {
                var e = function(e) {
                        jQuery(".vmaps").hide(), jQuery("#vmap_" + e).show()
                    },
                    t = function(e) {
                        var t = jQuery("#vmap_" + e);
                        if (1 === t.size()) {
                            var a = {
                                map: "world_en",
                                backgroundColor: null,
                                borderColor: "#333333",
                                borderOpacity: .5,
                                borderWidth: 1,
                                color: "#c6c6c6",
                                enableZoom: !0,
                                hoverColor: "#c9dfaf",
                                hoverOpacity: null,
                                values: sample_data,
                                normalizeFunction: "linear",
                                scaleColors: ["#b6da93", "#909cae"],
                                selectedColor: "#c9dfaf",
                                selectedRegion: null,
                                showTooltip: !0,
                                onLabelShow: function(e, t, a) {},
                                onRegionOver: function(e, t) {
                                    "ca" == t && e.preventDefault()
                                },
                                onRegionClick: function(e, t, a) {
                                    var i = 'You clicked "' + a + '" which has the code: ' + t.toUpperCase();
                                    alert(i)
                                }
                            };
                            a.map = e + "_en", t.width(t.parent().parent().width()), t.show(), t.vectorMap(a), t.hide()
                        }
                    };
                t("world"), t("usa"), t("europe"), t("russia"), t("germany"), e("world"), jQuery("#regional_stat_world").click(function() {
                    e("world")
                }), jQuery("#regional_stat_usa").click(function() {
                    e("usa")
                }), jQuery("#regional_stat_europe").click(function() {
                    e("europe")
                }), jQuery("#regional_stat_russia").click(function() {
                    e("russia")
                }), jQuery("#regional_stat_germany").click(function() {
                    e("germany")
                }), $("#region_statistics_loading").hide(), $("#region_statistics_content").show(), App.addResizeHandler(function() {
                    jQuery(".vmaps").each(function() {
                        var e = jQuery(this);
                        e.width(e.parent().width())
                    })
                })
            }
        },
        initCalendar: function() {
            if (jQuery().fullCalendar) {
                var e = new Date,
                    t = e.getDate(),
                    a = e.getMonth(),
                    i = e.getFullYear(),
                    l = {};
                $("#calendar").width() <= 400 ? ($("#calendar").addClass("mobile"), l = {
                    left: "title, prev, next",
                    center: "",
                    right: "today,month,agendaWeek,agendaDay"
                }) : ($("#calendar").removeClass("mobile"), l = App.isRTL() ? {
                    right: "title",
                    center: "",
                    left: "prev,next,today,month,agendaWeek,agendaDay"
                } : {
                    left: "title",
                    center: "",
                    right: "prev,next,today,month,agendaWeek,agendaDay"
                }), $("#calendar").fullCalendar("destroy"), $("#calendar").fullCalendar({
                    disableDragging: !1,
                    header: l,
                    editable: !0,
                    events: [{
                        title: "All Day",
                        start: new Date(i, a, 1),
                        backgroundColor: App.getBrandColor("yellow")
                    }, {
                        title: "Long Event",
                        start: new Date(i, a, t - 5),
                        end: new Date(i, a, t - 2),
                        backgroundColor: App.getBrandColor("blue")
                    }, {
                        title: "Repeating Event",
                        start: new Date(i, a, t - 3, 16, 0),
                        allDay: !1,
                        backgroundColor: App.getBrandColor("red")
                    }, {
                        title: "Repeating Event",
                        start: new Date(i, a, t + 6, 16, 0),
                        allDay: !1,
                        backgroundColor: App.getBrandColor("green")
                    }, {
                        title: "Meeting",
                        start: new Date(i, a, t + 9, 10, 30),
                        allDay: !1
                    }, {
                        title: "Lunch",
                        start: new Date(i, a, t, 14, 0),
                        end: new Date(i, a, t, 14, 0),
                        backgroundColor: App.getBrandColor("grey"),
                        allDay: !1
                    }, {
                        title: "Birthday",
                        start: new Date(i, a, t + 1, 19, 0),
                        end: new Date(i, a, t + 1, 22, 30),
                        backgroundColor: App.getBrandColor("purple"),
                        allDay: !1
                    }, {
                        title: "Click for Google",
                        start: new Date(i, a, 28),
                        end: new Date(i, a, 29),
                        backgroundColor: App.getBrandColor("yellow"),
                        url: "http://google.com/"
                    }]
                })
            }
        },

        initEasyPieCharts: function() {
            jQuery().easyPieChart && ($(".easy-pie-chart .number.transactions").easyPieChart({
                animate: 1e3,
                size: 75,
                lineWidth: 3,
                barColor: App.getBrandColor("yellow")
            }), $(".easy-pie-chart .number.visits").easyPieChart({
                animate: 1e3,
                size: 75,
                lineWidth: 3,
                barColor: App.getBrandColor("green")
            }), $(".easy-pie-chart .number.bounce").easyPieChart({
                animate: 1e3,
                size: 75,
                lineWidth: 3,
                barColor: App.getBrandColor("red")
            }), $(".easy-pie-chart-reload").click(function() {
                $(".easy-pie-chart .number").each(function() {
                    var e = Math.floor(100 * Math.random());
                    $(this).data("easyPieChart").update(e), $("span", this).text(e)
                })
            }))
        },
        initSparklineCharts: function() {
            jQuery().sparkline && ($("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "55",
                barColor: "#35aa47",
                negBarColor: "#e02222"
            }), $("#sparkline_bar2").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "55",
                barColor: "#ffb848",
                negBarColor: "#e02222"
            }), $("#sparkline_bar5").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "55",
                barColor: "#35aa47",
                negBarColor: "#e02222"
            }), $("#sparkline_bar6").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "55",
                barColor: "#ffb848",
                negBarColor: "#e02222"
            }), $("#sparkline_line").sparkline([9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12], {
                type: "line",
                width: "100",
                height: "55",
                lineColor: "#ffb848"
            }))
        },
        initMorisCharts: function() {
            Morris.EventEmitter && $("#sales_statistics").size() > 0 && (dashboardMainChart = Morris.Area({
                element: "sales_statistics",
                padding: 0,
                behaveLikeLine: !1,
                gridEnabled: !1,
                gridLineColor: !1,
                axes: !1,
                fillOpacity: 1,
                data: [{
                    period: "2011 Q1",
                    sales: 1400,
                    profit: 400
                }, {
                    period: "2011 Q2",
                    sales: 1100,
                    profit: 600
                }, {
                    period: "2011 Q3",
                    sales: 1600,
                    profit: 500
                }, {
                    period: "2011 Q4",
                    sales: 1200,
                    profit: 400
                }, {
                    period: "2012 Q1",
                    sales: 1550,
                    profit: 800
                }],
                lineColors: ["#399a8c", "#92e9dc"],
                xkey: "period",
                ykeys: ["sales", "profit"],
                labels: ["Sales", "Profit"],
                pointSize: 0,
                lineWidth: 0,
                hideHover: "auto",
                resize: !0
            }))
        },
        initChat: function() {
            var e = $("#chats"),
                t = $(".chats", e),
                a = $(".chat-form", e),
                i = $("input", a),
                l = $(".btn", a),
                o = function(a) {
                    a.preventDefault();
                    var l = i.val();
                    if (0 != l.length) {
                        var o = new Date,
                            n = o.getHours() + ":" + o.getMinutes(),
                            r = "";
                        r += '<li class="out">', r += '<img class="avatar" alt="" src="' + Layout.getLayoutImgPath() + 'avatar1.jpg"/>', r += '<div class="message">', r += '<span class="arrow"></span>', r += '<a href="#" class="name">Bob Nilson</a>&nbsp;', r += '<span class="datetime">at ' + n + "</span>", r += '<span class="body">', r += l, r += "</span>", r += "</div>", r += "</li>";
                        t.append(r);
                        i.val("");
                        var s = function() {
                            var t = 0;
                            return e.find("li.out, li.in").each(function() {
                                t += $(this).outerHeight()
                            }), t
                        };
                        e.find(".scroller").slimScroll({
                            scrollTo: s()
                        })
                    }
                };
            $("body").on("click", ".message .name", function(e) {
                e.preventDefault();
                var t = $(this).text();
                i.val("@" + t + ":"), App.scrollTo(i)
            }), l.click(o), i.keypress(function(e) {
                return 13 == e.which ? (o(e), !1) : void 0
            })
        },
        initDashboardDaterange: function() {
            jQuery().daterangepicker && ($("#dashboard-report-range").daterangepicker({
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                    "Last 7 Days": [moment().subtract("days", 6), moment()],
                    "Last 30 Days": [moment().subtract("days", 29), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
                },
                locale: {
                    format: "MM/DD/YYYY",
                    separator: " - ",
                    applyLabel: "Apply",
                    cancelLabel: "Cancel",
                    fromLabel: "From",
                    toLabel: "To",
                    customRangeLabel: "Custom",
                    daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                    monthNames: ["1", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    firstDay: 1
                },
                opens: App.isRTL() ? "right" : "left"
            }, function(e, t, a) {
                $("#dashboard-report-range span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
            }), $("#dashboard-report-range span").html(moment().subtract("days", 29).format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), $("#dashboard-report-range").show())
        },
        initAmChart1: function() {
            if ("undefined" != typeof AmCharts && 0 !== $("#dashboard_amchart_1").size()) {
                var e = [{
                    date: "2012-01-05",
                    distance: 480,
                    townName: "Miami",
                    townName2: "Miami",
                    townSize: 10,
                    latitude: 25.83,
                    duration: 501
                }, {
                    date: "2012-01-06",
                    distance: 386,
                    townName: "Tallahassee",
                    townSize: 7,
                    latitude: 30.46,
                    duration: 443
                }, {
                    date: "2012-01-07",
                    distance: 348,
                    townName: "New Orleans",
                    townSize: 10,
                    latitude: 29.94,
                    duration: 405
                }, {
                    date: "2012-01-08",
                    distance: 238,
                    townName: "Houston",
                    townName2: "Houston",
                    townSize: 16,
                    latitude: 29.76,
                    duration: 309
                }, {
                    date: "2012-01-09",
                    distance: 218,
                    townName: "Dalas",
                    townSize: 17,
                    latitude: 32.8,
                    duration: 287
                }, {
                    date: "2012-01-10",
                    distance: 349,
                    townName: "Oklahoma City",
                    townSize: 11,
                    latitude: 35.49,
                    duration: 485
                }, {
                    date: "2012-01-11",
                    distance: 603,
                    townName: "Kansas City",
                    townSize: 10,
                    latitude: 39.1,
                    duration: 890
                }, {
                    date: "2012-01-12",
                    distance: 534,
                    townName: "Denver",
                    townName2: "Denver",
                    townSize: 18,
                    latitude: 39.74,
                    duration: 810
                }, {
                    date: "2012-01-13",
                    townName: "Salt Lake City",
                    townSize: 12,
                    distance: 425,
                    duration: 670,
                    latitude: 40.75,
                    alpha: .4
                }, {
                    date: "2012-01-14",
                    latitude: 36.1,
                    duration: 470,
                    townName: "Las Vegas",
                    townName2: "Las Vegas",
                    bulletClass: "lastBullet"
                }, {
                    date: "2012-01-15"
                }];
                AmCharts.makeChart("dashboard_amchart_1", {
                    type: "serial",
                    fontSize: 12,
                    fontFamily: "Open Sans",
                    dataDateFormat: "YYYY-MM-DD",
                    dataProvider: e,
                    addClassNames: !0,
                    startDuration: 1,
                    color: "#6c7b88",
                    marginLeft: 0,
                    categoryField: "date",
                    categoryAxis: {
                        parseDates: !0,
                        minPeriod: "DD",
                        autoGridCount: !1,
                        gridCount: 50,
                        gridAlpha: .1,
                        gridColor: "#FFFFFF",
                        axisColor: "#555555",
                        dateFormats: [{
                            period: "DD",
                            format: "DD"
                        }, {
                            period: "WW",
                            format: "MMM DD"
                        }, {
                            period: "MM",
                            format: "MMM"
                        }, {
                            period: "YYYY",
                            format: "YYYY"
                        }]
                    },
                    valueAxes: [{
                        id: "a1",
                        title: "distance",
                        gridAlpha: 0,
                        axisAlpha: 0
                    }, {
                        id: "a2",
                        position: "right",
                        gridAlpha: 0,
                        axisAlpha: 0,
                        labelsEnabled: !1
                    }, {
                        id: "a3",
                        title: "duration",
                        position: "right",
                        gridAlpha: 0,
                        axisAlpha: 0,
                        inside: !0,
                        duration: "mm",
                        durationUnits: {
                            DD: "d. ",
                            hh: "h ",
                            mm: "min",
                            ss: ""
                        }
                    }],
                    graphs: [{
                        id: "g1",
                        valueField: "distance",
                        title: "distance",
                        type: "column",
                        fillAlphas: .7,
                        valueAxis: "a1",
                        balloonText: "[[value]] miles",
                        legendValueText: "[[value]] mi",
                        legendPeriodValueText: "total: [[value.sum]] mi",
                        lineColor: "#08a3cc",
                        alphaField: "alpha"
                    }, {
                        id: "g2",
                        valueField: "latitude",
                        classNameField: "bulletClass",
                        title: "latitude/city",
                        type: "line",
                        valueAxis: "a2",
                        lineColor: "#786c56",
                        lineThickness: 1,
                        legendValueText: "[[description]]/[[value]]",
                        descriptionField: "townName",
                        bullet: "round",
                        bulletSizeField: "townSize",
                        bulletBorderColor: "#02617a",
                        bulletBorderAlpha: 1,
                        bulletBorderThickness: 2,
                        bulletColor: "#89c4f4",
                        labelText: "[[townName2]]",
                        labelPosition: "right",
                        balloonText: "latitude:[[value]]",
                        showBalloon: !0,
                        animationPlayed: !0
                    }, {
                        id: "g3",
                        title: "duration",
                        valueField: "duration",
                        type: "line",
                        valueAxis: "a3",
                        lineAlpha: .8,
                        lineColor: "#e26a6a",
                        balloonText: "[[value]]",
                        lineThickness: 1,
                        legendValueText: "[[value]]",
                        bullet: "square",
                        bulletBorderColor: "#e26a6a",
                        bulletBorderThickness: 1,
                        bulletBorderAlpha: .8,
                        dashLengthField: "dashLength",
                        animationPlayed: !0
                    }],
                    chartCursor: {
                        zoomable: !1,
                        categoryBalloonDateFormat: "DD",
                        cursorAlpha: 0,
                        categoryBalloonColor: "#e26a6a",
                        categoryBalloonAlpha: .8,
                        valueBalloonsEnabled: !1
                    },
                    legend: {
                        bulletType: "round",
                        equalWidths: !1,
                        valueWidth: 120,
                        useGraphSettings: !0,
                        color: "#6c7b88"
                    }
                })
            }
        },
        initAmChart2: function() {
            if ("undefined" != typeof AmCharts && 0 !== $("#dashboard_amchart_2").size()) {
                var e = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z",
                    t = "M19.671,8.11l-2.777,2.777l-3.837-0.861c0.362-0.505,0.916-1.683,0.464-2.135c-0.518-0.517-1.979,0.278-2.305,0.604l-0.913,0.913L7.614,8.804l-2.021,2.021l2.232,1.061l-0.082,0.082l1.701,1.701l0.688-0.687l3.164,1.504L9.571,18.21H6.413l-1.137,1.138l3.6,0.948l1.83,1.83l0.947,3.598l1.137-1.137V21.43l3.725-3.725l1.504,3.164l-0.687,0.687l1.702,1.701l0.081-0.081l1.062,2.231l2.02-2.02l-0.604-2.689l0.912-0.912c0.326-0.326,1.121-1.789,0.604-2.306c-0.452-0.452-1.63,0.101-2.135,0.464l-0.861-3.838l2.777-2.777c0.947-0.947,3.599-4.862,2.62-5.839C24.533,4.512,20.618,7.163,19.671,8.11z";
                AmCharts.makeChart("dashboard_amchart_2", {
                    type: "map",
                    theme: "light",
                    pathToImages: "../assets/global/plugins/amcharts/ammap/images/",
                    dataProvider: {
                        map: "worldLow",
                        linkToObject: "london",
                        images: [{
                            id: "london",
                            color: "#009dc7",
                            svgPath: e,
                            title: "London",
                            latitude: 51.5002,
                            longitude: -.1262,
                            scale: 1.5,
                            zoomLevel: 2.74,
                            zoomLongitude: -20.1341,
                            zoomLatitude: 49.1712,
                            lines: [{
                                latitudes: [51.5002, 50.4422],
                                longitudes: [-.1262, 30.5367]
                            }, {
                                latitudes: [51.5002, 46.948],
                                longitudes: [-.1262, 7.4481]
                            }, {
                                latitudes: [51.5002, 59.3328],
                                longitudes: [-.1262, 18.0645]
                            }, {
                                latitudes: [51.5002, 40.4167],
                                longitudes: [-.1262, -3.7033]
                            }, {
                                latitudes: [51.5002, 46.0514],
                                longitudes: [-.1262, 14.506]
                            }, {
                                latitudes: [51.5002, 48.2116],
                                longitudes: [-.1262, 17.1547]
                            }, {
                                latitudes: [51.5002, 44.8048],
                                longitudes: [-.1262, 20.4781]
                            }, {
                                latitudes: [51.5002, 55.7558],
                                longitudes: [-.1262, 37.6176]
                            }, {
                                latitudes: [51.5002, 38.7072],
                                longitudes: [-.1262, -9.1355]
                            }, {
                                latitudes: [51.5002, 54.6896],
                                longitudes: [-.1262, 25.2799]
                            }, {
                                latitudes: [51.5002, 64.1353],
                                longitudes: [-.1262, -21.8952]
                            }, {
                                latitudes: [51.5002, 40.43],
                                longitudes: [-.1262, -74]
                            }],
                            images: [{
                                label: "Flights from London",
                                svgPath: t,
                                left: 100,
                                top: 45,
                                labelShiftY: 5,
                                color: "#d93d5e",
                                labelColor: "#d93d5e",
                                labelRollOverColor: "#d93d5e",
                                labelFontSize: 20
                            }, {
                                label: "show flights from Vilnius",
                                left: 106,
                                top: 70,
                                labelColor: "#6c7b88",
                                labelRollOverColor: "#d93d5e",
                                labelFontSize: 11,
                                linkToObject: "vilnius"
                            }]
                        }, {
                            id: "vilnius",
                            color: "#009dc7",
                            svgPath: e,
                            title: "Vilnius",
                            latitude: 54.6896,
                            longitude: 25.2799,
                            scale: 1.5,
                            zoomLevel: 4.92,
                            zoomLongitude: 15.4492,
                            zoomLatitude: 50.2631,
                            lines: [{
                                latitudes: [54.6896, 50.8371],
                                longitudes: [25.2799, 4.3676]
                            }, {
                                latitudes: [54.6896, 59.9138],
                                longitudes: [25.2799, 10.7387]
                            }, {
                                latitudes: [54.6896, 40.4167],
                                longitudes: [25.2799, -3.7033]
                            }, {
                                latitudes: [54.6896, 50.0878],
                                longitudes: [25.2799, 14.4205]
                            }, {
                                latitudes: [54.6896, 48.2116],
                                longitudes: [25.2799, 17.1547]
                            }, {
                                latitudes: [54.6896, 44.8048],
                                longitudes: [25.2799, 20.4781]
                            }, {
                                latitudes: [54.6896, 55.7558],
                                longitudes: [25.2799, 37.6176]
                            }, {
                                latitudes: [54.6896, 37.9792],
                                longitudes: [25.2799, 23.7166]
                            }, {
                                latitudes: [54.6896, 54.6896],
                                longitudes: [25.2799, 25.2799]
                            }, {
                                latitudes: [54.6896, 51.5002],
                                longitudes: [25.2799, -.1262]
                            }, {
                                latitudes: [54.6896, 53.3441],
                                longitudes: [25.2799, -6.2675]
                            }],
                            images: [{
                                label: "Flights from Vilnius",
                                svgPath: t,
                                left: 100,
                                top: 45,
                                labelShiftY: 5,
                                color: "#d93d5e",
                                labelColor: "#d93d5e",
                                labelRollOverColor: "#d93d5e",
                                labelFontSize: 20
                            }, {
                                label: "show flights from London",
                                left: 106,
                                top: 70,
                                labelColor: "#009dc7",
                                labelRollOverColor: "#d93d5e",
                                labelFontSize: 11,
                                linkToObject: "london"
                            }]
                        }, {
                            svgPath: e,
                            title: "Brussels",
                            latitude: 50.8371,
                            longitude: 4.3676
                        }, {
                            svgPath: e,
                            title: "Prague",
                            latitude: 50.0878,
                            longitude: 14.4205
                        }, {
                            svgPath: e,
                            title: "Athens",
                            latitude: 37.9792,
                            longitude: 23.7166
                        }, {
                            svgPath: e,
                            title: "Reykjavik",
                            latitude: 64.1353,
                            longitude: -21.8952
                        }, {
                            svgPath: e,
                            title: "Dublin",
                            latitude: 53.3441,
                            longitude: -6.2675
                        }, {
                            svgPath: e,
                            title: "Oslo",
                            latitude: 59.9138,
                            longitude: 10.7387
                        }, {
                            svgPath: e,
                            title: "Lisbon",
                            latitude: 38.7072,
                            longitude: -9.1355
                        }, {
                            svgPath: e,
                            title: "Moscow",
                            latitude: 55.7558,
                            longitude: 37.6176
                        }, {
                            svgPath: e,
                            title: "Belgrade",
                            latitude: 44.8048,
                            longitude: 20.4781
                        }, {
                            svgPath: e,
                            title: "Bratislava",
                            latitude: 48.2116,
                            longitude: 17.1547
                        }, {
                            svgPath: e,
                            title: "Ljubljana",
                            latitude: 46.0514,
                            longitude: 14.506
                        }, {
                            svgPath: e,
                            title: "Madrid",
                            latitude: 40.4167,
                            longitude: -3.7033
                        }, {
                            svgPath: e,
                            title: "Stockholm",
                            latitude: 59.3328,
                            longitude: 18.0645
                        }, {
                            svgPath: e,
                            title: "Bern",
                            latitude: 46.948,
                            longitude: 7.4481
                        }, {
                            svgPath: e,
                            title: "Kiev",
                            latitude: 50.4422,
                            longitude: 30.5367
                        }, {
                            svgPath: e,
                            title: "Paris",
                            latitude: 48.8567,
                            longitude: 2.351
                        }, {
                            svgPath: e,
                            title: "New York",
                            latitude: 40.43,
                            longitude: -74
                        }]
                    },
                    zoomControl: {
                        buttonFillColor: "#dddddd"
                    },
                    areasSettings: {
                        unlistedAreasColor: "#15A892"
                    },
                    imagesSettings: {
                        color: "#95adaf",
                        rollOverColor: "#d93d5e",
                        selectedColor: "#009dc7"
                    },
                    linesSettings: {
                        color: "#95adaf"
                    },
                    backgroundZoomsToTop: !0,
                    linesAboveImages: !0,
                    "export": {
                        enabled: !0,
                        libs: {
                            path: "http://www.amcharts.com/lib/3/plugins/export/libs/"
                        }
                    }
                })
            }
        },
        initAmChart3: function() {
            if ("undefined" != typeof AmCharts && 0 !== $("#dashboard_amchart_3").size()) {
                AmCharts.makeChart("dashboard_amchart_3", {
                    type: "serial",
                    addClassNames: !0,
                    theme: "light",
                    path: "../assets/global/plugins/amcharts/ammap/images/",
                    autoMargins: !1,
                    marginLeft: 30,
                    marginRight: 8,
                    marginTop: 10,
                    marginBottom: 26,
                    balloon: {
                        adjustBorderColor: !1,
                        horizontalPadding: 10,
                        verticalPadding: 8,
                        color: "#ffffff"
                    },
                    dataProvider: [{
                        year: 2009,
                        income: 23.5,
                        expenses: 21.1
                    }, {
                        year: 2010,
                        income: 26.2,
                        expenses: 30.5
                    }, {
                        year: 2011,
                        income: 30.1,
                        expenses: 34.9
                    }, {
                        year: 2012,
                        income: 29.5,
                        expenses: 31.1
                    }, {
                        year: 2013,
                        income: 30.6,
                        expenses: 28.2
                    }, {
                        year: 2014,
                        income: 34.1,
                        expenses: 32.9,
                        dashLengthColumn: 5,
                        alpha: .2,
                        additional: "(projection)"
                    }],
                    valueAxes: [{
                        axisAlpha: 0,
                        position: "left"
                    }],
                    startDuration: 1,
                    graphs: [{
                        alphaField: "alpha",
                        balloonText: "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                        fillAlphas: 1,
                        title: "Income",
                        type: "column",
                        valueField: "income",
                        dashLengthField: "dashLengthColumn"
                    }, {
                        id: "graph2",
                        balloonText: "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                        bullet: "round",
                        lineThickness: 3,
                        bulletSize: 7,
                        bulletBorderAlpha: 1,
                        bulletColor: "#FFFFFF",
                        useLineColorForBulletBorder: !0,
                        bulletBorderThickness: 3,
                        fillAlphas: 0,
                        lineAlpha: 1,
                        title: "Expenses",
                        valueField: "expenses"
                    }],
                    categoryField: "year",
                    categoryAxis: {
                        gridPosition: "start",
                        axisAlpha: 0,
                        tickLength: 0
                    },
                    "export": {
                        enabled: !0
                    }
                })
            }
        },
        initAmChart4: function() {
            if ("undefined" != typeof AmCharts && 0 !== $("#dashboard_amchart_4").size()) {
                var e = AmCharts.makeChart("dashboard_amchart_4", {
                    type: "pie",
                    theme: "light",
                    path: "../assets/global/plugins/amcharts/ammap/images/",
                    dataProvider: [{
                        country: "Lithuania",
                        value: 260
                    }, {
                        country: "Ireland",
                        value: 201
                    }, {
                        country: "Germany",
                        value: 65
                    }, {
                        country: "Australia",
                        value: 39
                    }, {
                        country: "UK",
                        value: 19
                    }, {
                        country: "Latvia",
                        value: 10
                    }],
                    valueField: "value",
                    titleField: "country",
                    outlineAlpha: .4,
                    depth3D: 15,
                    balloonText: "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                    angle: 30,
                    "export": {
                        enabled: !0
                    }
                });
                jQuery(".chart-input").off().on("input change", function() {
                    var t = jQuery(this).data("property"),
                        a = e,
                        i = Number(this.value);
                    e.startDuration = 0, "innerRadius" == t && (i += "%"), a[t] = i, e.validateNow()
                })
            }
        },
        initWorldMapStats: function() {
            0 !== $("#mapplic").size() && ($("#mapplic").mapplic({
                source: "../assets/global/plugins/mapplic/world.json",
                height: 265,
                animate: !1,
                sidebar: !1,
                minimap: !1,
                locations: !0,
                deeplinking: !0,
                fullscreen: !1,
                hovertip: !0,
                zoombuttons: !1,
                clearbutton: !1,
                developer: !1,
                maxscale: 2,
                skin: "mapplic-dark",
                zoom: !0
            }), $("#widget_sparkline_bar").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "30",
                barColor: "#4db3a4",
                negBarColor: "#e02222"
            }), $("#widget_sparkline_bar2").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "30",
                barColor: "#f36a5a",
                negBarColor: "#e02222"
            }), $("#widget_sparkline_bar3").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "30",
                barColor: "#5b9bd1",
                negBarColor: "#e02222"
            }), $("#widget_sparkline_bar4").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: "bar",
                width: "100",
                barWidth: 5,
                height: "30",
                barColor: "#9a7caf",
                negBarColor: "#e02222"
            }))
        },
        init: function() {
            this.initJQVMAP(), this.initCalendar(), this.initCharts(), this.initEasyPieCharts(), this.initSparklineCharts(), this.initChat(), this.initDashboardDaterange(), this.initMorisCharts(), this.initAmChart1(), this.initAmChart2(), this.initAmChart3(), this.initAmChart4(), this.initWorldMapStats()
        }
    }
}();
App.isAngularJsApp() === !1 && jQuery(document).ready(function() {
    Dashboard.init()
});