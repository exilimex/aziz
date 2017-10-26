@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <div class="blog-post">

            <link type="text/css" rel="stylesheet" href="http://abdullah.com.kw/web/template/pc/temp_css.php?ac=22520171024">
            <script src="http://abdullah.com.kw/web/template/pc/temp_js.php?ac=21320171024"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <input type="hidden" id="scrollInProgress" value="0">
            <input type="hidden" id="currentTop" value="0">
            <input type="hidden" value="0" id="ctop">
            <input type="hidden" value="118" id="n_w">
            <input type="hidden" value="83" id="n_h">
            <input type="hidden" value="118" id="nc_h">
            <input type="hidden" value="25" id="nb_m">
            <input type="hidden" value="115" id="nlb_m">
            <script>
                function checkScrollProgress() {
                    var ctop = parseInt($("#currentTop").val());
                    var atop = document.body.scrollTop;
                    atop = (atop == 0) ? document.documentElement.scrollTop: atop;
                    //console.log(document.body.scrollTop);
                    if(ctop == atop) {
                        $("#scrollInProgress").val("0");
                    } else {
                        $("#currentTop").val(atop);
                        $("#scrollInProgress").val("1");
                    }
                    setTimeout(function() {checkScrollProgress();},100);
                }
                checkScrollProgress();
                function checkScrollTop() {
                    var ctop = document.body.scrollTop / 20;
                    var ctop = (ctop == 0) ? (document.documentElement.scrollTop/20): ctop;

                    $("#ctop").val(ctop);

                    // Logo: width: 200px; height: 83px;
                    var l_w = 118;
                    var l_h = 83;
                    var l_r = l_w/l_h; l_r = l_r;
                    var m_h = 40;

                    var n_h = l_h - ctop;
                    if(n_h < m_h) n_h = m_h;
                    var n_w = n_h * l_r;
                    n_w = n_w.toFixed(0);
                    $("#n_w").val(n_w);
                    $("#n_h").val(n_h);
                    $("#Logo").css("width", n_w+"px");
                    $("#Logo").css("height", n_h+"px");
                    $("#HeaderLogoDiv").css("height", n_h+"px");

                    // mainHeaderContainer: height: 118px;
                    var c_h = 118;
                    var mc_h = 75
                    var nc_h = c_h - ctop;
                    if(nc_h < mc_h) nc_h = mc_h;
                    $("#nc_h").val(nc_h);
                    $("#mainHeaderContainer").css("height", nc_h+"px");

                    // HeaderMenuButDiv: height: 50px; margin-top: 25px;
                    var cb_m = 25;
                    var mb_m = 0;
                    var nb_m = cb_m - (ctop/2);
                    if(nb_m < mb_m) nb_m = mb_m;
                    nb_m = nb_m.toFixed(0);
                    $("#nb_m").val(nb_m);
                    $("#HeaderMenuButDiv").css("margin-top", nb_m+"px");


                    // loadingBar: height: 3px; margin-top: 115px;
                    var clb_m = 115;
                    var mlb_m = mc_h - 3 ;
                    var nlb_m = clb_m - ctop;
                    if(nlb_m < mlb_m) nlb_m = mlb_m;
                    nlb_m = nlb_m.toFixed(0);
                    $("#nlb_m").val(nlb_m);
                    $("#loadingBar").css("margin-top", nlb_m+"px");


                }
                function toggleLoadingBar(c) {
                    if(c == 1) {
                        $("#loadingBar").attr("class","loadingBar BegLoadingBar");
                        $("#loadingBar").show();
                    } else {
                        $("#loadingBar").fadeOut();
                    }
                }
                function playYTVideo(id) {
                    $("#videoPlayingContainer").html("<div class=\"YTiFrameContainer\"><iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/"+id+"\" frameborder=\"0\" allowfullscreen></iframe></div>");
                    $("#videoPlayingBG").show();
                    $("#videoPlayingContainer").show();
                }
                function closeYTVideo() {
                    $("#videoPlayingContainer").hide();
                    $("#videoPlayingBG").hide();
                    $("#videoPlayingContainer").html("");
                }
                function toggleHeaderMenu() {
                    if($("#headerMenuStatus").val() == "0") {
                        $('#HeaderMenuContainer').attr('class','HeaderMenuContainer BegShowHeaderMenu');
                        $("#headerMenuStatus").val("1");
                    } else {
                        $('#HeaderMenuContainer').attr('class','HeaderMenuContainer BegHideHeaderMenu');
                        $("#headerMenuStatus").val("0");
                    }
                    $('#MenuButImage').attr('class','MenuButImage BegAnimMenuButImage'); setTimeout(function() { $('#MenuButImage').attr('class','MenuButImage'); },'400');
                }
            </script>
            <input type="hidden" id="headerMenuStatus" value="0">
            <div id="videoPlayingBG" class="videoPlayingBG" onclick="closeYTVideo();"></div>
            <div id="videoPlayingContainer" class="videoPlayingContainer"></div>



            <div class="BodyContainer">
                <script>
                    // General Methods
                    function hideSTD() {
                        $("#toolForm_feasibility").hide();
                        $("#toolForm_consumptionOptimization").hide();
                    }
                    function sTselected() {
                        hideSTD();
                        var st = $("input[name=toolType]:checked", "#toolType").val()
                        $("#toolForm_"+st).show();
                    }
                    function fetchSourceCode(t){;
                        var source = $("#codeof_"+t).html();
                        source = source.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                        $("#pageSource_Textarea_"+t).html(source);
                    }
                    function toggleSourceCode(t) {
                        var cs = $("#sourceCodeStatus_"+t).val();
                        if(cs == 1) {
                            $("#pageSource_Div_"+t).hide();
                            $("#sourceCodeStatus_"+t).val("0");
                            $("#sourceCodeHyperLink_"+t).html("عرض البرمجة");
                        } else {
                            $("#pageSource_Div_"+t).show();
                            $("#sourceCodeStatus_"+t).val("1");
                            $("#sourceCodeHyperLink_"+t).html("إغلاق البرمجة");
                        }
                    }
                    function togglePrivacyPolicy() {
                        var pps = $("#ppstatus").val();
                        if(pps == 1) {
                            $("#privacyPolictyDiv").hide();
                            $("#ppstatus").val("0");
                            $("#privacyPolictyBut").html("عرض سياسة الخصوصية");
                        } else {
                            $("#privacyPolictyDiv").show();
                            $("#ppstatus").val("1");
                            $("#privacyPolictyBut").html("إغلاق سياسة الخصوصية");
                        }
                    }
                    function addCommas(nStr) {
                        nStr += '';
                        var x = nStr.split('.');
                        var x1 = x[0];
                        var x2 = x.length > 1 ? '.' + x[1] : '';
                        var rgx = /(\d+)(\d{3})/;
                        while (rgx.test(x1)) {
                            x1 = x1.replace(rgx, '$1' + ',' + '$2');
                        }
                        return x1 + x2;
                    }
                    function readableAmount(v,d,c) {
                        if(c != "") c = " " + c;
                        return addCommas(parseFloat(v).toFixed(d))+c;
                    }
                </script>
                <table cellpadding="0" cellspacing="0" class="width100pr">
                    <tbody><tr>
                        <td class="titleTD">
                            <div class="ResumeTable_Info_Title">
                                أدوات محاسبية						</div>
                        </td>
                        <td class="tools_0009">

                        </td>
                    </tr>
                    </tbody></table>
                <div id="home_div" class="tools_0000">
                    الأدوات المحاسبية التالية عبارة عن أدوات تساهم في تحسين الأداء الاقتصادي والمحاسبي لكل من المبادرين ورواد الأعمال والمستهلكين، وتمت برمجتها شخصيا بشكل كامل بلغة مفتوحة المصدر قابلة للتطوير، مساهمة كمسؤولية اجتماعية.
                    <input type="hidden" name="ppstatus" id="ppstatus" value="0">

                    <div id="privacyPolictyDiv" class="tools_x002" style="text-align: justify;">
                        <div class="tools_x003" style="margin-top: 0px;">سياسة الخصوصية</div>
                        إثبات جدوى هذه الأدوات المحاسبية يتطلب إدخال دقيق لمعلومات قد تكون قيمة لصاحبها. وضعت هذه السياسة لحماية جميع الأطراف المتعلقة في آلية تمرير البيانات في تلك الأدوات، تلك السياسة التي تبين كيفية مرور جميع البيانات المدخلة في هذه الأدوات.
                        <div class="tools_x003">العمليات الحسابية</div>
                        اللغة المستخدمة في برمجة هذه الأدوات هي لغة "جافاسكربت" المفتوحة المصدر. تعمل هذه اللغة في جهة المتصفح، بمعنى أن الأداة تعمل بشكل كامل في إدراج القوائم وإنهاء العمليات الحسابية حتى وإن إنقطع التواصل من خلال الإنترنت، أي أنه لايمكن تمرير البيانات إلى جهة أخرى إن لم يتم طلب حفظ البيانات من قبل صاحبها.
                        <div class="tools_x003">حفظ المعلومات</div>
                        في حال حفظ المعلومات من أجل الطباعة يتم إرسال المعطيات والشكل النهائي للصفحات إلى الخادم لتتم عملية تحويل صيغة الملف إلى PDF، الملف القابل للطباعة. وبه أيضا يتم حفظ البيانات التالية في قواعد البيانات: رمز الملف، المعطيات، قوالب التصميم، آخر وقت للتحديث، ووقت الإنشاء. هذا الحفظ يتيح للمتصفح الرجوع لاحقا لإكمال عملياته الحسابية في حال الضرورة.
                        <div class="tools_x003">سرية المعلومات</div>
                        تحفظ المعلومات لمدة 60 يوما من تاريخ ووقت آخر تحديث عليها، وبعدها يتم الحذف تلقائيا من قواعد البيانات مع إلغاء الرمز والروابط المباشرة. في هذه الفترة، لا يحق لمالك الأداة الإطلاع على أي جزء من هذه المدخلات أو استخدام أي جزء منها حتى وإن كان في دراسات احصائية. إضافة إلى ذلك فإنه لايتم تسجيل أو ربط أي عنوان بروتوكولي خاص بالمستخدم مع هذه البيانات.
                        <div class="tools_x003">احصاء عدد الدراسات</div>
                        عند حفظ البيانات لمدة 60 يوما يتم تعيين رمز فريد لكل دراسة - Primary ID - وهذا الرمز عبارة عن عدد يتزايد مع زيادة الدراسات التي تم حفظها مسبقا. فآخر عدد مسجل لدينا هو الذي يظهر في الإحصائية أدناه، وهذا لا يعني بالضرورة أن هناك دراسات محفوظة بهذا الكم في قواعد البيانات حيث أن العديد منها قد إنتهت فترة الـ 60 يوما على آخر تحديث عليها.
                        <div class="tools_x003">طاقم المبرمجين</div>
                        تمت برمجة هذا الموقع بما فيه من أدوات محاسبية بواسطة مالك الموقع - عبدالله السلوم - وهو من "لا يشرف" بل "يقوم" على تطوير برمجته شخصيا. أما الإستضافة الخاصة في هذا الموقع هي في الخادم الخاص بنفس المالك، ولا توجد أي جهة أخرى بإمكانها الإطلاع حتى وبشكل غير قانوني على البيانات المحفوظة في القواعد.
                        <div class="tools_x003">أهداف الأدوات</div>
                        وضعت هذه الأدوات كجزء من المسؤولية الإجتماعية تجاه مجتمع المبادرين ورواد الأعمال والمستهلكين، وهي مجانية بالكامل ولا تسعى لتحقيق هدف ربحي طوال فترة قيام الموقع.
                    </div>
                </div>
                <div class="ArticleSeparator_Form"></div>
                <div class="ResumeTable_Info_Title">ماهي الأداة التي تود استخدامها؟</div>
                <div id="formDiv">
                    <div class="serviceTypeDiv">
                        <form id="toolType" onsubmit="return false;">
                            <div class="serviceTypeSelections" onclick="sTselected();">
                                <ul>
                                    <li>
                                        <input type="radio" id="feasibility" value="feasibility" name="toolType">
                                        <label for="feasibility">دراسة جدوى كاملة</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="consumptionOptimization" value="consumptionOptimization" name="toolType">
                                        <label for="consumptionOptimization">ترشيد إنفاق شخصي</label>
                                        <div class="check"></div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <div id="codeof_feasibility">                    <div id="feasibility_result"></div>
                            <input type="hidden" id="FeasibilityID" value="">
                            <input type="hidden" id="inputData1" value="">
                            <input type="hidden" id="inputData2" value="">
                            <script>
                                // Feasibility Submission for printing
                                function submitFeasibility() {
                                    toggleLoadingBar(1);
                                    $("#saveButton").attr("disable","disable");
                                    var fid = $("#FeasibilityID").val();
                                    var in1 = $("#inputData1").val();
                                    var in2 = $("#inputData2").val();
                                    var out1 = $("#OUTPUT_PART1").html();
                                    var out2 = $("#OUTPUT_PART2").html();
                                    var out3 = $("#OUTPUT_PART3").html();
                                    $.ajax({
                                        type: "POST",
                                        cache: false,
                                        url: "http://abdullah.com.kw/web/template/pc/ajax/f_tools.php?f=feasibility4&r="+Math.random(),
                                        data: { fid: fid, in1 : in1, in2 : in2, out1 : out1, out2 : out2, out3 : out3 },
                                        success: function(html){
                                            $("#feasibility_result").html(html);
                                            setTimeout(function() { toggleLoadingBar(0); $("#saveButton").removeAttr("disable"); },500);
                                        }
                                    });
                                }
                                // Charting Method
                                function drawChart(type,div,title,mdata) {
                                    if(type == "pie") {
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(pieDrawChart);

                                        function pieDrawChart() {
                                            if(mdata.length > 0) {
                                                var data = new google.visualization.DataTable();
                                                data.addColumn('string', 'التكلفة');
                                                data.addColumn('number', 'القيمة');
                                                data.addRows(mdata);

                                                // Set chart options
                                                var options = { 'width':400,                                                        'height':300,
                                                    'title':title,
                                                    'pieHole': 0.4,
                                                    'pieSliceText': 'none',
                                                    'fontName': 'AbdullahKufiNormal',
                                                    'colors': ['#c20208', '#dc1e25', '#e02c32', '#e73f45', '#ee565b', '#f56d71','#f9888c', '#fda3a6']
                                                };

                                                var chart = new google.visualization.PieChart(document.getElementById(div+"Chart"));
                                                chart.draw(data, options);
                                                $("#"+div+"Div").show();
                                            } else {
                                                $("#"+div+"Div").hide();
                                            }
                                        }
                                    } else if(type == "line") {
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(barDrawChart);

                                        function barDrawChart() {
                                            if(mdata.length > 1) {
                                                var data = new google.visualization.DataTable();
                                                data.addColumn('string', 'السنة المالية');
                                                data.addColumn('number', 'إيرادات');
                                                data.addColumn('number', 'تكاليف');
                                                data.addColumn('number', 'أرباح');
                                                data.addRows(mdata);

                                                var options = {
                                                    'width':400,                                            'height':300,
                                                    'title':title,
                                                    'curveType': 'function',
                                                    'legend': {position: 'bottom', textStyle: {fontSize: 11}},
                                                    'fontName': 'AbdullahKufiNormal',
                                                    'colors': ['#fda3a6','#e73f45','#c20208']
                                                };
                                                var chart = new google.visualization.AreaChart(document.getElementById(div+"Chart"));
                                                chart.draw(data, options);
                                                $("#"+div+"Div").show();
                                            } else {
                                                $("#"+div+"Div").hide();
                                            }
                                        }
                                    }
                                }
                                // General Stuff
                                function removeElement(id) {
                                    $("#"+id).remove();
                                    fieldsUpdated();
                                }
                                function mustBeInt(id,v) {
                                    if($.isNumeric(v)) {
                                    } else {
                                        $("#"+id).val("");
                                    }
                                    fieldsUpdated();
                                }
                                function otherRemoveElement(id) {
                                    $("#"+id).remove();
                                    otherFieldsUpdated();
                                }
                                function otherMustBeInt(id,v) {
                                    if($.isNumeric(v)) {
                                    } else {
                                        $("#"+id).val("");
                                    }
                                    otherFieldsUpdated();
                                }
                                function hideTabs() {
                                    $("#Project_Tab").hide();
                                    $("#Financial_Tab").hide();
                                    $("#Market_Tab").hide();
                                    $("#SWOT_Tab").hide();
                                    $("#Project_Arrow").html("&#x25CB;");
                                    $("#Financial_Arrow").html("&#x25CB;");
                                    $("#Market_Arrow").html("&#x25CB;");
                                    $("#SWOT_Arrow").html("&#x25CB;");
                                }
                                function toggleTab(id) {
                                    if($("#"+id+"_Tab").is(":visible")) {
                                        $("#"+id+"_Tab").hide();
                                        $("#"+id+"_Arrow").html("&#x25CB;");
                                    } else {
                                        hideTabs();
                                        $("#"+id+"_Tab").show();
                                        $("#"+id+"_Arrow").html("&#x25CF;");
                                    }
                                }
                                // ================================================================= BEG: Fields Updated()
                                function fieldsUpdated() {

                                    feasibilityEdited();

                                    // General Vars
                                    var i = c = t = ti = 0;
                                    var OD = [];
                                    var text_temp = "";
                                    var text2_temp = "";
                                    var dataJSON = {};
                                    OD["AverageProfit"] = 0;
                                    OD["CapitalRecovery"] = 0;
                                    OD["TotalSales"] = 0;
                                    OD["AverageSales"] = 0;
                                    OD["MarketShare"] = 0;

                                    // General stuff
                                    $("table[name=debtPaymentFixedCostElement]").each(function() { $(this).remove() });
                                    $("table[name=debtOverflowSetupCostElement]").each(function() { $(this).remove() });
                                    var _cn = ($("#currencyName").val().length > 0 && $("#currencyName").val().length < 6) ? $("#currencyName").val() : "د.ك.";
                                    var _cd = ($("#currencyDecimals").val() > -1 && $("#currencyDecimals").val() < 4 && $("#currencyDecimals").val() != "") ? $("#currencyDecimals").val() : 2;
                                    var _cvat = ($("#currencyVAT").val() > -1 && $("#currencyVAT").val() < 100) ? ($("#currencyVAT").val()/100) : 0;
                                    var _sy = ($("#studyYears").val() > 0 && $("#studyYears").val() < 16 && $("#studyYears").val() != "") ? $("#studyYears").val() : 3;
                                    var marketValue = (!isNaN($("#marketValue").val())) ? $("#marketValue").val() : 0;

                                    dataJSON["_cn"] = _cn;
                                    dataJSON["_cd"] = _cd;
                                    dataJSON["_cvat"] = _cvat;
                                    dataJSON["_sy"] = _sy;
                                    dataJSON["marketValue"] = marketValue;

                                    // Liabilities
                                    var liabilityElement = [];
                                    dataJSON["Liability"] = {}
                                    OD["TotalBorrowed"] = 0;
                                    OD["TotalLiabilities"] = 0;
                                    i = 0; $('input[name=debtBank]').each(function() { if(typeof liabilityElement[i] == 'undefined') { liabilityElement[i] = []; } liabilityElement[i]["Bank"] = $(this).val(); i++; });
                                    i = 0; $('input[name=debtAmount]').each(function() { if(typeof liabilityElement[i] == 'undefined') { liabilityElement[i] = []; } liabilityElement[i]["Amount"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=debtInterest]').each(function() { if(typeof liabilityElement[i] == 'undefined') { liabilityElement[i] = []; } liabilityElement[i]["Interest"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=settlementYears]').each(function() { if(typeof liabilityElement[i] == 'undefined') { liabilityElement[i] = []; } liabilityElement[i]["Period"] = liabilityElement[i]["Remaining"] = Number($(this).val()); i++; });
                                    $("#outputDebts").html("لا يوجد بيانات حتى الآن ..");
                                    for(i=0; i<liabilityElement.length; i++) {
                                        if(liabilityElement[i]["Bank"].length > 0 && !isNaN(liabilityElement[i]["Amount"]) && !isNaN(liabilityElement[i]["Interest"]) && !isNaN(liabilityElement[i]["Period"]) && liabilityElement[i]["Period"] != 0) {
                                            dataJSON["Liability"][i] = {};
                                            dataJSON["Liability"][i]["Bank"] = liabilityElement[i]["Bank"];
                                            dataJSON["Liability"][i]["Amount"] = liabilityElement[i]["Amount"];
                                            dataJSON["Liability"][i]["Interest"] = liabilityElement[i]["Interest"];
                                            dataJSON["Liability"][i]["Period"] = liabilityElement[i]["Period"];

                                            OD["TotalBorrowed"] += parseFloat(liabilityElement[i]["Amount"]);
                                            if(liabilityElement[i]["Interest"] > 0 ) {
                                                liabilityElement[i]["Payment"] = ((liabilityElement[i]["Interest"]/100/12) * liabilityElement[i]["Amount"]) / (1-Math.pow((1+(liabilityElement[i]["Interest"]/100/12)),(-1*(liabilityElement[i]["Period"]*12))));
                                            } else {
                                                liabilityElement[i]["Payment"] = liabilityElement[i]["Amount"] / liabilityElement[i]["Period"] / 12;
                                            }
                                            if(liabilityElement[i]["Payment"] > 0) { addDebtPaymentFixedCost(liabilityElement[i]["Bank"],liabilityElement[i]["Payment"].toFixed(currencyDecimals),liabilityElement[i]["Period"]); }
                                            liabilityElement[i]["Payable"] = liabilityElement[i]["Payment"] * 12 * liabilityElement[i]["Period"];
                                            OD["TotalLiabilities"] += liabilityElement[i]["Payable"];
                                            liabilityElement[i]["Payment_woInterest"] = liabilityElement[i]["Amount"] / 12 / liabilityElement[i]["Period"];
                                            if(i==0) $("#outputDebts").html("");
                                            $("#outputDebts").append(''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+liabilityElement[i]["Bank"]+'<br>('+liabilityElement[i]["Interest"]+'% - '+ liabilityElement[i]["Period"] +' سنوات)</td>'+
                                                '<td class="tools_0024">'+readableAmount(liabilityElement[i]["Amount"],_cd,_cn)+'<br>('+readableAmount(liabilityElement[i]["Payable"],_cd,_cn)+')</td>'+
                                                '</tr>'+
                                                '</table>'+
                                                '');
                                        } else {
                                            liabilityElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalDebts").html(readableAmount(OD["TotalLiabilities"],_cd,""));
                                    $("#totalDebts_currency").html(_cn);
                                    $("#outputTotalDebts").html(readableAmount(OD["TotalLiabilities"],_cd,""));
                                    $("#outputTotalDebts_currency").html(_cn);

                                    // Assets
                                    var assetElement = [];
                                    dataJSON["Asset"] = {}
                                    var chartAssetsDistribution = [];
                                    OD["TotalAssets"] = 0;
                                    OD["UnassignedLiabilities"] = 0;
                                    OD["Self_Financing"] = 0;
                                    i = 0; $('input[name=setupCostName]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["Name"] = $(this).val(); i++; });
                                    i = 0; $('input[name=setupCostValue]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["Value"] = assetElement[i]["AccumulatedValue"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=setupCostIsCash]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["IsCash"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=setupCostLifeSpan]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["LifeSpan"] = assetElement[i]["LifeToGo"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=setupCostDepreciation]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["DepreciationRatio"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=setupCostIncludesVAT]').each(function() { if(typeof assetElement[i] == 'undefined') { assetElement[i] = []; } assetElement[i]["IncludesVAT"] = false; if($(this).is(":checked")) { assetElement[i]["IncludesVAT"] = true; } i++; });
                                    $("#outputSetupCosts").html("لا يوجد بيانات حتى الآن ..");
                                    for(i=0; i<assetElement.length; i++) {
                                        if(assetElement[i]["Name"].length > 0 && !isNaN(assetElement[i]["Value"])) {
                                            if(assetElement[i]["IsCash"] == 0) {
                                                dataJSON["Asset"][i] = {};
                                                dataJSON["Asset"][i]["Name"] = assetElement[i]["Name"];
                                                dataJSON["Asset"][i]["Value"] = assetElement[i]["Value"];
                                                dataJSON["Asset"][i]["Depreciation"] = assetElement[i]["DepreciationRatio"];
                                                dataJSON["Asset"][i]["LifeSpan"] = assetElement[i]["LifeSpan"];
                                                dataJSON["Asset"][i]["IncludesVAT"] = assetElement[i]["IncludesVAT"];
                                            }
                                            OD["TotalAssets"] += parseFloat(assetElement[i]["Value"]);
                                            assetElement[i]["DepreciationValue"] = 0;
                                            assetElement[i]["VATofDepreciation"] = 0;
                                            chartAssetsDistribution.push([assetElement[i]["Name"],assetElement[i]["Value"]]);
                                            if(i==0) $("#outputSetupCosts").html("");
                                            $("#outputSetupCosts").append(''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+assetElement[i]["Name"]+'<br>('+assetElement[i]["LifeSpan"]+' سنوات)</td>'+
                                                '<td class="tools_0024">'+readableAmount(assetElement[i]["Value"],_cd,_cn)+'<br>('+readableAmount(assetElement[i]["DepreciationRatio"],_cd,"")+'%)</td>'+
                                                '</tr>'+
                                                '</table>'+
                                                '');
                                        } else {
                                            assetElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    if(assetElement.length > 0) { drawChart("pie","chartSetupCosts","",chartAssetsDistribution); } else { $("#chartSetupCostsDiv").hide(); }
                                    if(OD["TotalBorrowed"] > OD["TotalAssets"]) {
                                        OD["UnassignedLiabilities"] = OD["TotalBorrowed"] - OD["TotalAssets"];
                                        assetElement[i] = [];
                                        assetElement[i]["Name"] = "مبالغ غير مستغلة";
                                        assetElement[i]["Value"] = assetElement[i]["AccumulatedValue"] = OD["UnassignedLiabilities"];
                                        assetElement[i]["DepreciationValue"] = assetElement[i]["LifeSpan"] = assetElement[i]["LifeToGo"] = assetElement[i]["DepreciationRatio"] = assetElement[i]["VATofDepreciation"] = assetElement[i]["VATofDepreciation"] = 0;
                                        assetElement[i]["IncludesVAT"] = false;
                                        assetElement[i]["IsCash"] = 1;
                                        addDebtOverflowSetupCost(assetElement[i]["Name"],assetElement[i]["Value"]);
                                        i++;
                                        OD["TotalAssets"] += OD["UnassignedLiabilities"];
                                    }
                                    OD["Self_Financing"] = ((OD["TotalAssets"] - OD["TotalBorrowed"]) > 0) ? (OD["TotalAssets"] - OD["TotalBorrowed"]) : 0;
                                    // Hang on ..
                                    $("#totalSetupCost").html(readableAmount(OD["TotalAssets"],_cd,""));
                                    $("#totalSetupCost_currency").html(_cn);
                                    $("#outputTotalSetupCost").html(readableAmount(OD["TotalAssets"],_cd,""));
                                    $("#outputTotalSetupCost_currency").html(_cn);
                                    $("#totalCapital_value").html(readableAmount(OD["TotalAssets"],_cd,""));
                                    $("#totalCapital_currency").html(_cn);
                                    $("#CapitalDebts_value").html(readableAmount(OD["TotalLiabilities"],_cd,""));
                                    $("#CapitalDebts_currency").html(_cn);
                                    $("#CapitalPrivate_value").html(readableAmount(OD["Self_Financing"],_cd,""));
                                    $("#CapitalPrivate_currency").html(_cn);
                                    // Hang on ..
                                    if(OD["TotalBorrowed"] > 0 || OD["TotalAssets"] > 0) {
                                        var chartCapitalDistribution = [];
                                        chartCapitalDistribution.push(["مديونية",OD["TotalBorrowed"]]);
                                        chartCapitalDistribution.push(["تمويل خاص",OD["Self_Financing"]]);
                                        drawChart("pie","chartCapitalDistribution","",chartCapitalDistribution);
                                    } else {
                                        $("#chartCapitalDistributionDiv").hide();
                                    }

                                    // Employees
                                    var employeeElement = [];
                                    dataJSON["Employee"] = {}
                                    OD["TotalSalaries"] = 0;
                                    i = 0; $('input[name=employeeTitle]').each(function() { if(typeof employeeElement[i] == 'undefined') { employeeElement[i] = []; } employeeElement[i]["Title"] = $(this).val(); i++; });
                                    i = 0; $('input[name=employeeTotal]').each(function() { if(typeof employeeElement[i] == 'undefined') { employeeElement[i] = []; } employeeElement[i]["Total"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=employeeSalary]').each(function() { if(typeof employeeElement[i] == 'undefined') { employeeElement[i] = []; } employeeElement[i]["Salary"] = Number($(this).val()); i++; });
                                    $("#outputEmployees").html("لا يوجد بيانات حتى الآن ..");
                                    for(i=0; i<employeeElement.length; i++) {
                                        if(employeeElement[i]["Title"].length > 0 && !isNaN(employeeElement[i]["Salary"]) && !isNaN(employeeElement[i]["Total"])) {
                                            dataJSON["Employee"][i] = {};
                                            dataJSON["Employee"][i]["Title"] = employeeElement[i]["Title"];
                                            dataJSON["Employee"][i]["Total"] = employeeElement[i]["Total"];
                                            dataJSON["Employee"][i]["Salary"] = employeeElement[i]["Salary"];

                                            OD["TotalSalaries"] += parseFloat(employeeElement[i]["Salary"] * employeeElement[i]["Total"]);
                                            if(i == 0) $("#outputEmployees").html("");
                                            $("#outputEmployees").append(''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+employeeElement[i]["Total"]+' × '+employeeElement[i]["Title"]+'</td>'+
                                                '<td class="tools_0024">'+readableAmount(employeeElement[i]["Salary"],_cd,_cn)+'</td>'+
                                                '</tr>'+
                                                '</table>'+
                                                '');
                                        } else {
                                            employeeElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalSalaries").html(readableAmount(OD["TotalSalaries"],_cd,""));
                                    $("#totalSalaries_currency").html(_cn);
                                    $("#outputTotalSalaries").html(readableAmount(OD["TotalSalaries"],_cd,""));
                                    $("#outputTotalSalaries_currency").html(_cn);


                                    // Fixed Costs
                                    var fcElement = [];
                                    dataJSON["FC"] = {};
                                    OD["TotalFC"] = 0;
                                    OD["TotalFCPaidVAT"] = 0;
                                    i = 0; $('input[name=fixedCostName]').each(function() { if(typeof fcElement[i] == 'undefined') { fcElement[i] = []; } fcElement[i]["Name"] = $(this).val(); i++; });
                                    i = 0; $('input[name=fixedCostPaymentPeriod]').each(function() { if(typeof fcElement[i] == 'undefined') { fcElement[i] = []; } fcElement[i]["Period"] = fcElement[i]["Remaining"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=fixedCostAmount]').each(function() { if(typeof fcElement[i] == 'undefined') { fcElement[i] = []; } fcElement[i]["Amount"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=fixedCostIncludesVAT]').each(function() { if(typeof fcElement[i] == 'undefined') { fcElement[i] = []; } fcElement[i]["IncludesVAT"] = false; if($(this).is(":checked")) { fcElement[i]["IncludesVAT"] = true; } i++; });
                                    i = 0; $('input[name=fixedCostIsDebtPayment]').each(function() { if(typeof fcElement[i] == 'undefined') { fcElement[i] = []; } fcElement[i]["IsDebtPayment"] = Number($(this).val()); i++; });
                                    $("#outputFixedCosts").html("لا يوجد بيانات حتى الآن ..");
                                    for(i=0; i<fcElement.length; i++) {
                                        if(fcElement[i]["Name"].length > 0 && !isNaN(fcElement[i]["Amount"]) && !isNaN(fcElement[i]["Period"])) {
                                            if(fcElement[i]["IsDebtPayment"] == 0) {
                                                dataJSON["FC"][i] = {};
                                                dataJSON["FC"][i]["Name"] = fcElement[i]["Name"];
                                                dataJSON["FC"][i]["Amount"] = fcElement[i]["Amount"];
                                                dataJSON["FC"][i]["IncludesVAT"] = fcElement[i]["IncludesVAT"];
                                            }
                                            OD["TotalFC"] += parseFloat(fcElement[i]["Amount"]);
                                            fcElement[i]["VATAmount"] = (fcElement[i]["IncludesVAT"]) ? (fcElement[i]["Amount"] * _cvat) : 0;
                                            OD["TotalFCPaidVAT"] += fcElement[i]["VATAmount"];
                                            text_temp = (fcElement[i]["Period"] != 0) ? (fcElement[i]["Period"] + " سنوات") : "مدى الحياة" ;
                                            if(i == 0) $("#outputFixedCosts").html("");
                                            $("#outputFixedCosts").append(''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+fcElement[i]["Name"]+'<br>('+text_temp+')</td>'+
                                                '<td class="tools_0024">'+readableAmount(fcElement[i]["Amount"],_cd,_cn)+'<br>('+readableAmount(fcElement[i]["VATAmount"],_cd,_cn)+')</td>'+
                                                '</tr>'+
                                                '</table>'+
                                                '');
                                        } else {
                                            fcElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalFixedCosts").html(readableAmount(OD["TotalFC"],_cd,""));
                                    $("#totalFixedCosts_currency").html(_cn);
                                    $("#outputTotalFixedCosts").html(readableAmount(OD["TotalFC"],_cd,""));
                                    $("#outputTotalFixedCosts_currency").html(_cn);

                                    // Products and Sales
                                    var productElement = [];
                                    dataJSON["Product"] = {};
                                    OD["TotalRevenue_wTax"] = 0;
                                    OD["TotalRevenue_woTax"] = 0;
                                    OD["TotalUnitsSold"] = 0;
                                    OD["TotalVC_wTax"] = 0;
                                    OD["TotalVC_woTax"] = 0;
                                    i = 0; $('input[name=revenueName]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["Name"] = $(this).val(); i++; });
                                    i = 0; $('input[name=revenueVariableCost]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["VC"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=revenueQuantity]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["Quantity"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=revenueCapacity]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["Capacity"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=revenueYearlyIncrease]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["YearlyIncrease"] = Number($(this).val()); i++; });
                                    i = 0; $('input[name=revenuePrice]').each(function() { if(typeof productElement[i] == 'undefined') { productElement[i] = []; } productElement[i]["Price"] = Number($(this).val()); i++; });
                                    $("#outputRevenue").html("لا يوجد بيانات حتى الآن ..");
                                    for(i=0; i<productElement.length; i++) {
                                        if(productElement[i]["Name"].length > 0 && !isNaN(productElement[i]["VC"]) && !isNaN(productElement[i]["Quantity"]) && !isNaN(productElement[i]["Price"])) {
                                            dataJSON["Product"][i] = {};
                                            dataJSON["Product"][i]["Name"] = productElement[i]["Name"];
                                            dataJSON["Product"][i]["VC"] = productElement[i]["VC"];
                                            dataJSON["Product"][i]["Quantity"] = productElement[i]["Quantity"];
                                            dataJSON["Product"][i]["Capacity"] = productElement[i]["Capacity"];
                                            dataJSON["Product"][i]["YearlyIncrease"] = productElement[i]["YearlyIncrease"];
                                            dataJSON["Product"][i]["Price"] = productElement[i]["Price"];

                                            productElement[i]["Capacity"] = (!isNaN(productElement[i]["Capacity"]) && productElement[i]["Capacity"] > productElement[i]["Quantity"]) ? Math.round(productElement[i]["Capacity"]) : Math.round(productElement[i]["Quantity"]);
                                            productElement[i]["Revenue_woTax"] = productElement[i]["Price"] * productElement[i]["Quantity"];
                                            productElement[i]["Revenue_wTax"] = productElement[i]["Revenue_woTax"] + (productElement[i]["Revenue_woTax"] * _cvat);
                                            OD["TotalRevenue_woTax"] += productElement[i]["Revenue_woTax"];
                                            OD["TotalRevenue_wTax"] += productElement[i]["Revenue_wTax"];
                                            productElement[i]["TotalVC_wTax"] = productElement[i]["VC"] * productElement[i]["Quantity"];
                                            productElement[i]["TotalVC_woTax"] = productElement[i]["TotalVC_wTax"] - (productElement[i]["TotalVC_wTax"] * _cvat);
                                            OD["TotalVC_wTax"] += productElement[i]["TotalVC_wTax"];
                                            OD["TotalVC_woTax"] += productElement[i]["TotalVC_woTax"];
                                            OD["TotalUnitsSold"] += productElement[i]["Quantity"];
                                            if(i == 0) $("#outputRevenue").html("");
                                            $("#outputRevenue").append(''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+productElement[i]["Name"]+'<br>('+readableAmount(productElement[i]["Quantity"],0,"")+')<br>('+readableAmount(productElement[i]["Capacity"],0,"")+')</td>'+
                                                '<td class="tools_0024">'+readableAmount(productElement[i]["Price"],_cd,_cn)+'<br>('+readableAmount(productElement[i]["VC"],_cd,_cn)+')<br>('+readableAmount(productElement[i]["YearlyIncrease"],1,"")+'%)</td>'+
                                                '</tr>'+
                                                '</table>'+
                                                '');
                                        } else {
                                            productElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalRevenue").html(readableAmount(OD["TotalRevenue_wTax"],_cd,""));
                                    $("#totalRevenue_currency").html(_cn);
                                    $("#outputTotalRevenue").html(readableAmount(OD["TotalRevenue_wTax"],_cd,""));
                                    $("#outputTotalRevenue_currency").html(_cn);

                                    $("#inputData1").val(JSON.stringify(dataJSON));
                                    // ================================================================= BEG: OF YEARLY REPORT
                                    var yearFigures = [];
                                    var chartProfitibility = [];
                                    for(i = 0; i < _sy; i++) {

                                        yearFigures[i] = [];
                                        yearFigures[i]["Payment_woInterest"] = 0;
                                        yearFigures[i]["TotalLiabilities"] = (i == 0) ? OD["TotalBorrowed"] : yearFigures[i-1]["TotalLiabilities"] ;
                                        yearFigures[i]["TotalLiabsToEquity"] = (i == 0) ? 0 : yearFigures[i-1]["TotalLiabsToEquity"];

                                        yearFigures[i]["RetainedEarnings"] = (i == 0) ? 0 : yearFigures[i-1]["RetainedEarnings"];
                                        yearFigures[i]["TotalAssets"] = 0;
                                        yearFigures[i]["LongTermAssets"] = 0;
                                        yearFigures[i]["CashLongTermAssets"] = 0;
                                        yearFigures[i]["AccDepr"] = 0;
                                        yearFigures[i]["AccDeprToTA"] = 0;
                                        yearFigures[i]["ValueOfAssetsBought"] = 0;
                                        yearFigures[i]["ValueOfAssetsSold"] = 0;
                                        yearFigures[i]["VATofDepreciation"] = 0;

                                        yearFigures[i]["TotalFC"] = 0;
                                        yearFigures[i]["TotalFC_woPayments"] = 0;

                                        yearFigures[i]["FCPaidVAT"] = 0;

                                        // Revenues
                                        yearFigures[i]["TotalRevenueBeforeTax"] = 0;
                                        yearFigures[i]["TotalRevenue_wTax"] = 0;
                                        yearFigures[i]["TotalRevenue_woTax"] = 0;
                                        yearFigures[i]["TotalUnitsSold"] = 0;
                                        yearFigures[i]["TotalVC_wTax"] = 0;
                                        yearFigures[i]["TotalVC_woTax"] = 0;

                                        // Let's deal with the sales
                                        for(t=0; t<productElement.length; t++) {
                                            if(i!=0) productElement[t]["Quantity"] = ((productElement[t]["Quantity"] + (productElement[t]["Quantity"]*productElement[t]["YearlyIncrease"]/100)) > productElement[t]["Capacity"]) ? Math.round(productElement[t]["Capacity"]) : Math.round(productElement[t]["Quantity"] + (productElement[t]["Quantity"]*productElement[t]["YearlyIncrease"]/100)) ;
                                            productElement[t]["Revenue_woTax"] = productElement[t]["Price"] * productElement[t]["Quantity"];
                                            productElement[t]["Revenue_wTax"] = productElement[t]["Revenue_woTax"] + (productElement[t]["Revenue_woTax"] * _cvat);
                                            yearFigures[i]["TotalRevenue_woTax"] += (productElement[t]["Revenue_woTax"] * 12);
                                            yearFigures[i]["TotalRevenue_wTax"] += (productElement[t]["Revenue_wTax"] * 12);
                                            productElement[t]["TotalVC_wTax"] = productElement[t]["VC"] * productElement[t]["Quantity"];
                                            productElement[t]["TotalVC_woTax"] = productElement[t]["TotalVC_wTax"] - (productElement[t]["TotalVC_wTax"] * _cvat);
                                            yearFigures[i]["TotalVC_wTax"] += (productElement[t]["TotalVC_wTax"] * 12);
                                            yearFigures[i]["TotalVC_woTax"] += (productElement[t]["TotalVC_woTax"] * 12);
                                            yearFigures[i]["TotalUnitsSold"] += (productElement[t]["Quantity"] * 12);
                                            productElement[t]["VCwoTax"] = productElement[t]["VC"] - (productElement[t]["VC"] * _cvat);
                                        }
                                        OD["TotalSales"] += yearFigures[i]["TotalRevenue_wTax"];
                                        yearFigures[i]["VCPaidVAT"] = yearFigures[i]["TotalVC_wTax"] - yearFigures[i]["TotalVC_woTax"];

                                        // Expenses
                                        yearFigures[i]["TotalExpensesBeforeTax"] = 0;
                                        yearFigures[i]["VATin"] = 0;
                                        yearFigures[i]["VATout"] = 0;
                                        yearFigures[i]["VAToutCash"] = 0;
                                        yearFigures[i]["PendingVAT"] = 0;
                                        yearFigures[i]["ProfitBeforeTax"] = 0;
                                        yearFigures[i]["ProfitAfterTax"] = 0;
                                        yearFigures[i]["AverageProfitPerSale"] = 0;

                                        // Cash-Flow
                                        yearFigures[i]["CashFlowFromOperating"] = 0;
                                        yearFigures[i]["CashFlowFromInvesting"] = 0;
                                        yearFigures[i]["CashFlowFromFinancing"] = 0;
                                        yearFigures[i]["NetCashFlow"] = 0;
                                        yearFigures[i]["CashFlowBeginning"] = (i==0) ? OD["UnassignedLiabilities"] : yearFigures[i-1]["CashFlowEnding"];
                                        yearFigures[i]["CashFlowEnding"] = 0;

                                        // Profitibility Stuff
                                        yearFigures[i]["FinalTotalExpenses"] = 0;
                                        yearFigures[i]["FinalTotalRevenue"] = 0;
                                        yearFigures[i]["FinalTotalProfit"] = 0;

                                        // Assets
                                        if(assetElement.length > 0) {
                                            for( t = 0; t < assetElement.length; t++) {
                                                if(assetElement[t]["LifeToGo"] > 0 || assetElement[t]["LifeSpan"] == 0) {
                                                    assetElement[t]["LifeToGo"] = ((assetElement[t]["LifeToGo"]-1) < 0) ? 0 : (assetElement[t]["LifeToGo"]-1);
                                                } else {
                                                    assetElement[t]["LifeToGo"] = assetElement[t]["LifeSpan"];
                                                    yearFigures[i]["ValueOfAssetsSold"] += assetElement[t]["AccumulatedValue"];
                                                    assetElement[t]["AccumulatedValue"] = assetElement[t]["Value"];
                                                    yearFigures[i]["ValueOfAssetsBought"] += assetElement[t]["Value"];
                                                    assetElement[t]["LifeToGo"]--;
                                                }
                                                if(assetElement[t]["IsCash"]) yearFigures[i]["CashLongTermAssets"] += assetElement[t]["AccumulatedValue"];
                                                yearFigures[i]["LongTermAssets"] += assetElement[t]["AccumulatedValue"];
                                                assetElement[t]["DepreciationValue"] = assetElement[t]["AccumulatedValue"] * assetElement[t]["DepreciationRatio"] / 100;
                                                assetElement[t]["VATofDepreciation"] = (assetElement[t]["IncludesVAT"]) ? (assetElement[t]["DepreciationValue"] * _cvat) : 0;
                                                yearFigures[i]["VATofDepreciation"] += assetElement[t]["VATofDepreciation"];
                                                yearFigures[i]["AccDepr"] += assetElement[t]["DepreciationValue"];
                                                assetElement[t]["AccumulatedValue"] = assetElement[t]["AccumulatedValue"] - assetElement[t]["DepreciationValue"];
                                            }
                                            yearFigures[i]["AccDeprToTA"] = ((yearFigures[i]["LongTermAssets"]) > 0) ? ((yearFigures[i]["AccDepr"]/(yearFigures[i]["LongTermAssets"])*100).toFixed(0) + "%") : "غير متوفر";
                                        }

                                        // Preparing for Income Statement
                                        yearFigures[i]["TotalRevenueBeforeTax"] = yearFigures[i]["ValueOfAssetsSold"]+yearFigures[i]["TotalRevenue_wTax"]-yearFigures[i]["TotalVC_woTax"];
                                        yearFigures[i]["VATin"] = yearFigures[i]["TotalRevenue_wTax"] - yearFigures[i]["TotalRevenue_woTax"];

                                        // Income Statement
                                        if(i == 0) { $("#Statements").html(""); } else { $("#Statements").append('<div class="pg_breaker">'); }
                                        $("#Statements").append('<div class="tools_0012_008">السنة المالية ('+(i+1)+')</div>');
                                        $("#Statements").append(''+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0016">'+
                                            '<tr>'+
                                            '<td class="tools_0012_006">بيانات الدخل</td>'+
                                            '<td class="tools_0012_007">القيمة</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">الإيرادات</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">إيرادات تشغيلية</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["TotalRevenue_woTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">تكلفة مواد أولية</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["TotalVC_woTax"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">بيع أصول مستهلكة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["ValueOfAssetsSold"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة محصلة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["VATin"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي الإيرادات</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalRevenueBeforeTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">المصروفات</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">شراء أصول جديدة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["ValueOfAssetsBought"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">تكاليف استهلاك أصول</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["AccDepr"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">رواتب موظفين</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((OD["TotalSalaries"]*12),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                        // Income Statement Fixed Costs
                                        if(fcElement.length >0) {
                                            for( t = 0; t < fcElement.length; t++) {
                                                if(fcElement[t]["Remaining"] > 0 || fcElement[t]["Period"] == 0) {
                                                    fcElement[t]["Remaining"] = ((fcElement[t]["Remaining"]-1) < 0) ? 0 : (fcElement[t]["Remaining"]-1);

                                                    yearFigures[i]["FCPaidVAT"] += (fcElement[t]["VATAmount"]*12);
                                                    yearFigures[i]["TotalFC"] += ((fcElement[t]["Amount"] - fcElement[t]["VATAmount"])*12);
                                                    yearFigures[i]["TotalFC_woPayments"] += (fcElement[t]["IsDebtPayment"] == 1) ? 0 : ((fcElement[t]["Amount"] - fcElement[t]["VATAmount"])*12);
                                                    $("#Statements").append(''+
                                                        '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                        '<tr>'+
                                                        '<td class="tools_0011_001">'+fcElement[t]["Name"]+'</td>'+
                                                        '<td class="tools_0012_001">'+readableAmount(((fcElement[t]["Amount"]-fcElement[t]["VATAmount"])*12),_cd,_cn)+'</td>'+
                                                        '</tr>'+
                                                        '</table>'+
                                                        '');
                                                }
                                            }
                                        }
                                        // Income Statement VAT
                                        yearFigures[i]["VATout"] =  yearFigures[i]["FCPaidVAT"] + yearFigures[i]["VCPaidVAT"];
                                        $("#Statements").append(''+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة مدفوعة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["VATout"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                        // Income Statement Total Expenses
                                        yearFigures[i]["TotalExpensesBeforeTax"] = yearFigures[i]["ValueOfAssetsBought"] + yearFigures[i]["AccDepr"] + yearFigures[i]["TotalFC"] + yearFigures[i]["VATout"] + (OD["TotalSalaries"]*12);
                                        $("#Statements").append(''+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي المصروفات</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalExpensesBeforeTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                        // Finalizing Income Statement
                                        yearFigures[i]["PendingVAT"] = ((yearFigures[i]["VATin"] - yearFigures[i]["VATout"]) > 0) ? (yearFigures[i]["VATin"] - yearFigures[i]["VATout"]) : 0;
                                        yearFigures[i]["ProfitBeforeTax"] = yearFigures[i]["TotalRevenueBeforeTax"] - yearFigures[i]["TotalExpensesBeforeTax"];
                                        yearFigures[i]["ProfitAfterTax"] = yearFigures[i]["ProfitBeforeTax"] - yearFigures[i]["PendingVAT"];
                                        $("#Statements").append(''+
                                            '<div class="tools_0012_005">الأرباح</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أرباح قبل الضريبة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["ProfitBeforeTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة القيمة المضافة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["PendingVAT"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي الأرباح</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["ProfitAfterTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');

                                        // Cash-flow Statement
                                        yearFigures[i]["CashFlowFromOperating"] = yearFigures[i]["TotalRevenue_woTax"] + yearFigures[i]["VATin"] - yearFigures[i]["TotalFC_woPayments"] - (OD["TotalSalaries"]*12) - yearFigures[i]["TotalVC_woTax"] - yearFigures[i]["VATout"] - yearFigures[i]["PendingVAT"];
                                        yearFigures[i]["CashFlowFromInvesting"] = yearFigures[i]["ValueOfAssetsSold"] - yearFigures[i]["ValueOfAssetsBought"];
                                        yearFigures[i]["CashFlowFromFinancing"] = (yearFigures[i]["TotalFC"] - yearFigures[i]["TotalFC_woPayments"]) * -1;
                                        yearFigures[i]["NetCashFlow"] = yearFigures[i]["CashFlowFromOperating"] + yearFigures[i]["CashFlowFromInvesting"] + yearFigures[i]["CashFlowFromFinancing"];
                                        yearFigures[i]["CashFlowEnding"] = yearFigures[i]["CashFlowBeginning"] + yearFigures[i]["NetCashFlow"];
                                        $("#Statements").append('<div class="pg_breaker"></div>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0016">'+
                                            '<tr>'+
                                            '<td class="tools_0012_006">بيانات التدفق النقدي</td>'+
                                            '<td class="tools_0012_007">القيمة</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">من العمليات التشغيلية</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">إيرادات تشغيلية</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["TotalRevenue_woTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">تكلفة مواد أولية</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["TotalVC_woTax"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">تكاليف تشغيلية</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["TotalFC_woPayments"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">رواتب موظفين</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((OD["TotalSalaries"]*-12),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة محصلة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["VATin"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة مدفوعة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["VATout"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">ضريبة القيمة المضافة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["PendingVAT"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["CashFlowFromOperating"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">من العمليات الاستثمارية</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">شراء أصول جديدة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["ValueOfAssetsBought"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">بيع أصول مستهلكة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["ValueOfAssetsSold"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["CashFlowFromInvesting"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">من العمليات التمويلية</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أقساط مطلوبات</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["CashFlowFromFinancing"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["CashFlowFromFinancing"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+

                                            '<div class="tools_0012_005">صافي التدفق النقدي</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">السيولة هذه السنة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["NetCashFlow"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">السيولة في بداية السنة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["CashFlowBeginning"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">السيولة في نهاية السنة</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["CashFlowEnding"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');

                                        // Preparing for Balance Sheet
                                        if(liabilityElement.length >0) {
                                            for( t = 0; t < liabilityElement.length; t++) {
                                                if(liabilityElement[t]["Remaining"] > 0 || liabilityElement[t]["Period"] == 0) {
                                                    liabilityElement[t]["Remaining"] = ((liabilityElement[t]["Remaining"]-1) < 0) ? 0 : (liabilityElement[t]["Remaining"]-1);
                                                    yearFigures[i]["Payment_woInterest"] += (liabilityElement[t]["Payment_woInterest"]*12);
                                                }
                                            }
                                        }
                                        yearFigures[i]["TotalLiabsToEquity"] += yearFigures[i]["Payment_woInterest"]
                                        yearFigures[i]["TotalLiabilities"] = ((yearFigures[i]["TotalLiabilities"] - yearFigures[i]["Payment_woInterest"]) < 0) ? 0 : (yearFigures[i]["TotalLiabilities"]- yearFigures[i]["Payment_woInterest"]);
                                        yearFigures[i]["TotalAssets"] = yearFigures[i]["CashFlowEnding"] + yearFigures[i]["LongTermAssets"] - yearFigures[i]["AccDepr"] - yearFigures[i]["CashLongTermAssets"];
                                        yearFigures[i]["TotalOwnersEquity"] = yearFigures[i]["RetainedEarnings"] + OD["Self_Financing"] + yearFigures[i]["ProfitAfterTax"]  + (yearFigures[i]["CashFlowFromInvesting"] * -1) + yearFigures[i]["TotalLiabsToEquity"];

                                        // Balance Sheet
                                        $("#Statements").append('<div class="pg_breaker"></div>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0016">'+
                                            '<tr>'+
                                            '<td class="tools_0012_006">ورقة الموازنة</td>'+
                                            '<td class="tools_0012_007">القيمة</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">الأصول</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">اصول المدى القصير</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["CashFlowEnding"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أصول طويلة المدى</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["LongTermAssets"]-yearFigures[i]["CashLongTermAssets"]),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">استهلاك أصول طويلة المدى</td>'+
                                            '<td class="tools_0012_001">'+readableAmount((yearFigures[i]["AccDepr"]*-1),_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي الاصول</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalAssets"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">المطلوبات</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">مطلوبات طويلة المدى</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["TotalLiabilities"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي المطلوبات</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalLiabilities"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<div class="tools_0012_005">حقوق الملاك</div>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أرباح</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["ProfitAfterTax"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+

                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أرباح متراكمة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["RetainedEarnings"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">أصول مطلوبة إلى مملوكة</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["TotalLiabsToEquity"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">صافي الاستثمار في الأصول</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(yearFigures[i]["CashFlowFromInvesting"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0011_001">رأس المال الشخصي</td>'+
                                            '<td class="tools_0012_001">'+readableAmount(OD["Self_Financing"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي حقوق الملاك</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalOwnersEquity"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0012_002">'+
                                            '<tr>'+
                                            '<td class="tools_0012_003">اجمالي المطلوبات و حقوق الملاك</td>'+
                                            '<td class="tools_0012_004">'+readableAmount(yearFigures[i]["TotalOwnersEquity"]+yearFigures[i]["TotalLiabilities"],_cd,_cn)+'</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');

                                        // Profitibility
                                        yearFigures[i]["FinalTotalExpenses"] = yearFigures[i]["TotalVC_woTax"] + yearFigures[i]["TotalExpensesBeforeTax"] + yearFigures[i]["PendingVAT"];
                                        yearFigures[i]["FinalTotalRevenue"] = yearFigures[i]["TotalRevenueBeforeTax"] + yearFigures[i]["TotalVC_woTax"];
                                        yearFigures[i]["FinalTotalProfit"] = yearFigures[i]["FinalTotalRevenue"] - yearFigures[i]["FinalTotalExpenses"];
                                        if(yearFigures[i]["FinalTotalRevenue"] > 0) chartProfitibility.push([(i+1).toString(),yearFigures[i]["FinalTotalRevenue"],yearFigures[i]["FinalTotalExpenses"],yearFigures[i]["FinalTotalProfit"]]);
                                        text_temp = (!isNaN(yearFigures[i]["FinalTotalExpenses"]/yearFigures[i]["FinalTotalRevenue"]) && yearFigures[i]["FinalTotalRevenue"] != 0) ? readableAmount((yearFigures[i]["FinalTotalExpenses"]/yearFigures[i]["FinalTotalRevenue"]*100),0,"") + "%" : "غير متوفر";
                                        text2_temp = (!isNaN(yearFigures[i]["FinalTotalProfit"]/yearFigures[i]["FinalTotalRevenue"]) && yearFigures[i]["FinalTotalRevenue"] != 0) ? readableAmount((yearFigures[i]["FinalTotalProfit"]/yearFigures[i]["FinalTotalRevenue"]*100),0,"") + "%" : "غير متوفر";

                                        if(i == 0) $("#Profitibility").html("");
                                        $("#Profitibility").append(''+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="tools_0012_009">'+(i+1)+'</td>'+
                                            '<td class="tools_0012_009">'+readableAmount(yearFigures[i]["FinalTotalExpenses"],_cd,_cn)+'<br>('+readableAmount((yearFigures[i]["FinalTotalExpenses"]/12),_cd,_cn)+')<br>('+text_temp+')</td>'+
                                            '<td class="tools_0012_009">'+readableAmount(yearFigures[i]["FinalTotalProfit"],_cd,_cn)+'<br>('+readableAmount((yearFigures[i]["FinalTotalProfit"]/12),_cd,_cn)+')<br>('+text2_temp+')</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');

                                        // Cost-Based Pricing Strategy
                                        if(productElement.length > 0) {
                                            if(i == 0) { $("#Pricings").html(""); }
                                            $("#Pricings").append('<div class="tools_0025">السنة المالية '+(i+1)+'</div>');
                                            for(t=0; t<productElement.length; t++) {
                                                text_temp = (yearFigures[i]["FinalTotalProfit"]/12) - (productElement[t]["Revenue_woTax"] - productElement[t]["TotalVC_woTax"]);
                                                text_temp = (productElement[t]["Quantity"] > 0) ? (text_temp / productElement[t]["Quantity"]) : 0;
                                                productElement[t]["BreakEvenPrice"] = ((productElement[t]["VCwoTax"] + (text_temp*(-1))) > productElement[t]["VCwoTax"] ) ? (productElement[t]["VCwoTax"] + (text_temp*(-1))) : productElement[t]["VCwoTax"];
                                                productElement[t]["ProfitMargin"] = (productElement[t]["BreakEvenPrice"] > 0) ? ((productElement[t]["Price"] - productElement[t]["BreakEvenPrice"]) / productElement[t]["BreakEvenPrice"] * 100) : "na";
                                                text_temp = (productElement[t]["ProfitMargin"] == "na") ? ((productElement[t]["Price"] > 0 && productElement[t]["Quantity"] > 0) ? "&#x221e;" : "غير متوفر") : readableAmount(productElement[t]["ProfitMargin"],0,"") + "%" ;
                                                if(!isNaN(productElement[t]["BreakEvenPrice"])) {
                                                    $("#Pricings").append(''+
                                                        '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                        '<tr>'+
                                                        '<td class="tools_0012_009">'+productElement[t]["Name"]+'</td>'+
                                                        '<td class="tools_0012_009">'+readableAmount(productElement[t]["BreakEvenPrice"],_cd,_cn)+'</td>'+
                                                        '<td class="tools_0012_009">'+text_temp+'</td>'+
                                                        '</tr>'+
                                                        '</table>'+
                                                        '');
                                                }
                                            }
                                        } else {
                                            $("#Pricings").html("لا يوجد بيانات حتى الآن ..");
                                        }

                                        // KEEP THIS AT THE END OF YEAR
                                        yearFigures[i]["RetainedEarnings"] += yearFigures[i]["ProfitAfterTax"]  + (yearFigures[i]["CashFlowFromInvesting"] * -1);
                                        OD["CapitalRecovery"] = (yearFigures[i]["RetainedEarnings"] < OD["TotalAssets"]) ? OD["CapitalRecovery"]+1 : OD["CapitalRecovery"];

                                    }
                                    // ================================================================= END: OF YEARLY REPORT

                                    // Feasibility Figures
                                    $("#outputFeasibilityFigures_Years").html(_sy);
                                    OD["AverageProfit"] = yearFigures[_sy-1]["RetainedEarnings"] / _sy;
                                    $("#outputAverageProfit").html(readableAmount(OD["AverageProfit"],_cd,_cn));
                                    if(OD["CapitalRecovery"] != 0) {
                                        if(yearFigures[i-1]["RetainedEarnings"] < OD["TotalAssets"]) {
                                            OD["CapitalRecovery"] = "أكثر من " + readableAmount(OD["CapitalRecovery"],0,"") + " سنوات";
                                        } else {
                                            OD["CapitalRecovery"] = "خلال " + readableAmount(OD["CapitalRecovery"],0,"") + " سنوات";
                                        }
                                    } else {
                                        OD["CapitalRecovery"] = "غير متوفر";
                                    }
                                    $("#outputCapitalRecovery").html(OD["CapitalRecovery"]);
                                    OD["AverageSales"] = OD["TotalSales"] / _sy;
                                    if(!isNaN(marketValue) && marketValue > 0) {
                                        OD["MarketShare"] = OD["AverageSales"] / marketValue * 100;
                                        $("#outputMarketShare").html(readableAmount(OD["MarketShare"],1,"") + "%");
                                    } else {
                                        $("#outputMarketShare").html("غير متوفر");
                                    }

                                    // Showing Charts
                                    if(chartProfitibility.length > 0) { drawChart("line","chartProfitibility","",chartProfitibility); } else { $("#chartProfitibilityDiv").hide(); }
                                }
                                function otherFieldsUpdated() {
                                    feasibilityEdited();

                                    var dataJSON = {};
                                    var mp = 0;
                                    var OD = [];
                                    var _cn = ($("#currencyName").val().length > 0 && $("#currencyName").val().length < 6) ? $("#currencyName").val() : "د.ك.";
                                    var _cd = ($("#currencyDecimals").val() > -1 && $("#currencyDecimals").val() < 4 && $("#currencyDecimals").val() != "") ? $("#currencyDecimals").val() : 2;
                                    var _cvat = ($("#currencyVAT").val() > -1 && $("#currencyVAT").val() < 100) ? ($("#currencyVAT").val()/100) : 0;

                                    // Project Information
                                    var projectName = ($("#projectName").val().length > 0) ? $("#projectName").val() : "";
                                    var projectBrief = ($("#projectBrief").val() != "") ? $("#projectBrief").val() : "";
                                    var projectOF = ($("#projectOF").val() != "") ? $("#projectOF").val() : "";

                                    dataJSON["projectName"] = projectName;
                                    dataJSON["projectBrief"] = projectBrief;
                                    dataJSON["projectOF"] = projectOF;

                                    if(projectName != "") {
                                        projectName = '<div class="tools_0002">'+projectName+'</div><div class="ArticleSeparator_Form"></div>';
                                    }
                                    if(projectBrief != "") {
                                        projectBrief = '<div class="tools_0008">'+projectBrief.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div>';
                                        mp = 1;
                                    }
                                    if(projectOF != "") {
                                        projectOF = '<div class="tools_0008">'+projectOF.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div>';
                                        mp = 1;
                                    }
                                    mp = (mp == 1) ? "<div class='pg_breaker'></div>" : "";
                                    $("#output_ProjectNameDesc").html(projectName+projectBrief+projectOF+mp);

                                    // Owners
                                    var ownerElement = [];
                                    dataJSON["Owner"] = {};
                                    OD["TotalOwners"] = 0;
                                    OD["TotalOwnersShares"] = 0;
                                    i = 0; $('input[name=ownerName]').each(function() { if(typeof ownerElement[i] == 'undefined') { ownerElement[i] = []; } ownerElement[i]["Name"] = $(this).val(); i++; });
                                    i = 0; $('input[name=ownerShare]').each(function() { if(typeof ownerElement[i] == 'undefined') { ownerElement[i] = []; } ownerElement[i]["Share"] = Number($(this).val()); i++; });
                                    var ownersOutput = "";
                                    for(i=0; i<ownerElement.length; i++) {
                                        if(ownerElement[i]["Name"].length > 0 && !isNaN(ownerElement[i]["Share"]) && ownerElement[i]["Share"] > 0) {
                                            dataJSON["Owner"][i] = {};
                                            dataJSON["Owner"][i]["Name"] = ownerElement[i]["Name"];
                                            dataJSON["Owner"][i]["Share"] = ownerElement[i]["Share"];

                                            OD["TotalOwners"]++;
                                            OD["TotalOwnersShares"] += ownerElement[i]["Share"];
                                            ownersOutput += ''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+ownerElement[i]["Name"]+'</td>'+
                                                '<td class="tools_0024">'+readableAmount(ownerElement[i]["Share"],2,"")+'%</td>'+
                                                '</tr>'+
                                                '</table>';
                                        } else {
                                            ownerElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalOwners").html(readableAmount(OD["TotalOwners"],0,""));
                                    if(OD["TotalOwnersShares"] > 100) { $("#ErrorOwners").show();
                                    } else { $("#ErrorOwners").hide(); }
                                    if(ownerElement.length > 0) {
                                        ownersOutput = ''+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="titleTD">'+
                                            '<div class="ResumeTable_Info_Title">قائمة الملاك</div>'+
                                            '</td>'+
                                            '<td class="tools_0009">'+
                                            '<span id="outputTotalOwners">'+readableAmount(OD["TotalOwners"],0,"")+'</span>'+
                                            '</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0016">'+
                                            '<tr>'+
                                            '<td class="tools_0011">الاسم</td>'+
                                            '<td class="tools_0012">الحصة</td>'+

                                            '</tr>'+
                                            '</table>'+
                                            '<div id="outputOwners" class="tools_0008">'+ownersOutput+'</div>'+
                                            '<div class="ArticleSeparator_Form"></div>'+
                                            '<div class="pg_breaker"></div>';
                                    }
                                    $("#output_ProjectOwners").html(ownersOutput);

                                    // Market
                                    var marketName = ($("#marketName").val().length > 0) ? $("#marketName").val() : "";
                                    var marketValue = (!isNaN($("#marketValue").val())) ? $("#marketValue").val() : 0;
                                    var marketDescription = ($("#marketDescription").val() != "") ? $("#marketDescription").val() : "";
                                    var marketProducts = ($("#marketProducts").val() != "") ? $("#marketProducts").val() : "";
                                    var marketTargetSegment = ($("#marketTargetSegment").val() != "") ? $("#marketTargetSegment").val() : "";
                                    var marketVendors = ($("#marketVendors").val() != "") ? $("#marketVendors").val() : "";
                                    var marketPlan = ($("#marketPlan").val() != "") ? $("#marketPlan").val() : "";
                                    var competitionDescription = ($("#competitionDescription").val() != "") ? $("#competitionDescription").val() : "";

                                    dataJSON["marketName"] = marketName;
                                    dataJSON["marketValue"] = marketValue;
                                    dataJSON["marketDescription"] = marketDescription;
                                    dataJSON["marketProducts"] = marketProducts;
                                    dataJSON["marketTargetSegment"] = marketTargetSegment;
                                    dataJSON["marketVendors"] = marketVendors;
                                    dataJSON["marketPlan"] = marketPlan;
                                    dataJSON["competitionDescription"] = competitionDescription;

                                    mp = 0;
                                    if(marketName != "") {
                                        marketName = '<div class="tools_0002">'+marketName+'<br>تداول سنوي: '+readableAmount(marketValue,_cd,_cn)+'</div><div class="ArticleSeparator_Form"></div>';
                                    }
                                    if(marketDescription != "") {
                                        marketDescription = '<div class="tools_0012_013">نبذة عن السوق ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+marketDescription.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(marketProducts != "") {
                                        marketProducts = '<div class="tools_0012_013">المنتجات أو الخدمات المقدمة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+marketProducts.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(marketTargetSegment != "") {
                                        marketTargetSegment = '<div class="tools_0012_013">الشريحة المستهدفة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+marketTargetSegment.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(marketVendors != "") {
                                        marketVendors = '<div class="tools_0012_013">اعتماد السوق والموردون ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+marketVendors.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(marketPlan != "") {
                                        marketPlan = '<div class="tools_0012_013">من الخطط التسويقية ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+marketPlan.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(competitionDescription != "") {
                                        competitionDescription = '<div class="tools_0012_013">المنافسة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+competitionDescription.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    mp = (mp == 1) ? "<div class='pg_breaker'></div>" : "";
                                    if(marketDescription == "" && marketProducts == "" && marketTargetSegment == "" && marketVendors == "" && marketPlan == "" && competitionDescription == "") { marketName = ""; }
                                    $("#output_Market").html(marketName+marketDescription+marketProducts+marketTargetSegment+marketVendors+marketPlan+competitionDescription+mp);

                                    // Competitors
                                    var competitorElement = [];
                                    dataJSON["Competitor"] = {}
                                    OD["TotalCompetitors"] = 0;
                                    OD["TotalCompetitorsShares"] = 0;
                                    i = 0; $('input[name=competitorName]').each(function() { if(typeof competitorElement[i] == 'undefined') { competitorElement[i] = []; } competitorElement[i]["Name"] = $(this).val(); i++; });
                                    i = 0; $('input[name=competitorShare]').each(function() { if(typeof competitorElement[i] == 'undefined') { competitorElement[i] = []; } competitorElement[i]["Share"] = Number($(this).val()); i++; });
                                    var competitorsOutput = "";
                                    for(i=0; i<competitorElement.length; i++) {
                                        if(competitorElement[i]["Name"].length > 0 && !isNaN(competitorElement[i]["Share"]) && competitorElement[i]["Share"] > 0) {
                                            dataJSON["Competitor"][i] = {};
                                            dataJSON["Competitor"][i]["Name"] = competitorElement[i]["Name"];
                                            dataJSON["Competitor"][i]["Share"] = competitorElement[i]["Share"];

                                            OD["TotalCompetitors"]++;
                                            OD["TotalCompetitorsShares"] += competitorElement[i]["Share"];
                                            competitorsOutput += ''+
                                                '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                '<tr>'+
                                                '<td class="tools_0023">'+competitorElement[i]["Name"]+'</td>'+
                                                '<td class="tools_0024">'+readableAmount(competitorElement[i]["Share"],2,"")+'%</td>'+
                                                '</tr>'+
                                                '</table>';
                                        } else {
                                            competitorElement.splice(i,1);
                                            i--;
                                        }
                                    }
                                    $("#totalCompetitors").html(readableAmount(OD["TotalCompetitors"],0,""));
                                    if(OD["TotalCompetitorsShares"] > 100) { $("#ErrorCompetitors").show();
                                    } else { $("#ErrorCompetitors").hide(); }
                                    if(competitorElement.length > 0) {
                                        competitorsOutput = ''+
                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                            '<tr>'+
                                            '<td class="titleTD">'+
                                            '<div class="ResumeTable_Info_Title">المنافسون في السوق</div>'+
                                            '</td>'+
                                            '<td class="tools_0009">'+
                                            '<span id="outputTotalCompetitors">'+readableAmount(OD["TotalCompetitorsShares"],0,"")+'</span>'+
                                            '</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '<table cellpadding="0" cellspacing="0" class="tools_0016">'+
                                            '<tr>'+
                                            '<td class="tools_0011">اسم المنافس</td>'+
                                            '<td class="tools_0012">الحصة السوقية</td>'+

                                            '</tr>'+
                                            '</table>'+
                                            '<div id="outputCompetitors" class="tools_0008">'+competitorsOutput+'</div>'+
                                            '<div class="ArticleSeparator_Form"></div>'+
                                            '<div class="pg_breaker"></div>';
                                    }
                                    $("#output_Competitors").html(competitorsOutput);

                                    // SWOT
                                    var swotStrengths = ($("#swotStrengths").val() != "") ? $("#swotStrengths").val() : "";
                                    var swotWeaknesses = ($("#swotWeaknesses").val() != "") ? $("#swotWeaknesses").val() : "";
                                    var swotOpportunities = ($("#swotOpportunities").val() != "") ? $("#swotOpportunities").val() : "";
                                    var swotThreats = ($("#swotThreats").val() != "") ? $("#swotThreats").val() : "";

                                    dataJSON["swotStrengths"] = swotStrengths;
                                    dataJSON["swotWeaknesses"] = swotWeaknesses;
                                    dataJSON["swotOpportunities"] = swotOpportunities;
                                    dataJSON["swotThreats"] = swotThreats;

                                    mp = 0;
                                    var swotTitle = '<div class="tools_0002">تحليل SWOT</div><div class="ArticleSeparator_Form"></div>';
                                    if(swotStrengths != "") {
                                        swotStrengths = '<div class="tools_0012_013">نقاط القوة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+swotStrengths.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(swotWeaknesses != "") {
                                        swotWeaknesses = '<div class="tools_0012_013">نقاط الضعف ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+swotWeaknesses.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(swotOpportunities != "") {
                                        swotOpportunities = '<div class="tools_0012_013">الفرص المتاحة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+swotOpportunities.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    if(swotThreats != "") {
                                        swotThreats = '<div class="tools_0012_013">التهديدات المتوقعة ..</div><div class="ArticleSeparator_Form"></div><div class="tools_0008">'+swotThreats.replace(/(?:\r\n|\r|\n)/g, '<br>')+'</div><div class="ArticleSeparator_Form"></div></div>';
                                        mp = 1;
                                    }
                                    mp = (mp == 1) ? "<div class='pg_breaker'></div>" : "";
                                    if(swotStrengths == "" && swotWeaknesses == "" && swotOpportunities == "" && swotThreats == "") { swotTitle = ""; }
                                    $("#output_SWOT").html(swotTitle+swotStrengths+swotWeaknesses+swotOpportunities+swotThreats+mp);
                                    $("#inputData2").val(JSON.stringify(dataJSON));
                                }
                                // ================================================================= END: Fields Updated()
                                // Assets addition methods
                                function addDebtOverflowSetupCost(name,value) {
                                    var debtOverflowSetupCostElementId = "debtOverflowSetupCostElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#SetupCosts").prepend(''+
                                        '<table id="'+debtOverflowSetupCostElementId+'" name="debtOverflowSetupCostElement" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input type="text" name="setupCostName" id="setupCostName" autocomplete="off" value="'+name+'" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input type="number" name="setupCostValue" id="setupCostValue_'+debtOverflowSetupCostElementId+'" autocomplete="off" value="'+value+'" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr class="tools_0003">'+
                                        '<td class="tools_0017">'+
                                        'العمر الافتراضي (سنوات):'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input type="number" name="setupCostLifeSpan" id="setupCostLifeSpan_'+debtOverflowSetupCostElementId+'" autocomplete="off" value="0" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr class="tools_0003">'+
                                        '<td class="tools_0017">'+
                                        'نسبة الاستهلاك السنوي:'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input type="number" name="setupCostDepreciation" id="setupCostDepreciation_'+debtOverflowSetupCostElementId+'" autocomplete="off" value="0" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr class="tools_0003">'+
                                        '<td class="tools_0017">'+
                                        '<input type="checkbox" name="setupCostIncludesVAT" id="setupCostIncludesVAT"> خاضعة لضريبة القيمة المضافة'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<div class="tools_0021"><input type="hidden" name="setupCostIsCash" id="setupCostIsCash" value="1"><input type="number" name="setupCost_Unassigned" id="setupCost_Unassigned_'+debtOverflowSetupCostElementId+'" value="0" disabled="disabled" class="tools_0010"></div>'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                function addSetupCost(n,value,l,d,vat) {
                                    if(vat == 1) var text_temp = "checked";
                                    var setupCostElementId = "setupCostElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#SetupCosts").append(''+
                                        '<table id="'+setupCostElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onkeyup="fieldsUpdated()" onblur="fieldsUpdated()" type="text" value="'+n+'" name="setupCostName" id="setupCostName" autocomplete="off" placeholder="اسم التكلفة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+value+'" name="setupCostValue" id="setupCostValue_'+setupCostElementId+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        'العمر الافتراضي (سنوات):'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+l+'" name="setupCostLifeSpan" id="setupCostLifeSpan_'+setupCostElementId+'" autocomplete="off" placeholder="مثال: 10" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        'نسبة الاستهلاك السنوي:'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+d+'" name="setupCostDepreciation" id="setupCostDepreciation_'+setupCostElementId+'" autocomplete="off" placeholder="مثال: 10" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onclick="fieldsUpdated()" type="checkbox" name="setupCostIncludesVAT" id="setupCostIncludesVAT" '+text_temp+'> خاضعة لضريبة القيمة المضافة'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<div class="tools_0021"><input type="hidden" name="setupCostIsCash" id="setupCostIsCash" value="0"><input type="number" name="setupCost_Unassigned" id="setupCost_Unassigned_'+setupCostElementId+'" value="0" disabled="disabled" class="tools_0010"></div>'+
                                        '</td>'+
                                        '<td onclick="removeElement(\''+setupCostElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Liabilities addition methods
                                function addDebt(b,a,i,p) {
                                    var debtElementId = "debtElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#Debts").append(''+
                                        '<table id="'+debtElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="fieldsUpdated()" onblur="fieldsUpdated()" type="text" value="'+b+'" name="debtBank" id="debtBank" autocomplete="off" placeholder="اسم البنك .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+a+'" name="debtAmount" id="debtAmount_'+debtElementId+'" autocomplete="off" placeholder="قيمة القرض .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+i+'" name="debtInterest" id="debtInterest_'+debtElementId+'" autocomplete="off" placeholder="نسبة الفائدة السنوية .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" type="number" value="'+p+'" name="settlementYears" id="settlementYears_'+debtElementId+'" autocomplete="off" placeholder="سنوات السداد .." class="tools_0010">'+
                                        '</td>'+
                                        '<td onclick="removeElement(\''+debtElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Owners
                                function addOwner(n,s) {
                                    var ownerElementId = "ownerElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#Owners").append(''+
                                        '<table id="'+ownerElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" type="text" name="ownerName" id="ownerName" value="'+n+'" autocomplete="off" placeholder="الاسم .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="otherMustBeInt(this.id,this.value);" onblur="otherMustBeInt(this.id,this.value);" type="number" name="ownerShare" value="'+s+'" id="ownerShare_'+ownerElementId+'" autocomplete="off" placeholder="النسبة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td onclick="otherRemoveElement(\''+ownerElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Competitor
                                function addCompetitor(n,s) {
                                    var competitorElementId = "competitorElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#Competitors").append(''+
                                        '<table id="'+competitorElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" type="text" value="'+n+'" name="competitorName" id="competitorName" autocomplete="off" placeholder="اسم المنافس .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="otherMustBeInt(this.id,this.value);" onblur="otherMustBeInt(this.id,this.value);" type="number" value="'+s+'" name="competitorShare" id="competitorShare_'+competitorElementId+'" autocomplete="off" placeholder="الحصة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td onclick="otherRemoveElement(\''+competitorElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Employees
                                function addEmployee(ti,s,to) {
                                    var employeeElementId = "employeeElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#Employees").append(''+
                                        '<table id="'+employeeElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onkeyup="fieldsUpdated()" onblur="fieldsUpdated()" type="text" value="'+ti+'" name="employeeTitle" id="employeeTitle" autocomplete="off" placeholder="المسمى الوظيفي .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+s+'" type="number" name="employeeSalary" id="employeeSalary_'+employeeElementId+'" autocomplete="off" placeholder="الراتب .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        'عدد الموظفين في هذه المسمى:'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+to+'" type="number" name="employeeTotal" id="employeeTotal_'+employeeElementId+'" autocomplete="off" placeholder="العدد .." class="tools_0010">'+
                                        '</td>'+
                                        '<td onclick="removeElement(\''+employeeElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Fixed costs addition methods
                                function addDebtPaymentFixedCost(name,payment,period) {
                                    var debtPaymentFixedCostElementId = "debtPaymentFixedCostElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#fixedCosts").prepend(''+
                                        '<table id="'+debtPaymentFixedCostElementId+'" name="debtPaymentFixedCostElement" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input type="text" name="fixedCostName" id="fixedCostName" value="قسط مديونية: '+htmlspecialchars(name)+'" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input type="number" name="fixedCostAmount" id="fixedCostAmount_'+debtPaymentFixedCostElementId+'" value="'+payment+'" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<div class="tools_0021"><input type="hidden" name="fixedCostIsDebtPayment" id="fixedCostIsDebtPayment" value="1"><input onclick="fieldsUpdated()" type="checkbox" name="fixedCostIncludesVAT" id="fixedCostIncludesVAT"> خاضعة لضريبة القيمة المضافة</div>'+
                                        'سنوات الدفع لهذه التكلفة:'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input type="number" name="fixedCostPaymentPeriod" id="fixedCostPaymentPeriod_'+debtPaymentFixedCostElementId+'" value="'+period+'" disabled="disabled" class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                function addFixedCost(n,a,vat) {
                                    if(vat == 1) var text_temp = "checked";
                                    var fixedCostElementId = "fixedCostElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#fixedCosts").append(''+
                                        '<table id="'+fixedCostElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onkeyup="fieldsUpdated()" onblur="fieldsUpdated()" type="text" value="'+n+'" name="fixedCostName" id="fixedCostName" autocomplete="off" placeholder="اسم التكلفة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+a+'" type="number" name="fixedCostAmount" id="fixedCostAmount_'+fixedCostElementId+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0017">'+
                                        '<input onclick="fieldsUpdated()" type="checkbox" name="fixedCostIncludesVAT" id="fixedCostIncludesVAT" '+text_temp+'> خاضعة لضريبة القيمة المضافة'+
                                        '</td>'+
                                        '<td class="tools_0018">'+
                                        '<div class="tools_0021"><input type="hidden" name="fixedCostIsDebtPayment" id="fixedCostIsDebtPayment" value="0"><input type="number" name="fixedCostPaymentPeriod" id="fixedCostPaymentPeriod_'+fixedCostElementId+'" value="0" disabled="disabled" class="tools_0010"></div>'+
                                        '</td>'+
                                        '<td onclick="removeElement(\''+fixedCostElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // Products addition methods
                                function addRevenue(n,v,q,p,c,y) {
                                    var revenueElementId = "revenueElementId_" + (Math.random()*999999).toFixed(0);
                                    $("#revenue").append(''+
                                        '<table id="'+revenueElementId+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                        '<tr>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="fieldsUpdated()" onblur="fieldsUpdated()" type="text" value="'+n+'" name="revenueName" id="revenueName" autocomplete="off" placeholder="اسم المنتج .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+v+'" type="number" name="revenueVariableCost" id="revenueVariableCost_'+revenueElementId+'" autocomplete="off" placeholder="تكلفة مواد أولية .." class="tools_0010">'+
                                        '</td>'+

                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+q+'" type="number" name="revenueQuantity" id="revenueQuantity_'+revenueElementId+'" autocomplete="off" placeholder="قدرة بيع شهرية .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+p+'" type="number" name="revenuePrice" id="revenuePrice_'+revenueElementId+'" autocomplete="off" placeholder="السعر .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0018"></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+c+'" type="number" name="revenueCapacity" id="revenueCapacity_'+revenueElementId+'" autocomplete="off" placeholder="قدرة انتاج شهرية .." class="tools_0010">'+
                                        '</td>'+
                                        '<td class="tools_0019">'+
                                        '<input onkeyup="mustBeInt(this.id,this.value);" onblur="mustBeInt(this.id,this.value);" value="'+y+'" type="number" name="revenueYearlyIncrease" id="revenueYearlyIncrease_'+revenueElementId+'" autocomplete="off" placeholder="نسبة زيادة بيع سنوية .." class="tools_0010">'+
                                        '</td>'+
                                        '<td onclick="removeElement(\''+revenueElementId+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                        '</tr>'+
                                        '</table>'+
                                        '');
                                }
                                // General methods

                            </script>
                            <div id="toolForm_feasibility" class="tools_0001">
                                تعتبر دراسة الجدوى من أهم الخطوات الرئيسية لفهم ودراسة مشروعك التجاري وما إذا كان هذه المشروع سيحقق ربح مستقبلي.
                                من خلال هذه الأداة تستطيع الحصول على معلومات عامة حول جدوى مشروعك، وأفضل آلية تسعيير لمنتجاتك حسب التكاليف العامة للمشروع، بالإضافة إلى القوائم المالية.
                                يمكنك العمل على هذا النموذج بفترات متقطعة حيث ستتمكن من حفظ المعطيات والحصول على رابط مباشر يتيح لك الرجوع إلى بياناتك بوقت لاحق.
                                وعند الانتهاء تستطيع الحصول على ملف بصيغة PDF للحفظ أو الطباعة.
                                <div class="ArticleSeparator_Form">
                                    <div id="pageSource_Div_feasibility" class="tools_0003">
                                        <input type="hidden" id="sourceCodeStatus_feasibility" value="0">
                                        <div class="ArticleSeparator_Form"></div>

                                        <script>fetchSourceCode('feasibility');</script>
                                    </div>
                                    <div class="ArticleSeparator_Form"></div>
                                    للمساعدة إضغط على هذا الرمز ❗ بجانب القسم الذي تحتاج المساعدة به، أو شاهد <a href="#" onclick="playYTVideo('ZoJLr7Q5hok'); return false;">هذا المقطع</a> والذي به شرح تفصيلي عن الأداة.
                                    <div class="ArticleSeparator_Form"></div>


                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                        <tbody><tr>
                                            <td class="tools_p001">
                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTab('Project');"><span id="Project_Arrow" class="tools_0012_012">○</span> معطيات تنظيمية</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Project_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0006">
                                                                <input onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" type="text" name="projectName" id="projectName" autocomplete="off" placeholder="اسم المشروع .." class="tools_0010">
                                                            </td>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="projectBrief" id="projectBrief" autocomplete="off" placeholder="نبذة عن المشروع .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr></tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">قائمة الملاك <a href="#" onclick="$('#details_Owners_00').toggle(); $('#details_Owners_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalOwners">0</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Owners_00" class="tools_0003">جميع الأشخاص المساهمين في إنشاء هذا المشروع والمستحقين لنسبة منه سواء عن طريق الاستثمار أو المساهمة في المعرفة.</div>
                                                    <div id="details_Owners_01" class="tools_0004">
                                                        * قم بإدخال الإسم الكامل للمالك.<br>
                                                        * أدخل نسبة حصة المالك في المشروع، 40 تعني 40% من ملكية هذا المشروع.
                                                    </div>
                                                    <div id="ErrorOwners" class="tools_x005">خطأ: مجموع الحصص يجب أن لا يتعدى 100.</div>
                                                    <div id="Owners"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addOwner('',''); return false;">+ إضافة مالك جديد</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">جدوى تنظيمية <a href="#" onclick="$('#details_OF_00').toggle(); $('#details_OF_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_OF_00" class="tools_0003">تحدث بتفصيل على مدى استطاعة الملاك في إدارة هذا المشروع، وكيف ستكون آلية الإدارة.</div>
                                                    <div id="details_OF_01" class="tools_0004">
                                                        * قم بذكر خبرات الملاك.<br>
                                                        * تحدث بتفصيل عن الهيكل التنظيمي في إدارة المشروع.<br>
                                                        * تحدث بتفصيل عن سياسة العمل وآليات التطبيق.
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="projectOF" id="projectOF" autocomplete="off" placeholder="تفاصيل الجدوى الإدارية .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>


                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTab('Financial');"><span id="Financial_Arrow" class="tools_0012_012">○</span> معطيات اقتصادية</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Financial_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">خيارات محاسبية <a href="#" onclick="$('#details_formSetup_00').toggle(); $('#details_formSetup_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_formSetup_00" class="tools_0003">قم بإدخال رمز العملة وخانات الأعشار ونسبة ضريبة القيمة المضافة وفق النظام التجاري للبلد الممارس به النشاط التجاري.</div>
                                                    <div id="details_formSetup_01" class="tools_0004">
                                                        * قم باختيار رمز العملة الخاصة ببلدك.<br>
                                                        * عدد خانات الأعشار ونعني بها الخانات التي تلي الفاصلة.<br>
                                                        * ضريبة القيمة المضافة هي النسبة المحددة بالنظام التجاري في بلدك.<br>
                                                        * سنوات دراسة الجدوى وهي عدد السنوات التي بها يتم استخراج الأرقام والقوائم المالية.
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0012_014">
                                                                <select name="currencyName" id="currencyName" onchange="fieldsUpdated(); otherFieldsUpdated();" class="tools_0012_011">
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">عملات دول الخليج</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="د.ك.">دينار كويتي</option>
                                                                    <option value="ر.س.">ريال سعودي</option>
                                                                    <option value="د.ب.">دينار بحريني</option>
                                                                    <option value="د.أ.">درهم إماراتي</option>
                                                                    <option value="ر.ق.">ريال قطري</option>
                                                                    <option value="ر.ع.">ريال عماني</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">عملات دول عربية</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="د.ج.">دينار جزائري</option>
                                                                    <option value="ج.م.">جنيه مصري</option>
                                                                    <option value="د.ع.">دينار عراقي</option>
                                                                    <option value="د.أ.">دينار أردني</option>
                                                                    <option value="ل.ل.">ليرا لبنانية</option>
                                                                    <option value="د.ت.">دينار تونسي</option>
                                                                    <option value="د.ل.">دينار ليبي</option>
                                                                    <option value="د.س.">دينار سوداني</option>
                                                                    <option value="د.م.">دينار مغربي</option>
                                                                    <option value="ج.س.">جنيه سوري</option>
                                                                    <option value="ر.ي.">ريال يمني</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">رموز عملات</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="ريال">ريال</option>
                                                                    <option value="$">$</option>
                                                                    <option value="£">£</option>
                                                                    <option value="฿">฿</option>
                                                                    <option value="₲">₲</option>
                                                                    <option value="₭">₭</option>
                                                                    <option value="₡">₡</option>
                                                                </select>
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <select name="currencyDecimals" id="currencyDecimals" onchange="mustBeInt(this.id,this.value); otherFieldsUpdated();" class="tools_0012_011">
                                                                    <option value="">الأعشار</option>
                                                                    <option value="0">x</option>
                                                                    <option value="1">x.x</option>
                                                                    <option value="2">x.xx</option>
                                                                    <option value="3">x.xxx</option>
                                                                </select>
                                                            </td>
                                                        </tr><tr>
                                                            <td class="tools_0012_014">
                                                                <select name="currencyVAT" id="currencyVAT" onchange="mustBeInt(this.id,this.value); otherFieldsUpdated();" class="tools_0012_011">
                                                                    <option value="0">لايوجد ضريبة قيمة مضافة</option>
                                                                    <option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="4">4%</option><option value="5">5%</option><option value="6">6%</option><option value="7">7%</option><option value="8">8%</option><option value="9">9%</option><option value="10">10%</option><option value="11">11%</option><option value="12">12%</option><option value="13">13%</option><option value="14">14%</option><option value="15">15%</option><option value="16">16%</option><option value="17">17%</option><option value="18">18%</option><option value="19">19%</option><option value="20">20%</option><option value="21">21%</option><option value="22">22%</option><option value="23">23%</option><option value="24">24%</option><option value="25">25%</option>	                                            </select>
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <select name="studyYears" id="studyYears" onchange="mustBeInt(this.id,this.value); otherFieldsUpdated();" class="tools_0012_011">
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">سنوات دراسة الجدوى</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2" selected="selected">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                    <option value="15">15</option>
                                                                </select>
                                                            </td>
                                                        </tr></tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف التأسيس والإنشاء <a href="#" onclick="$('#details_SetupCost_00').toggle(); $('#details_SetupCost_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalSetupCost">0</span> <span id="totalSetupCost_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_SetupCost_00" class="tools_0003">هي المبالغ التي ستدفع مرة واحدة لتغطية تكاليف تأسيس المشروع وبداية عمله. تلك التكاليف تتضمن رسوم استخراج الرخصة التجارية وخلو المحل أو المكتب والمعدات والأثاث بالاضافة إلى تكاليف السيارات والادوات المكتبية وما إلى ذلك.</div>
                                                    <div id="details_SetupCost_01" class="tools_0004">
                                                        * قيمة التكلفة يجب أن تتضمن ضريبة القيمة المضافة إن وجدت.<br>
                                                        * العمر الافتراضي هو عدد السنوات التي عند إنتهائها سيتم بيع هذا الأصل بسعر يحدد بناء على نسبة الاستهلاك السنوي، ويتم شراء أصل مشابه بالقيمة المحددة أعلاه.<br>
                                                        * نسبة الاستهلاك السنوي هي النسبة المنخفضة من قيمة الأصل سنويا. مثال: إذا كان سعر السيارة 10,000 د.ك. وكانت نسبة الاستهلاك 10 سنويا فبعد السنة الأولى ستنخفض قيمة السيارة 1,000 د.ك.، وبعد الثانية ستنخفض 900 د.ك، وبعد الثالثة ستنخفض 810 د.ك، وهكذا. دع خانة نسبة الاستهلاك فارغة إذا كان الأصل لا يستهلك.
                                                    </div>
                                                    <div id="SetupCosts">
                                                    </div>
                                                    <div class="tools_0008"><a href="#" onclick="addSetupCost('','','','',''); return false;">+ إضافة تكلفة جديدة</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">المديونيات <a href="#" onclick="$('#details_Debts_00').toggle(); $('#details_Debts_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalDebts">0</span> <span id="totalDebts_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Debts_00" class="tools_0003">كيف ستمول تكاليف تأسيس وإنشاء المشروع؟ في هذه الخطوة عليك إدخال بيانات المديونيات التي ستغطي تكاليف هذا المشروع. ليس بالضرورة يتوجب أن تتساوى قيمة القرض مع تكاليف إنشاء المشروع.</div>
                                                    <div id="details_Debts_01" class="tools_0004">
                                                        * المديونيات تتضمن جميع الاصول سواء كانت نقدية أو أخرى كالسيارات وغيرها.<br>
                                                        * في خانة الفائدة السنوية، استخدام الرقم 6 يعني أن الفائدة 6%.
                                                    </div>
                                                    <div id="Debts"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addDebt('','','',''); return false;">+ إضافة مديونية جديدة</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الموظفين <a href="#" onclick="$('#details_Employees_00').toggle(); $('#details_Employees_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalSalaries">0</span> <span id="totalSalaries_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Employees_00" class="tools_0003">جميع الأشخاص المساهمين في عمليات هذا المشروع والمستحقين لراتب شهري.</div>
                                                    <div id="details_Employees_01" class="tools_0004">
                                                        * قيم بإدخال عدد المطلوبين في المسمى الوظيفي والراتب الشهري لكل موظف.<br>
                                                        * إذا كنت تستحق راتب في هذا المشروع فأدخل مسماك الوظيفي وراتبك الشهري أيضا.
                                                    </div>
                                                    <div id="Employees"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addEmployee('','',''); return false;">+ إضافة موظف جديد</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">التكاليف الشهرية الثابتة <a href="#" onclick="$('#details_FC_00').toggle(); $('#details_FC_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalFixedCosts">0</span> <span id="totalFixedCosts_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_FC_00" class="tools_0003">هي التكاليف التي تلتزم في دفعها شهريا مثل الإيجارات وتكاليف المواد الاستهلاكية والتسويق وما إلى ذلك. لا تقم بإضافة أقساط المديونيات، فهي ستضاف من تلقاء نفسها إذا كانت المديونية مسجلة في قسمها المخصص.</div>
                                                    <div id="details_FC_01" class="tools_0004">
                                                        * يتوجب إدخال قيمة التكلفة مع ضريبة القيمة المضافة إن كانت تخضع لها.<br>
                                                        * الإيجارات وبعض السلع الأخرى لا تخضع لضريبة القيمة المضافة.<br>
                                                        * لذلك، قم بتحديد ما إذا كانت كل تكلفة تخضع لضريبة القيمة المضافة.
                                                    </div>
                                                    <div id="fixedCosts"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addFixedCost('','',''); return false;">+ إضافة تكلفة جديدة</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">المنتجات وإيرادها الشهري <a href="#" onclick="$('#details_Revenue_00').toggle(); $('#details_Revenue_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalRevenue">0</span> <span id="totalRevenue_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Revenue_00" class="tools_0003">جميع المنتجات أو الخدمات التي يوفرها نشاطك التجاري، بالإضافة إلى جميع التفاصيل الخاصة بها حسب معطيات المشروع من تكاليف التأسيس والتكاليف الشهرية الثابتة.</div>
                                                    <div id="details_Revenue_01" class="tools_0004">
                                                        * تكلفة المواد الأولية هي تكلفتها في قطعة واحدة من المنتج، قد لا تكون تكلفة مواد تصنيع بل تكلفة منتج مضاف إليها تكلفة الاستيراد، ويتوجب بها إضافة ضريبة القيمة المضافة لها إن وجدت.<br>
                                                        * تكلفة المواد الأولية يتوجب وضعها 0 إن تم احتسابها مسبقا في التكاليف الشهرية الثابتة.<br>
                                                        * قدرة البيع الشهرية تعني عدد ما تستطيع بيعه من هذا المنتج شهريا بناء على المعدات المتوفرة وتكاليف التسويق المعتبرة.<br>
                                                        * قدرة الانتاج الشهرية تعني عدد ما تستطيع إنتاجه من هذا المنتج شهريا بناء على المعدات المتوفرة والعمالة المتوفرة.<br>
                                                        * سعر المنتج يجب أن لا يتضمن ضريبة القيمة المضافة.<br>
                                                        * معدل نسبة الزيادة السنوية تعني الزيادة المتوقعة في مبيعات المنتج سنويا. يجب أن لا تبالغ في هذه النسبة حيث أنها معدل وليس نسبة ثابتة. قم بإدخال 10 لاعتبار النسبة 10%.

                                                    </div>
                                                    <div id="revenue"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addRevenue('','','','','',''); return false;">+ إضافة منتج أو خدمة جديدة</a></div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTab('Market');"><span id="Market_Arrow" class="tools_0012_012">○</span> السوق المستهدف</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Market_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">معلومات حول السوق <a href="#" onclick="$('#details_Market_General_00').toggle(); $('#details_Market_General_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Market_General_00" class="tools_0003">معلومات السوق مهمة جدا في هذه الدراسة، وتبين مدى اطلاعك قبل الإستثمار. تقل المخاطرة في الاستثمار كلما فهمت تفاصيل السوق أكثر. في هذا القسم حاول قدر المستطاع اقناع القارئ في
                                                        جدوى السوق ومدى ملائمته لإستثمارك.</div>
                                                    <div id="details_Market_General_01" class="tools_0004">
                                                        * إسم السوق نعني بها نوعه أو أي وصف قصير آخر. مثال على ذلك: سوق الهواتف الذكية.<br>
                                                        * حجم التداول السنوي أو قيمة الصفقات السنوية أو حجم السوق، ونعني بها قيمة إجمالي ما يدفعه الزبائن أو العملاء أو المستهلكين في هذا السوق إلى المشاريع التي تخدمه.
                                                        في هذه الخانة لا تقم بإدخال العملة، فقط قم بإدخال الرقم، مثال 1000000 تعني مليون.<br>
                                                        * في خانة النبذة عليك التحدث عن السوق بشكل عام. يمكنك التحدث عن جميع التفاصيل إن شئت. فكلما زادت التفاصيل زادت جدوى دراستك.<br>
                                                        * في خانة المنتجات أو الخدمات عليك التحدث عن المزايا والعيوب ومدى أهميتها للمستهلك أو العميل أو الزبون.<br>
                                                        * الفئة المستهدفة هي نوعية العملاء أو الزبائن أو المستهلكين الذين يستهدفهم نشاطك. قد ترى بأن نشاطك يخدم الجميع، ولكن الفئة المستهدفة هي الفئة الأكثر حرصا
                                                        على استخدام خدمتك أو منتجك. مثال: محطة غسيل سيارات تخدم الجميع ولكن فئة الشباب المحبة للسيارات تعتبر فئة مستهدفة. في هذه الخانة تحدث عن تلك الفئة ومن الممكن أن يكون لديك أكثر من فئة، أذكر تفاصيل هذه الفئة ومدى احتياجها لمنتجك أو خدماتك.<br>
                                                        * تحدث عن خططك التسويقية وآليات عملها للوصول إلى الفئة المستهدفة بأسرع شكل ممكن.<br>
                                                        * الموردون هم الجهات أو القطاعات التي تخدم هذا السوق. مثال: في سوق الوجبات السريعة يعتبر تجار الخضروات موردون لهذا السوق. تحدث عن جميع الموردين والجهات
                                                        الأخرى التي يعتمد عليها هذا السوق.<br>
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0006">
                                                                <input onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" type="text" name="marketName" id="marketName" autocomplete="off" placeholder="اسم السوق المستهدف .." class="tools_0010">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <input onkeyup="otherMustBeInt(this.id,this.value); mustBeInt(this.id,this.value);" type="number" name="marketValue" id="marketValue" autocomplete="off" placeholder="حجم التداول السنوي .." class="tools_0010">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="marketDescription" id="marketDescription" autocomplete="off" placeholder="نبذة عن السوق .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="marketProducts" id="marketProducts" autocomplete="off" placeholder="نبذة عن منتجاتك أو خدماتك .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="marketTargetSegment" id="marketTargetSegment" autocomplete="off" placeholder="نبذة عن الفئة المستهدفة .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="marketVendors" id="marketVendors" autocomplete="off" placeholder="نبذة عن الموردون .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="marketPlan" id="marketPlan" autocomplete="off" placeholder="نبذة عن خطط التسويق .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">المنافسة <a href="#" onclick="$('#details_Competition_00').toggle(); $('#details_Competition_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Competition_00" class="tools_0003">يجب أن لا يستهان بالمنافسين في هذا السوق. في هذا القسم تحدث عن المنافسين وحلل المنافسة معهم بشكل تفصيلي.</div>
                                                    <div id="details_Competition_01" class="tools_0004">
                                                        * في تفاصيل المنافسة عليك ذكر نوعية المنافسة والأحداث المتعلقة بالمنافسة في هذا السوق. عليك أيضا بذكر المتحكمين بهذا السوق والتابعين المنتفعين وغير المنتفعين.<br>
                                                        * في قائمة المنافسين، لكل منافس أذكر أسمه التجاري والنسبة التقديرية لاستحواذه في هذا السوق. من الممكن أن تكون هذه القائمة محصورة على المنافسين في
                                                        نفس المنطقة فقط إن كان السوق كبير جدا.
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="competitionDescription" id="competitionDescription" autocomplete="off" placeholder="تحليل المنافسة .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="ErrorCompetitors" class="tools_x005" style="margin-top: 20px;">خطأ: مجموع الحصص يجب أن لا يتعدى 100.</div>
                                                    <div id="Competitors"></div>
                                                    <div class="tools_0008"><a href="#" onclick="addCompetitor('',''); return false;">+ إضافة منافس جديد</a></div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>


                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTab('SWOT');"><span id="SWOT_Arrow" class="tools_0012_012">○</span> تحليل SWOT</div>
                                                <div class="ArticleSeparator_Form"></div>

                                                <div id="SWOT_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">نقاط القوة <a href="#" onclick="$('#details_SWOT_Strengths_00').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_SWOT_Strengths_00" class="tools_0003">أذكر جميع الأمور التي تميز نشاطك عن بقية المنافسين، أو عن بقية الأسواق. عليك بذكر تفاصيل جميع العلل التي جعلتك مؤمنا بأن هذا النشاط مجدي إلى حد ما.</div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="swotStrengths" id="swotStrengths" autocomplete="off" placeholder="نقاط القوة .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">نقاط الضعف <a href="#" onclick="$('#details_SWOt_Weaknesses_00').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_SWOt_Weaknesses_00" class="tools_0003">تحدث عن تفاصيل جميع الأمور التي ترى نشاطك ضعيف بها. على سبيل المثال، ضعفك باللغة الإنجليزية ونشاطك يتطلب اجتماعات مع مدراء في الخارج.</div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="swotWeaknesses" id="swotWeaknesses" autocomplete="off" placeholder="نقاط الضعف .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الفرص المتاحة <a href="#" onclick="$('#details_SWOT_Opportunities_00').toggle();return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_SWOT_Opportunities_00" class="tools_0003">أذكر تفاصيل الفرص التي تراها أمام مشروعك ويتوجب عليك استغلالها. قد تكون الفرصة لك وحدك بسبب الخبرات التي لديك، عليك بذكر ذلك أيضا.</div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="swotOpportunities" id="swotOpportunities" autocomplete="off" placeholder="الفرص المتاحة .." class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">التهديدات المتوقعة <a href="#" onclick="$('#details_SWOT_Threats_00').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_SWOT_Threats_00" class="tools_0003">ماهي الأمور التي قد تهدد نشاطك مستقبلا؟ فعلى سبيل المثال، إن كان نشاطك بوابة دفع إلكترونية في الخليج، فدخول Paypal إلى دول الخليج يعتبر تهديدا لنشاطك. عليك بذكر المنافسين وما إذا استطاعوا تطبيق واستخدام تقنياتك التي تراها أفضل من تلك التي في آليات عملهم.</div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                        </tr><tr>
                                                            <td class="tools_0006">
                                                                <textarea onkeyup="otherFieldsUpdated();" onblur="otherFieldsUpdated();" name="swotThreats" id="swotThreats" autocomplete="off" placeholder="التهديدات المتوقعة" class="tools_0010"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                </div>
                                            </td>
                                            <td class="tools_p002"></td>
                                            <td class="tools_p003"></td>
                                            <td class="tools_p001">
                                                <div id="OUTPUT_PART1" class="tools_0003">
                                                    <div id="output_ProjectNameDesc"></div>
                                                    <div id="output_ProjectOwners"></div>
                                                    <div id="output_Market"></div>
                                                    <div id="output_Competitors"></div>
                                                    <div id="output_SWOT"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف التأسيس والانشاء</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalSetupCost">0</span> <span id="outputTotalSetupCost_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="container_chartSetupCostsDiv">
                                                        <div id="chartSetupCostsDiv" class="tools_0026_01">
                                                            <div id="chartSetupCostsChart" class="tools_0026_02"></div>
                                                        </div>
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع التكلفة<br>(العمر الافتراضي)</td>
                                                            <td class="tools_0012">القيمة<br>(٪ الاستهلاك السنوي)</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputSetupCosts" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الموظفين</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalSalaries">0</span> <span id="outputTotalSalaries_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">العدد × مسمى وظيفي</td>
                                                            <td class="tools_0012">راتب شهري</td>

                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputEmployees" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">المديونيات</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalDebts">0</span> <span id="outputTotalDebts_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">الجهة الممولة<br>(الفائدة السنوية - سنوات السداد)</td>
                                                            <td class="tools_0012">القيمة<br>(المديونية)</td>

                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputDebts" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">التكاليف الشهرية الثابتة</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalFixedCosts">0</span> <span id="outputTotalFixedCosts_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع التكلفة<br>(مدة التكلفة)</td>
                                                            <td class="tools_0012">اجمالي<br>(الضريبة)</td>

                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputFixedCosts" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">المنتجات وإيرادها الشهري</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalRevenue">0</span> <span id="outputTotalRevenue_currency">د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">المنتج أو الخدمة<br>(قدرة بيع)<br>(قدرة إنتاج)</td>
                                                            <td class="tools_0012">سعر الوحدة<br>(تكلفة الوحدة)<br>(زيادة بيع سنوية)</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputRevenue" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>
                                                <div id="OUTPUT_PART2">
                                                    <div class="pg_breaker"></div>
                                                    <div class="tools_0002">الجدوى الاقتصادية</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">جدوى لـ <span id="outputFeasibilityFigures_Years">2</span> سنة</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputAverageProfit">0 د.ك.</span></span><br>معدل ربح<br>سنوي
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputCapitalRecovery">غير متوفر</span></span><br>فترة استرداد<br>رأس المال
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputMarketShare">غير متوفر</span></span><br>معدل الحصة<br>السوقية
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تمويل المشروع</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="container_chartCapitalDistributionDiv">
                                                        <div id="chartCapitalDistributionDiv" class="tools_0026_01">
                                                            <div id="chartCapitalDistributionChart" class="tools_0026_02"></div>
                                                        </div>
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="totalCapital_value">0</span> <span id="totalCapital_currency">د.ك.</span></span><br>رأس مال<br>المشروع
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="CapitalDebts_value">0</span> <span id="CapitalDebts_currency">د.ك.</span></span><br>مديونية لتمويل<br>رأس المال
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="CapitalPrivate_value">0</span> <span id="CapitalPrivate_currency">د.ك.</span></span><br>تمويل خاص<br>للمشروع
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الربحية السنوية</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="container_chartProfitibilityDiv">
                                                        <div id="chartProfitibilityDiv" class="tools_0026_01">
                                                            <div id="chartProfitibilityChart" class="tools_0026_02"></div>
                                                        </div>
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0014">السنة المالية</td>
                                                            <td class="tools_0014">التكاليف السنوية<br>(الشهرية)<br>(٪ من الإيرادات)</td>
                                                            <td class="tools_0014">الأرباح السنوية<br>(الشهرية)<br>(٪ من الإيرادات)</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="Profitibility" class="tools_0008">لايوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">آلية تسعير بالتكلفة</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0014">المنتج</td>
                                                            <td class="tools_0014">أدنى سعر للربحية</td>
                                                            <td class="tools_0014">الهامش الربحي</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="Pricings" class="tools_0008">لايوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <div id="OUTPUT_PART3" class="tools_0003">
                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">القوائم المالية</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="Statements" class="tools_0008">لايوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <script>
                                                    function copyLinkToClipboard() {
                                                        var clipboard = new Clipboard('#SAVEDBOX_editLink', {
                                                            target: function() {
                                                                return document.querySelector('#editLink');
                                                            }
                                                        });
                                                        alert("تم نسخ الرابط.");
                                                    }
                                                    function feasibilityEdited() {
                                                        $("#SAVEBOX_saved").hide();
                                                        $("#SAVEBOX_unsaved").show();
                                                        $("#SAVEDBOX_viewLink").attr("href","#");
                                                        $("#SAVEDBOX_viewLink").attr("onclick","return false;");
                                                        $("#editLink").html("");
                                                    }
                                                    function feasibilitySaved(id,el,vl) {
                                                        $("#FeasibilityID").val(id);
                                                        $("#editLink").html(el);
                                                        $("#SAVEDBOX_viewLink").attr("onclick","return true;");
                                                        $("#SAVEDBOX_viewLink").attr("href",vl + "?ac="+Math.round(Math.random()*10000));
                                                        $("#SAVEBOX_unsaved").hide();
                                                        $("#SAVEBOX_saved").show();
                                                    }
                                                </script>

                                                <div id="SAVEBOX_unsaved" class="tools_1_004">
                                                    <div style="margin-bottom: 20px;">
                                                        يتوجب حفظ التعديلات قبل الاستخراج
                                                    </div>
                                                    <div>
                                                        <input id="saveButton" type="submit" value="● حفظ الدراسة" class="tools_0026" onclick="submitFeasibility(); return false;">
                                                    </div>
                                                </div>
                                                <div id="SAVEBOX_saved" class="tools_1_004">
                                                    <div style="margin-bottom: 20px;">✔ <b>تم الحفظ!</b>
                                                        <div class="tools_1_001"></div>
                                                        اضغط استخراج للعرض والطباعة.
                                                        <div class="tools_1_002"></div>
                                                        أكمل الدراسة لاحقا باستخدام ..
                                                        <div class="tools_1_001"></div>
                                                        🌐 الرابط المباشر:
                                                        <div class="tools_1_001"></div>
                                                        <span id="editLink" class="tools_1_003"></span>
                                                        <div class="tools_1_001"></div>
                                                    </div>
                                                    <div class="tools_0012_22">
                                                        <a id="SAVEDBOX_viewLink" href="#" onclick="return false;" target="_blank" class="tools_0012_21">● استخراج دراسة الجدوى</a>
                                                        <a id="SAVEDBOX_editLink" href="#" onclick="copyLinkToClipboard(); return false;" class="tools_0012_21">● نسخ الرابط المباشر</a>
                                                        <div style="width: 100%; height: 10px;"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                                <script>
                                </script></div>
                            <div id="codeof_consumptionOptimization">				    <div id="co_result"></div>
                                <input type="hidden" id="COID" value="">
                                <input type="hidden" id="inputData1CO" value="">
                                <script>
                                    // Submission for printing
                                    function submitCO() {
                                        toggleLoadingBar(1);
                                        $("#saveButtonCO").attr("disable","disable");
                                        var coid = $("#COID").val();
                                        var in1 = $("#inputData1CO").val();
                                        var out1 = $("#OUTPUT_PART1_CO").html();
                                        var out2 = $("#OUTPUT_PART2_CO").html();
                                        $.ajax({
                                            type: "POST",
                                            cache: false,
                                            url: "http://abdullah.com.kw/web/template/pc/ajax/f_tools.php?f=co&r="+Math.random(),
                                            data: { coid: coid, in1 : in1, out1 : out1, out2 : out2 },
                                            success: function(html){
                                                $("#co_result").html(html);
                                                setTimeout(function() { toggleLoadingBar(0); $("#saveButtonCO").removeAttr("disable"); },500);
                                            }
                                        });
                                    }
                                    // Monthly Income
                                    function addMonthlyIncome(n,v) {
                                        var elementID = "monthlyIncomeElementId_" + (Math.random()*999999).toFixed(0);
                                        $("#monthlyIncomes").append(''+
                                            '<table id="'+elementID+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input onkeyup="fieldsUpdatedCO();" onblur="fieldsUpdatedCO();" type="text" value="'+n+'" name="monthlyIncomeTitle" id="monthlyIncomeTitle" autocomplete="off" placeholder="اسم الإيراد .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+v+'" type="number" name="monthlyIncomeValue" id="monthlyIncomeValue_'+elementID+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td onclick="removeElementCO(\''+elementID+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                    }
                                    // Yearly Income
                                    function addYearlyIncome(n,v) {
                                        var elementID = "yearlyIncomeElementId_" + (Math.random()*999999).toFixed(0);
                                        $("#yearlyIncomes").append(''+
                                            '<table id="'+elementID+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input onkeyup="fieldsUpdatedCO();" onblur="fieldsUpdatedCO();" type="text" value="'+n+'" name="yearlyIncomeTitle" id="yearlyIncomeTitle" autocomplete="off" placeholder="اسم الإيراد .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+v+'" type="number" name="yearlyIncomeValue" id="yearlyIncomeValue_'+elementID+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td onclick="removeElementCO(\''+elementID+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                    }
                                    // Monthly Expense
                                    function addMonthlyExpense(n,v,o,l) {
                                        l = (!isNaN(l) && l > 0) ? l : "";
                                        var vis = (o == 1) ? "style='visibility: visible;'" : "style='visibility: hidden;'";
                                        o = (o == 1) ? "checked='checked'" : "";

                                        var elementID = "monthlyExpenseElementId_" + (Math.random()*999999).toFixed(0);
                                        $("#monthlyExpenses").append(''+
                                            '<table id="'+elementID+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input onkeyup="fieldsUpdatedCO();" onblur="fieldsUpdatedCO();" type="text" value="'+n+'" name="monthlyExpenseTitle" id="monthlyExpenseTitle" autocomplete="off" placeholder="اسم التكلفة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+v+'" type="number" name="monthlyExpenseValue" id="monthlyExpenseValue_'+elementID+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018"></td>'+
                                            '</tr>'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input type="checkbox" name="isOptimizeable_M" id="isOptimizeable_M_'+elementID+'" onclick="isOptimizeable(\''+elementID+'\',\'M\'); fieldsUpdatedCO();" '+o+'> قابلة للترشيد'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+l+'" type="number" name="leastValue_M" id="leastValue_M_'+elementID+'" autocomplete="off" placeholder="أدنى قيمة .." class="tools_0010" '+vis+'>'+
                                            '</td>'+
                                            '<td onclick="removeElementCO(\''+elementID+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                    }
                                    // Yearly Expense
                                    function addYearlyExpense(n,v,o,l) {
                                        l = (!isNaN(l) && l > 0) ? l : "";
                                        var vis = (o == 1) ? "style='visibility: visible;'" : "style='visibility: hidden;'";
                                        o = (o == 1) ? "checked='checked'" : "";

                                        var elementID = "yearlyExpenseElementId_" + (Math.random()*999999).toFixed(0);
                                        $("#yearlyExpenses").append(''+
                                            '<table id="'+elementID+'" cellpadding="0" cellspacing="0" class="tools_0005">'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input onkeyup="fieldsUpdatedCO();" onblur="fieldsUpdatedCO();" type="text" value="'+n+'" name="yearlyExpenseTitle" id="yearlyExpenseTitle" autocomplete="off" placeholder="اسم التكلفة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+v+'" type="number" name="yearlyExpenseValue" id="yearlyExpenseValue_'+elementID+'" autocomplete="off" placeholder="القيمة .." class="tools_0010">'+
                                            '</td>'+
                                            '<td class="tools_0018"></td>'+
                                            '</tr>'+
                                            '<tr>'+
                                            '<td class="tools_0017">'+
                                            '<input type="checkbox" name="isOptimizeable_Y" id="isOptimizeable_Y_'+elementID+'" onclick="isOptimizeable(\''+elementID+'\',\'Y\'); fieldsUpdatedCO();" '+o+'> قابلة للترشيد'+
                                            '</td>'+
                                            '<td class="tools_0018">'+
                                            '<input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" value="'+l+'" type="number" name="leastValue_Y" id="leastValue_Y_'+elementID+'" autocomplete="off" placeholder="أدنى قيمة .." class="tools_0010" '+vis+'>'+
                                            '</td>'+
                                            '<td onclick="removeElementCO(\''+elementID+'\'); return false;" class="tools_0020">&#x274c;</td>'+
                                            '</tr>'+
                                            '</table>'+
                                            '');
                                    }
                                    function hideAllGoalTabs() {
                                        $("#goalPlan").hide();
                                        $("#goalCannotBeAchieved").hide();
                                        $("#goalAchieved").hide();
                                    }
                                    function showGoalTab(id) {
                                        hideAllGoalTabs();
                                        $("#"+id).show();
                                    }
                                    function isOptimizeable(id,g) {
                                        if($("#isOptimizeable_"+g+"_"+id).is(":checked")) {
                                            $("#leastValue_"+g+"_"+id).css("visibility","visible");
                                        } else {
                                            $("#leastValue_"+g+"_"+id).css("visibility","hidden");
                                            $("#leastValue_"+g+"_"+id).val("");
                                        }
                                    }
                                    function hideTabsCO() {
                                        $("#Settings_Tab").hide();
                                        $("#Settings_Arrow").html("&#x25CB;");
                                        $("#Incomes_Tab").hide();
                                        $("#Incomes_Arrow").html("&#x25CB;");
                                        $("#Expenses_Tab").hide();
                                        $("#Expenses_Arrow").html("&#x25CB;");
                                    }
                                    function toggleTabCO(id) {
                                        if($("#"+id+"_Tab").is(":visible")) {
                                            $("#"+id+"_Tab").hide();
                                            $("#"+id+"_Arrow").html("&#x25CB;");
                                        } else {
                                            hideTabsCO();
                                            $("#"+id+"_Tab").show();
                                            $("#"+id+"_Arrow").html("&#x25CF;");
                                        }
                                    }
                                    function removeElementCO(id) {
                                        $("#"+id).remove();
                                        fieldsUpdatedCO();
                                    }
                                    function mustBeIntCO(id,v) {
                                        if($.isNumeric(v)) {
                                        } else {
                                            $("#"+id).val("");
                                        }
                                        fieldsUpdatedCO();
                                    }
                                    function fieldsUpdatedCO() {

                                        COEdited();

                                        var i = c = t = 0;
                                        var OD = [];
                                        var text_temp = "";
                                        var text2_temp = "";
                                        var dataJSON = {};

                                        var _cn = ($("#currencyNameCO").val().length > 0 && $("#currencyNameCO").val().length < 6) ? $("#currencyNameCO").val() : "د.ك.";
                                        var _cd = ($("#currencyDecimalsCO").val() > -1 && $("#currencyDecimalsCO").val() < 4 && $("#currencyDecimalsCO").val() != "") ? $("#currencyDecimalsCO").val() : 2;
                                        var _ft = ($("#FinancingType").val() != "loan" && $("#FinancingType").val() != "creditcard") ? "borrowing" : $("#FinancingType").val();
                                        var _fi = ($("#FinancingInterest").val() > -1 && $("#FinancingInterest").val() < 100) ? ($("#FinancingInterest").val()/100) : 0;
                                        var _gt = ($("#goalType").val() != "save") ? "deficit" : "save";
                                        var _sv = (!isNaN($("#saveValue").val()) && $("#saveValue").val() > 0) ? $("#saveValue").val() : 0;

                                        dataJSON["_cn"] = _cn;
                                        dataJSON["_cd"] = _cd;
                                        dataJSON["_ft"] = _ft;
                                        dataJSON["_fi"] = _fi;
                                        dataJSON["_gt"] = _gt;
                                        dataJSON["_sv"] = _sv;

                                        // Monthly Income
                                        var monthlyIncomeElement = [];
                                        dataJSON["monthlyIncome"] = {}
                                        OD["totalMonthlyIncome"] = 0;
                                        i = 0; $('input[name=monthlyIncomeTitle]').each(function() { if(typeof monthlyIncomeElement[i] == 'undefined') { monthlyIncomeElement[i] = []; } monthlyIncomeElement[i]["Title"] = $(this).val(); i++; });
                                        i = 0; $('input[name=monthlyIncomeValue]').each(function() { if(typeof monthlyIncomeElement[i] == 'undefined') { monthlyIncomeElement[i] = []; } monthlyIncomeElement[i]["Value"] = Number($(this).val()); i++; });
                                        $("#outputMonthlyIncomes").html("لا يوجد بيانات حتى الآن ..");
                                        for(i=0; i<monthlyIncomeElement.length; i++) {
                                            if(monthlyIncomeElement[i]["Title"].length > 0 && !isNaN(monthlyIncomeElement[i]["Value"])) {
                                                dataJSON["monthlyIncome"][i] = {};
                                                dataJSON["monthlyIncome"][i]["Title"] = monthlyIncomeElement[i]["Title"];
                                                dataJSON["monthlyIncome"][i]["Value"] = monthlyIncomeElement[i]["Value"];

                                                OD["totalMonthlyIncome"] += parseFloat(monthlyIncomeElement[i]["Value"]);

                                                if(i==0) $("#outputMonthlyIncomes").html("");
                                                $("#outputMonthlyIncomes").append(''+
                                                    '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                    '<tr>'+
                                                    '<td class="tools_0023">'+monthlyIncomeElement[i]["Title"]+'</td>'+
                                                    '<td class="tools_0024">'+readableAmount(monthlyIncomeElement[i]["Value"],_cd,_cn)+'</td>'+
                                                    '</tr>'+
                                                    '</table>'+
                                                    '');
                                            } else {
                                                monthlyIncomeElement.splice(i,1);
                                                i--;
                                            }
                                        }
                                        $("#totalMonthlyIncome").html(readableAmount(OD["totalMonthlyIncome"],_cd,_cn));
                                        $("#outputTotalMonthlyIncome").html(readableAmount(OD["totalMonthlyIncome"],_cd,_cn));

                                        // Yearly Income
                                        var yearlyIncomeElement = [];
                                        dataJSON["yearlyIncome"] = {}
                                        OD["totalYearlyIncome"] = 0;
                                        i = 0; $('input[name=yearlyIncomeTitle]').each(function() { if(typeof yearlyIncomeElement[i] == 'undefined') { yearlyIncomeElement[i] = []; } yearlyIncomeElement[i]["Title"] = $(this).val(); i++; });
                                        i = 0; $('input[name=yearlyIncomeValue]').each(function() { if(typeof yearlyIncomeElement[i] == 'undefined') { yearlyIncomeElement[i] = []; } yearlyIncomeElement[i]["Value"] = Number($(this).val()); i++; });
                                        $("#outputYearlyIncomes").html("لا يوجد بيانات حتى الآن ..");
                                        for(i=0; i<yearlyIncomeElement.length; i++) {
                                            if(yearlyIncomeElement[i]["Title"].length > 0 && !isNaN(yearlyIncomeElement[i]["Value"])) {
                                                dataJSON["yearlyIncome"][i] = {};
                                                dataJSON["yearlyIncome"][i]["Title"] = yearlyIncomeElement[i]["Title"];
                                                dataJSON["yearlyIncome"][i]["Value"] = yearlyIncomeElement[i]["Value"];

                                                OD["totalYearlyIncome"] += parseFloat(yearlyIncomeElement[i]["Value"]);

                                                if(i==0) $("#outputYearlyIncomes").html("");
                                                $("#outputYearlyIncomes").append(''+
                                                    '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                    '<tr>'+
                                                    '<td class="tools_0023">'+yearlyIncomeElement[i]["Title"]+'</td>'+
                                                    '<td class="tools_0024">'+readableAmount(yearlyIncomeElement[i]["Value"],_cd,_cn)+'</td>'+
                                                    '</tr>'+
                                                    '</table>'+
                                                    '');
                                            } else {
                                                yearlyIncomeElement.splice(i,1);
                                                i--;
                                            }
                                        }
                                        $("#totalYearlyIncome").html(readableAmount(OD["totalYearlyIncome"],_cd,_cn));
                                        $("#outputTotalYearlyIncome").html(readableAmount(OD["totalYearlyIncome"],_cd,_cn));



                                        // Monthly Expense
                                        var monthlyExpenseElement = [];
                                        dataJSON["monthlyExpense"] = {}
                                        OD["totalMonthlyExpense"] = 0;
                                        OD["totalMonthlyOptimizeable"] = 0;
                                        i = 0; $('input[name=monthlyExpenseTitle]').each(function() { if(typeof monthlyExpenseElement[i] == 'undefined') { monthlyExpenseElement[i] = []; } monthlyExpenseElement[i]["Title"] = $(this).val(); i++; });
                                        i = 0; $('input[name=monthlyExpenseValue]').each(function() { if(typeof monthlyExpenseElement[i] == 'undefined') { monthlyExpenseElement[i] = []; } monthlyExpenseElement[i]["Value"] = Number($(this).val()); i++; });
                                        i = 0; $('input[name=isOptimizeable_M]').each(function() { if(typeof monthlyExpenseElement[i] == 'undefined') { monthlyExpenseElement[i] = []; } monthlyExpenseElement[i]["isOptimizeable"] = 0; if($(this).is(":checked")) { monthlyExpenseElement[i]["isOptimizeable"] = 1; } i++; });
                                        i = 0; $('input[name=leastValue_M]').each(function() { if(typeof monthlyExpenseElement[i] == 'undefined') { monthlyExpenseElement[i] = []; } monthlyExpenseElement[i]["LeastValue"] = Number($(this).val()); i++; });
                                        $("#outputMonthlyExpenses").html("لا يوجد بيانات حتى الآن ..");
                                        for(i=0; i<monthlyExpenseElement.length; i++) {
                                            if(monthlyExpenseElement[i]["Title"].length > 0 && !isNaN(monthlyExpenseElement[i]["Value"]) && !isNaN(monthlyExpenseElement[i]["isOptimizeable"])) {
                                                monthlyExpenseElement[i]["LeastValue"] = (monthlyExpenseElement[i]["LeastValue"] < monthlyExpenseElement[i]["Value"]) ? monthlyExpenseElement[i]["LeastValue"] : monthlyExpenseElement[i]["Value"];

                                                dataJSON["monthlyExpense"][i] = {};
                                                dataJSON["monthlyExpense"][i]["Title"] = monthlyExpenseElement[i]["Title"];
                                                dataJSON["monthlyExpense"][i]["Value"] = monthlyExpenseElement[i]["Value"];
                                                dataJSON["monthlyExpense"][i]["isOptimizeable"] = monthlyExpenseElement[i]["isOptimizeable"];
                                                dataJSON["monthlyExpense"][i]["LeastValue"] = monthlyExpenseElement[i]["LeastValue"];
                                                OD["totalMonthlyExpense"] += parseFloat(monthlyExpenseElement[i]["Value"]);

                                                if(monthlyExpenseElement[i]["isOptimizeable"] == 1) {
                                                    OD["totalMonthlyOptimizeable"] += (monthlyExpenseElement[i]["Value"] - monthlyExpenseElement[i]["LeastValue"]);
                                                }

                                                text_temp = (monthlyExpenseElement[i]["isOptimizeable"] == 1) ? "قابلة للترشيد" : "غير قابلة للترشيد";
                                                text2_temp = (monthlyExpenseElement[i]["isOptimizeable"] == 1) ? "<br>("+readableAmount(monthlyExpenseElement[i]["LeastValue"],_cd,_cn)+")" : ""
                                                if(i==0) $("#outputMonthlyExpenses").html("");
                                                $("#outputMonthlyExpenses").append(''+
                                                    '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                    '<tr>'+
                                                    '<td class="tools_0023">'+monthlyExpenseElement[i]["Title"]+'<br>('+text_temp+')</td>'+
                                                    '<td class="tools_0024">'+readableAmount(monthlyExpenseElement[i]["Value"],_cd,_cn)+text2_temp+'</td>'+
                                                    '</tr>'+
                                                    '</table>'+
                                                    '');
                                            } else {
                                                monthlyExpenseElement.splice(i,1);
                                                i--;
                                            }
                                        }
                                        $("#totalMonthlyExpense").html(readableAmount(OD["totalMonthlyExpense"],_cd,_cn));
                                        $("#outputTotalMonthlyExpense").html(readableAmount(OD["totalMonthlyExpense"],_cd,_cn));


                                        // Yearly Expense
                                        var yearlyExpenseElement = [];
                                        dataJSON["yearlyExpense"] = {}
                                        OD["totalYearlyExpense"] = 0;
                                        OD["totalYearlyOptimizeable"] = 0;
                                        i = 0; $('input[name=yearlyExpenseTitle]').each(function() { if(typeof yearlyExpenseElement[i] == 'undefined') { yearlyExpenseElement[i] = []; } yearlyExpenseElement[i]["Title"] = $(this).val(); i++; });
                                        i = 0; $('input[name=yearlyExpenseValue]').each(function() { if(typeof yearlyExpenseElement[i] == 'undefined') { yearlyExpenseElement[i] = []; } yearlyExpenseElement[i]["Value"] = Number($(this).val()); i++; });
                                        i = 0; $('input[name=isOptimizeable_Y]').each(function() { if(typeof yearlyExpenseElement[i] == 'undefined') { yearlyExpenseElement[i] = []; } yearlyExpenseElement[i]["isOptimizeable"] = 0; if($(this).is(":checked")) { yearlyExpenseElement[i]["isOptimizeable"] = 1; } i++; });
                                        i = 0; $('input[name=leastValue_Y]').each(function() { if(typeof yearlyExpenseElement[i] == 'undefined') { yearlyExpenseElement[i] = []; } yearlyExpenseElement[i]["LeastValue"] = Number($(this).val()); i++; });
                                        $("#outputYearlyExpenses").html("لا يوجد بيانات حتى الآن ..");
                                        for(i=0; i<yearlyExpenseElement.length; i++) {
                                            if(yearlyExpenseElement[i]["Title"].length > 0 && !isNaN(yearlyExpenseElement[i]["Value"]) && !isNaN(yearlyExpenseElement[i]["isOptimizeable"])) {
                                                yearlyExpenseElement[i]["LeastValue"] = (yearlyExpenseElement[i]["LeastValue"] < yearlyExpenseElement[i]["Value"]) ? yearlyExpenseElement[i]["LeastValue"] : yearlyExpenseElement[i]["Value"];

                                                dataJSON["yearlyExpense"][i] = {};
                                                dataJSON["yearlyExpense"][i]["Title"] = yearlyExpenseElement[i]["Title"];
                                                dataJSON["yearlyExpense"][i]["Value"] = yearlyExpenseElement[i]["Value"];
                                                dataJSON["yearlyExpense"][i]["isOptimizeable"] = yearlyExpenseElement[i]["isOptimizeable"];
                                                dataJSON["yearlyExpense"][i]["LeastValue"] = yearlyExpenseElement[i]["LeastValue"];
                                                OD["totalYearlyExpense"] += parseFloat(yearlyExpenseElement[i]["Value"]);

                                                if(yearlyExpenseElement[i]["isOptimizeable"] == 1) {
                                                    OD["totalYearlyOptimizeable"] += (yearlyExpenseElement[i]["Value"] - yearlyExpenseElement[i]["LeastValue"]);
                                                }

                                                text_temp = (yearlyExpenseElement[i]["isOptimizeable"] == 1) ? "قابلة للترشيد" : "غير قابلة للترشيد";
                                                text2_temp = (yearlyExpenseElement[i]["isOptimizeable"] == 1) ? "<br>("+readableAmount(yearlyExpenseElement[i]["LeastValue"],_cd,_cn)+")" : ""
                                                if(i==0) $("#outputYearlyExpenses").html("");
                                                $("#outputYearlyExpenses").append(''+
                                                    '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                    '<tr>'+
                                                    '<td class="tools_0023">'+yearlyExpenseElement[i]["Title"]+'<br>('+text_temp+')</td>'+
                                                    '<td class="tools_0024">'+readableAmount(yearlyExpenseElement[i]["Value"],_cd,_cn)+text2_temp+'</td>'+
                                                    '</tr>'+
                                                    '</table>'+
                                                    '');
                                            } else {
                                                yearlyExpenseElement.splice(i,1);
                                                i--;
                                            }
                                        }
                                        $("#totalYearlyExpense").html(readableAmount(OD["totalYearlyExpense"],_cd,_cn));
                                        $("#outputTotalYearlyExpense").html(readableAmount(OD["totalYearlyExpense"],_cd,_cn));

                                        $("#inputData1CO").val(JSON.stringify(dataJSON));

                                        // Doing outputs
                                        OD["totalRealYearlyIncome"] = OD["totalYearlyIncome"] + (OD["totalMonthlyIncome"] * 12);
                                        $("#outputTotalYearlyIncomeFigure").html(readableAmount(OD["totalRealYearlyIncome"],_cd,_cn));

                                        OD["totalRealYearlyExpense"] = OD["totalYearlyExpense"] + (OD["totalMonthlyExpense"] * 12);
                                        $("#outputTotalYearlyExpenseFigure").html(readableAmount(OD["totalRealYearlyExpense"],_cd,_cn));

                                        OD["totalRealYearlyBalance"] = OD["totalRealYearlyIncome"] - OD["totalRealYearlyExpense"];
                                        $("#outputTotalYearlyBalanceFigure").html(readableAmount(OD["totalRealYearlyBalance"],_cd,_cn));

                                        OD["totalRealMonthlyIncome"] = OD["totalRealYearlyIncome"] / 12;
                                        $("#outputTotalMonthlyIncomeFigure").html(readableAmount(OD["totalRealMonthlyIncome"],_cd,_cn));

                                        OD["totalRealMonthlyExpense"] = OD["totalRealYearlyExpense"] / 12;
                                        $("#outputTotalMonthlyExpenseFigure").html(readableAmount(OD["totalRealMonthlyExpense"],_cd,_cn));

                                        OD["totalRealMonthlyBalance"] = OD["totalRealYearlyBalance"] / 12;
                                        $("#outputTotalMonthlyBalanceFigure").html(readableAmount(OD["totalRealMonthlyBalance"],_cd,_cn));

                                        $("#outputInterestRate").html(readableAmount((_fi*100),1,"") + "%");
                                        if(OD["totalRealMonthlyBalance"] < 0) {
                                            t = 0
                                            OD["YearlyInterest"] = 0;
                                            for(i=0; i<12; i++) {
                                                t += OD["totalRealMonthlyBalance"];
                                                OD["YearlyInterest"] += t * _fi;

                                            }
                                        } else { OD["YearlyInterest"] = 0; }
                                        OD["YearlyInterest"] *= -1;
                                        $("#outputYearlyInterest").html(readableAmount(OD["YearlyInterest"],_cd,_cn));
                                        OD["MonthlyInterest"] = (OD["YearlyInterest"] > 0) ? (OD["YearlyInterest"] / 12) : 0;
                                        $("#outputMonthlyInterest").html(readableAmount(OD["MonthlyInterest"],_cd,_cn));

                                        OD["goalType"] = (_gt == "save") ? "ادخار" : "سد العجز";
                                        $("#outputGoalType").html(OD["goalType"]);
                                        $("#outputSaveValue").html(readableAmount(_sv,_cd,_cn));

                                        OD["totalOptimizeable"] = OD["totalYearlyOptimizeable"] + (OD["totalMonthlyOptimizeable"] * 12);
                                        OD["NeededAdjustmentValue"] = 0;
                                        OD["NeededAdjustmentRatio"] = 0;
                                        if(OD["totalRealYearlyBalance"] < (_sv*12)) {

                                            OD["NeededAdjustmentValue"] = (OD["totalRealYearlyBalance"]*-1) + (_sv*12)
                                            if(OD["totalOptimizeable"] >= OD["NeededAdjustmentValue"]) {
                                                OD["NeededAdjustmentRatio"] = OD["NeededAdjustmentValue"] / OD["totalOptimizeable"];

                                                $("#outputPlanMonthlyExpenses").html("لا يوجد ماهو قابل للترشيد ..");
                                                for(i=0; i<monthlyExpenseElement.length; i++) {
                                                    if(monthlyExpenseElement[i]["isOptimizeable"] == 1) {
                                                        monthlyExpenseElement[i]["OptimizedValue"] = monthlyExpenseElement[i]["Value"] - ((monthlyExpenseElement[i]["Value"] - monthlyExpenseElement[i]["LeastValue"]) * OD["NeededAdjustmentRatio"]);
                                                        if(monthlyExpenseElement[i]["OptimizedValue"] < 0) monthlyExpenseElement[i]["OptimizedValue"] = 0;
                                                        if($("#outputPlanMonthlyExpenses").html() == "لا يوجد ماهو قابل للترشيد ..") $("#outputPlanMonthlyExpenses").html("");
                                                        $("#outputPlanMonthlyExpenses").append(''+
                                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                            '<tr>'+
                                                            '<td class="tools_0012_009">'+monthlyExpenseElement[i]["Title"]+'</td>'+
                                                            '<td class="tools_0012_009">'+readableAmount(monthlyExpenseElement[i]["Value"],_cd,_cn)+'</td>'+
                                                            '<td class="tools_0012_009">'+readableAmount(monthlyExpenseElement[i]["OptimizedValue"],_cd,_cn)+'</td>'+
                                                            '</tr>'+
                                                            '</table>'+
                                                            '');
                                                    }
                                                }
                                                $("#outputPlanYearlyExpenses").html("لا يوجد ماهو قابل للترشيد ..");
                                                for(i=0; i<yearlyExpenseElement.length; i++) {
                                                    if(yearlyExpenseElement[i]["isOptimizeable"] == 1) {
                                                        yearlyExpenseElement[i]["OptimizedValue"] = yearlyExpenseElement[i]["Value"] - ((yearlyExpenseElement[i]["Value"] - yearlyExpenseElement[i]["LeastValue"]) * OD["NeededAdjustmentRatio"]);
                                                        if(yearlyExpenseElement[i]["OptimizedValue"] < 0) yearlyExpenseElement[i]["OptimizedValue"] = 0;
                                                        if($("#outputPlanYearlyExpenses").html() == "لا يوجد ماهو قابل للترشيد ..") $("#outputPlanYearlyExpenses").html("");
                                                        $("#outputPlanYearlyExpenses").append(''+
                                                            '<table cellpadding="0" cellspacing="0" class="width100pr">'+
                                                            '<tr>'+
                                                            '<td class="tools_0012_009">'+yearlyExpenseElement[i]["Title"]+'</td>'+
                                                            '<td class="tools_0012_009">'+readableAmount(yearlyExpenseElement[i]["Value"],_cd,_cn)+'</td>'+
                                                            '<td class="tools_0012_009">'+readableAmount(yearlyExpenseElement[i]["OptimizedValue"],_cd,_cn)+'</td>'+
                                                            '</tr>'+
                                                            '</table>'+
                                                            '');
                                                    }
                                                }

                                                showGoalTab("goalPlan");
                                            } else {
                                                showGoalTab("goalCannotBeAchieved");
                                            }
                                        } else {
                                            showGoalTab("goalAchieved");
                                        }

                                    }
                                </script>
                                <div id="toolForm_consumptionOptimization" class="tools_0001">
                                    نواجه كمستهلكين صعوبة في تنظيم المصروفات الشهرية، وأحيانا ينتهي بنا المطاف في التقصير على أنفسنا بشكل غير سوي
                                    بسبب زيادة مصروفات غير مهمة أو انخفاض في الراتب. تمت برمجة هذه الأداة من أجل المساهمة في تسهيل عملية فهمك لمصروفاتك
                                    الشهرية وتحسين سلوكك الاستهلاكي وبالتالي تقليل مصروفاتك والادخار بأقل تأثير على اسلوب حياتك.
                                    <div class="ArticleSeparator_Form"></div>                     <div id="pageSource_Div_consumptionOptimization" class="tools_0003">
                                        <input type="hidden" id="sourceCodeStatus_consumptionOptimization" value="0">
                                        <div class="ArticleSeparator_Form"></div>

                                        <script>fetchSourceCode('consumptionOptimization');</script>
                                    </div>
                                    <div class="ArticleSeparator_Form"></div>
                                    للمساعدة إضغط على هذا الرمز ❗ بجانب القسم الذي تحتاج المساعدة به، أو شاهد <a href="#" onclick="playYTVideo('VzAnRFsZkvI'); return false;">هذا المقطع</a> والذي به شرح تفصيلي عن الأداة.
                                    <div class="ArticleSeparator_Form"></div>

                                    <table cellpadding="0" cellspacing="0" class="width100pr"><tbody><tr><td class="tools_p001">
                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTabCO('Settings');"><span id="Settings_Arrow" class="tools_0012_012">○</span> إعدادات عامة</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Settings_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">خيارات محاسبية <a href="#" onclick="$('#details_formSetupCO_00').toggle(); $('#details_formSetupCO_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_formSetupCO_00" class="tools_0003">قم بإدخال رمز العملة وخانات الأعشار ونسبة ضريبة القيمة المضافة وفق النظام التجاري للبلد الممارس به النشاط التجاري.</div>
                                                    <div id="details_formSetupCO_01" class="tools_0004">
                                                        * قم باختيار رمز العملة الخاصة ببلدك.<br>
                                                        * قم باختيار عدد خانات الأعشار التي تلي الفاصلة.
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0012_014">
                                                                <select name="currencyNameCO" id="currencyNameCO" onchange="fieldsUpdatedCO();" class="tools_0012_011">
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">عملات دول الخليج</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="د.ك.">دينار كويتي</option>
                                                                    <option value="ر.س.">ريال سعودي</option>
                                                                    <option value="د.ب.">دينار بحريني</option>
                                                                    <option value="د.أ.">درهم إماراتي</option>
                                                                    <option value="ر.ق.">ريال قطري</option>
                                                                    <option value="ر.ع.">ريال عماني</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">عملات دول عربية</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="د.ج.">دينار جزائري</option>
                                                                    <option value="ج.م.">جنيه مصري</option>
                                                                    <option value="د.ع.">دينار عراقي</option>
                                                                    <option value="د.أ.">دينار أردني</option>
                                                                    <option value="ل.ل.">ليرا لبنانية</option>
                                                                    <option value="د.ت.">دينار تونسي</option>
                                                                    <option value="د.ل.">دينار ليبي</option>
                                                                    <option value="د.س.">دينار سوداني</option>
                                                                    <option value="د.م.">دينار مغربي</option>
                                                                    <option value="ج.س.">جنيه سوري</option>
                                                                    <option value="ر.ي.">ريال يمني</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option disabled="">رموز عملات</option>
                                                                    <option disabled="">------------------</option>
                                                                    <option value="ريال">ريال</option>
                                                                    <option value="$">$</option>
                                                                    <option value="£">£</option>
                                                                    <option value="฿">฿</option>
                                                                    <option value="₲">₲</option>
                                                                    <option value="₭">₭</option>
                                                                    <option value="₡">₡</option>
                                                                </select>
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <select name="currencyDecimalsCO" id="currencyDecimalsCO" onchange="fieldsUpdatedCO();" class="tools_0012_011">
                                                                    <option value="">الأعشار</option>
                                                                    <option value="0">x</option>
                                                                    <option value="1">x.x</option>
                                                                    <option value="2">x.xx</option>
                                                                    <option value="3">x.xxx</option>
                                                                </select>
                                                            </td>
                                                        </tr></tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تمويل العجز <a href="#" onclick="$('#details_Financing_00').toggle(); $('#details_Financing_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Financing_00" class="tools_0003">كيف تغطي تكاليفك الشهرية في حال زادت تلك التكاليف عن إيرادك أو راتبك الشهري؟</div>
                                                    <div id="details_Financing_01" class="tools_0004">
                                                        * قم باختيار نوع التمويل الذي تتلقاه في حال زيادة مصروفاتك.<br>
                                                        * قم باختيار الفائدة الشهرية على هذا التمويل. مثال: في حال كان نوع التمويل هو بطاقة الإئتمان، فالفائدة الشهرية في حال عدم تسديد
                                                        الدين هو في غالب الأحيان 1.5٪، وبالنسبة للقروض ففي آغلب الأحيان تكون الفائدة الشهرية مساوية لـ 0.5٪ بحكم أنها سنويا تطالب بفائدة 6%.
                                                        أما إذا كان من يمولك شخص من الأهل والأصدقاء فيتوجب اختيار "لاتوجد فائدة".
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0012_014">
                                                                <select name="FinancingType" id="FinancingType" onchange="fieldsUpdatedCO();" class="tools_0012_011">
                                                                    <option value="borrowing">اقتراض من أقارب</option>
                                                                    <option value="creditcard">بطاقة إئتمان</option>
                                                                    <option value="loan">اقتراض بنكي</option>
                                                                </select>
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <select name="FinancingInterest" id="FinancingInterest" onchange="fieldsUpdatedCO();" class="tools_0012_011">
                                                                    <option value="0">لا توجد فائدة</option>
                                                                    <option value="0.5">0.5%</option>
                                                                    <option value="1.0">1.0%</option>
                                                                    <option value="1.5">1.5%</option>
                                                                    <option value="2.0">2.0%</option>
                                                                    <option value="2.5">2.5%</option>
                                                                    <option value="3.0">3.0%</option>
                                                                    <option value="3.5">3.5%</option>
                                                                    <option value="4.0">4.0%</option>
                                                                    <option value="4.5">4.5%</option>
                                                                    <option value="5.0">5.0%</option>
                                                                </select>
                                                            </td>
                                                        </tr></tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">ماهو هدفك؟ <a href="#" onclick="$('#details_Goal_00').toggle(); $('#details_Goal_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_Goal_00" class="tools_0003">قم باختيار الهدف المناسب لك من وراء استخدامك لهذه الأداة.</div>
                                                    <div id="details_Goal_01" class="tools_0004">
                                                        * عند اختيار سد العجز فسيتم ترشيد استهلاكك إلى أن تتساوى التكاليف مع الإيرادات بشكل كامل.<br>
                                                        * وعند اختيارك إدخار، يتوجب عليك وضع المبلغ الذي تود ادخاره في الخانة المخصصة.
                                                    </div>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0005"><tbody><tr>
                                                            <td class="tools_0012_014">
                                                                هدف ترشيد الإنفاق؟
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <select name="goalType" id="goalType" onchange="if(this.value == 'save') { $('#savingTR').show(); } else { $('#savingTR').hide(); $('#saveValue').val(''); } fieldsUpdatedCO();" class="tools_0012_011">
                                                                    <option value="deficit">سد العجز</option>
                                                                    <option value="save">ادخار</option>
                                                                </select>
                                                            </td></tr><tr id="savingTR" style="display: none;">
                                                            <td class="tools_0012_014">
                                                                كم تود الادخار شهريا؟
                                                            </td>
                                                            <td class="tools_0012_014">
                                                                <input onkeyup="mustBeIntCO(this.id,this.value);" onblur="mustBeIntCO(this.id,this.value);" type="number" name="saveValue" id="saveValue" autocomplete="off" placeholder="القيمة .." class="tools_0010">
                                                            </td>
                                                        </tr></tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTabCO('Incomes');"><span id="Incomes_Arrow" class="tools_0012_012">○</span> إيرادات</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Incomes_Tab" class="tools_0003">
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">إيرادات شهرية <a href="#" onclick="$('#details_monthlyIncome_00').toggle(); $('#details_monthlyIncome_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalMonthlyIncome">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_monthlyIncome_00" class="tools_0003">الإيرادات الشهرية بجميع أنواعها، كراتبك وراتب شريك حياتك إن كان من ضمن ميزانيتك، وعوائد مشاريعك التجارية أو استثماراتك إن كانت شهرية.</div>
                                                    <div id="details_monthlyIncome_01" class="tools_0004">
                                                        * أدخل اسم الإيراد في خانته المخصصة، مثال: راتب الوظيفة.<br>
                                                        * ادخل قيمة الإيراد في الخانة المخصصة، مثال: 6000
                                                    </div>
                                                    <div id="monthlyIncomes">
                                                    </div>
                                                    <div class="tools_0008"><a href="#" onclick="addMonthlyIncome('',''); return false;">+ إضافة إيراد شهري</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">إيرادات سنوية <a href="#" onclick="$('#details_yearlyIncome_00').toggle(); $('#details_yearlyIncome_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalYearlyIncome">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_yearlyIncome_00" class="tools_0003">الإيرادات السنوية بجميع أنواعها وبشكل تقريبي كأرباح أسهم أو ودائع أو استثمار آخر أو بدلات وما شابه.</div>
                                                    <div id="details_yearlyIncome_01" class="tools_0004">
                                                        * أدخل اسم الإيراد في خانته المخصصة، مثال: أرباح وديعة.<br>
                                                        * ادخل قيمة الإيراد في الخانة المخصصة، مثال: 2000
                                                    </div>
                                                    <div id="yearlyIncomes">
                                                    </div>
                                                    <div class="tools_0008"><a href="#" onclick="addYearlyIncome('',''); return false;">+ إضافة إيراد سنوي</a></div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <div class="tools_0002" style="cursor: pointer; text-align: right;" onclick="toggleTabCO('Expenses');"><span id="Expenses_Arrow" class="tools_0012_012">○</span> تكاليف</div>
                                                <div class="ArticleSeparator_Form"></div>
                                                <div id="Expenses_Tab" class="tools_0003">

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف شهرية <a href="#" onclick="$('#details_monthlyExpense_00').toggle(); $('#details_monthlyExpense_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalMonthlyExpense">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_monthlyExpense_00" class="tools_0003">قم بإدخال تكاليفك الشهرية بشكل تفصيلي دون دمج أي تكلفة مع أخرى، كتكلفة فواتير الجوال، والأنترنت، وراتب العاملين في المنزل، وإيجار الشقة، ومصاريف المنزل، وقسط السيارة، ومصاريف الترفيه الاسبوعي، الخ.</div>
                                                    <div id="details_monthlyExpense_01" class="tools_0004">
                                                        * أدخل اسم التكلفة في خانته المخصصة، مثال: راتب السائق.<br>
                                                        * ادخل قيمة التكلفة في الخانة المخصصة، مثال: 1500 <br>
                                                        * قم باختيار ما إذا كانت التكلفة قابلة للترشيد أم لا. <br>
                                                        * إذا كانت قابلة للترشيد فقم بإدخال أدنى قيمة يمكن النزول لها في هذه التكلفة. إذا الخانة فارغة فسيتم اعتبار أدنى قيمة كصفر.<br>
                                                        * جميع الأقساط والإلتزامات المرتبطة بعقود تعتبر غير قابلة للترشيد.
                                                    </div>
                                                    <div id="monthlyExpenses">
                                                    </div>
                                                    <div class="tools_0008"><a href="#" onclick="addMonthlyExpense('','','',''); return false;">+ إضافة تكلفة شهرية</a></div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف سنوية <a href="#" onclick="$('#details_yearlyExpense_00').toggle(); $('#details_yearlyExpense_01').toggle(); return false;">(❗)</a></div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="totalYearlyExpense">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="details_yearlyExpense_00" class="tools_0003">قم بإدخال تكاليفك السنوية بشكل تفصيلي دون دمج أي تكلفة مع أخرى، كاشتراك في ناد صحي، وتكاليف السفر السنوية، وتكاليف صيانة السيارة، الخ.</div>
                                                    <div id="details_yearlyExpense_01" class="tools_0004">
                                                        * أدخل اسم التكلفة في خانته المخصصة، مثال: اشتراك نادي صحي.<br>
                                                        * ادخل قيمة التكلفة في الخانة المخصصة، مثال: 3000 <br>
                                                        * قم باختيار ما إذا كانت التكلفة قابلة للترشيد أم لا. <br>
                                                        * إذا كانت قابلة للترشيد فقم بإدخال أدنى قيمة يمكن النزول لها في هذه التكلفة. إذا الخانة فارغة فسيتم اعتبار أدنى قيمة كصفر.<br>
                                                        * جميع الأقساط والإلتزامات المرتبطة بعقود تعتبر غير قابلة للترشيد.
                                                    </div>
                                                    <div id="yearlyExpenses">
                                                    </div>
                                                    <div class="tools_0008"><a href="#" onclick="addYearlyExpense('','','',''); return false;">+ إضافة تكلفة سنوية</a></div>
                                                </div>

                                            </td><td class="tools_p002"></td><td class="tools_p003"></td><td class="tools_p001">                                                                                                <div id="OUTPUT_PART1_CO" class="tools_0003">

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">إيرادات شهرية</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalMonthlyIncome">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع الإيراد</td>
                                                            <td class="tools_0012">القيمة</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputMonthlyIncomes" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">إيرادات سنوية</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalYearlyIncome">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع الإيراد</td>
                                                            <td class="tools_0012">القيمة</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputYearlyIncomes" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>


                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف شهرية</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalMonthlyExpense">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع التكلفة<br>(قابلية الترشيد)</td>
                                                            <td class="tools_0012">القيمة<br>(أدنى قيمة)</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputMonthlyExpenses" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">تكاليف سنوية</div>
                                                            </td>
                                                            <td class="tools_0009">
                                                                <span id="outputTotalYearlyExpense">0 د.ك.</span>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                        <tbody><tr>
                                                            <td class="tools_0011">نوع التكلفة<br>(قابلية الترشيد)</td>
                                                            <td class="tools_0012">القيمة<br>(أدنى قيمة)</td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div id="outputYearlyExpenses" class="tools_0008">لا يوجد بيانات حتى الآن ..</div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                </div>

                                                <div id="OUTPUT_PART2_CO">
                                                    <div class="pg_breaker"></div>
                                                    <div class="tools_0002">خلاصة المعطيات</div>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الخلاصة، سنويا</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalYearlyIncomeFigure">0 د.ك.</span></span><br>اجمالي الإيراد
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalYearlyExpenseFigure">0 د.ك.</span></span><br>اجمالي التكاليف
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalYearlyBalanceFigure">0 د.ك.</span></span><br>الادخار أو العجز
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">الخلاصة، شهريا</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalMonthlyIncomeFigure">0 د.ك.</span></span><br>اجمالي الإيراد
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalMonthlyExpenseFigure">0 د.ك.</span></span><br>اجمالي التكاليف
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputTotalMonthlyBalanceFigure">0 د.ك.</span></span><br>الادخار أو العجز
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">فائدة تمويل العجز</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputInterestRate">لاتوجد فائدة</span></span><br>نسبة الفائدة<br>على التمويل
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputMonthlyInterest">0 د.ك.</span></span><br>كحد أقصى يدفع<br>كفائدة شهريا
                                                            </td>
                                                            <td class="tools_0013">
                                                                <span class="tools_0015"><span id="outputYearlyInterest">0 د.ك.</span></span><br>كحد أقصى يدفع<br>كفائدة سنويا
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>

                                                    <div class="pg_breaker"></div>
                                                    <div class="tools_0002">خطة الترشيد</div>
                                                    <div class="ArticleSeparator_Form"></div>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="titleTD">
                                                                <div class="ResumeTable_Info_Title">نوع الآلية</div>
                                                            </td>
                                                            <td class="tools_0009">

                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table cellpadding="0" cellspacing="0" class="width100pr">
                                                        <tbody><tr>
                                                            <td class="tools_0013new">
                                                                <span class="tools_0015"><span id="outputGoalType">سد العجز</span></span><br>هو الهدف من<br>الترشيد
                                                            </td>
                                                            <td class="tools_0013new">
                                                                <span class="tools_0015"><span id="outputSaveValue">0 د.ك.</span></span><br>المطلوب ادخاره<br>شهريا
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                    <div class="ArticleSeparator_Form"></div>
                                                    <div class="pg_breaker"></div>
                                                    <div id="goalPlan" class="tools_0003" style="display: block;">
                                                        <table cellpadding="0" cellspacing="0" class="width100pr">
                                                            <tbody><tr>
                                                                <td class="titleTD">
                                                                    <div class="ResumeTable_Info_Title">ترشيد التكاليف الشهرية</div>
                                                                </td>
                                                                <td class="tools_0009">
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                        <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                            <tbody><tr>
                                                                <td class="tools_0014">نوع التكلفة</td>
                                                                <td class="tools_0014">قبل الترشيد</td>
                                                                <td class="tools_0014">بعد الترشيد</td>
                                                            </tr>
                                                            </tbody></table>
                                                        <div id="outputPlanMonthlyExpenses" class="tools_0008">لا يوجد ماهو قابل للترشيد ..</div>
                                                        <div class="ArticleSeparator_Form"></div>
                                                        <div class="pg_breaker"></div>
                                                        <table cellpadding="0" cellspacing="0" class="width100pr">
                                                            <tbody><tr>
                                                                <td class="titleTD">
                                                                    <div class="ResumeTable_Info_Title">ترشيد التكاليف السنوية</div>
                                                                </td>
                                                                <td class="tools_0009">
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                        <table cellpadding="0" cellspacing="0" class="tools_0016">
                                                            <tbody><tr>
                                                                <td class="tools_0014">نوع التكلفة</td>
                                                                <td class="tools_0014">قبل الترشيد</td>
                                                                <td class="tools_0014">بعد الترشيد</td>
                                                            </tr>
                                                            </tbody></table>
                                                        <div id="outputPlanYearlyExpenses" class="tools_0008">لا يوجد ماهو قابل للترشيد ..</div>
                                                        <div class="ArticleSeparator_Form"></div>
                                                    </div>
                                                    <div id="goalAchieved" class="tools_0003">
                                                        <div class="tools_x000">
                                                            الهدف متحقق دون ترشيد
                                                        </div>
                                                        <div class="tools_x001">
                                                            هدفك متحقق دون ترشيد حيث أنه لا يوجد عجز لسده ولا توجد خطة إدخار تستحق الترشيد في تكاليفك.
                                                        </div>
                                                        <div class="ArticleSeparator_Form"></div>
                                                    </div>
                                                    <div id="goalCannotBeAchieved" class="tools_0003">
                                                        <div class="tools_x000">
                                                            لايمكن تحقيق الهدف
                                                        </div>
                                                        <div class="tools_x001">
                                                            لايمكن تحقيق هدف سد العجز أو الادخار المطلوب لأحد الأسباب التالية: <br>
                                                            1. إما بسبب عدم وجود تكاليف قابلة للترشيد، أو <br>
                                                            2. بسبب أن إجمالي قيمة التكاليف القابلة للترشيد أقل من القيمة المطلوبة لسد العجز أو تحقيق قيمة الادخار المطلوبة.<br>
                                                            ربما يتوجب عليك إعادة مراجعة تكاليفك لترى ما إذا كان هناك تكاليف تستطيع الاستغناء عنها أو جعلها قابلة للترشيد. وربما أيضا يتوجب عليك
                                                            النظر في زيادة دخلك لتحقيق هذه الهدف.
                                                        </div>
                                                        <div class="ArticleSeparator_Form"></div>
                                                    </div>

















                                                </div>
                                                <script>
                                                    function copyLinkToClipboardCO() {
                                                        var clipboard = new Clipboard('#SAVEDBOXCO_editLink', {
                                                            target: function() {
                                                                return document.querySelector('#editLinkCO');
                                                            }
                                                        });
                                                        alert("تم نسخ الرابط.");
                                                    }
                                                    function COEdited() {
                                                        $("#SAVEBOXCO_saved").hide();
                                                        $("#SAVEBOXCO_unsaved").show();
                                                        $("#SAVEDBOXCO_viewLink").attr("href","#");
                                                        $("#SAVEDBOXCO_viewLink").attr("onclick","return false;");
                                                        $("#editLinkCO").html("");
                                                    }
                                                    function COSaved(id,el,vl) {
                                                        $("#COID").val(id);
                                                        $("#editLinkCO").html(el);
                                                        $("#SAVEDBOXCO_viewLink").attr("onclick","return true;");
                                                        $("#SAVEDBOXCO_viewLink").attr("href",vl + "?ac="+Math.round(Math.random()*10000));
                                                        $("#SAVEBOXCO_unsaved").hide();
                                                        $("#SAVEBOXCO_saved").show();
                                                    }
                                                </script>

                                                <div id="SAVEBOXCO_unsaved" class="tools_1_004">
                                                    <div style="margin-bottom: 20px;">
                                                        يتوجب حفظ التعديلات قبل الاستخراج
                                                    </div>
                                                    <div>
                                                        <input id="saveButtonCO" type="submit" value="● حفظ الخطة" class="tools_0026" onclick="submitCO(); return false;">
                                                    </div>
                                                </div>
                                                <div id="SAVEBOXCO_saved" class="tools_1_004">
                                                    <div style="margin-bottom: 20px;">✔ <b>تم الحفظ!</b>
                                                        <div class="tools_1_001"></div>
                                                        اضغط استخراج للعرض والطباعة.
                                                        <div class="tools_1_002"></div>
                                                        أكمل الخطة لاحقا باستخدام ..
                                                        <div class="tools_1_001"></div>
                                                        🌐 الرابط المباشر:
                                                        <div class="tools_1_001"></div>
                                                        <span id="editLinkCO" class="tools_1_003"></span>
                                                        <div class="tools_1_001"></div>
                                                    </div>
                                                    <div class="tools_0012_22">
                                                        <a id="SAVEDBOXCO_viewLink" href="#" onclick="return false;" target="_blank" class="tools_0012_21">● استخراج خطة الترشيد</a>
                                                        <a id="SAVEDBOXCO_editLink" href="#" onclick="copyLinkToClipboardCO(); return false;" class="tools_0012_21">● نسخ الرابط المباشر</a>
                                                        <div style="width: 100%; height: 10px;"></div>
                                                    </div>
                                                </div>
                                            </td></tr></tbody></table>                    </div>

                                <script>
                                </script></div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
@endsection