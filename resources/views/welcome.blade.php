<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
    <html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.: MyIMMs - e-Services :.</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/jquery-tab-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/page.css') }}">
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('js/jquery-1.3.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-plugin-validate.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/BaseCommon.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/BaseSession.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('js/audittrail.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datetimepicker.js') }}"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="{{ asset('js/jquery-1.3.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-plugin-validate.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/audittrail.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/progressScreen.js') }}"></script>

        <script type="text/javascript">
            if(typeof window.event != undefined)
                document.onkeydown = function()
            {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if (( t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (t == 'textarea' && ro) || (kc == 8 && (t == 'submit' || t == 'select-one')) )
                    return false;
            }
            //validation carian
            function fnSearchRocNo()
            {
                $("form").unbind("submit");
                var valid = true;

                $(".required").each(function() {
                    $(this).removeClass("errFld");
                });
				
                var applno  = $("#MAD_APPL_NO").val();
                var rocno   = $("#MAD_ROC_NO").val();

            
                
                        if (applno == '' && rocno == ''){

                            $("#MAD_APPL_NO").addClass("errFld");
                            $("#MAD_ROC_NO1").addClass("errFld");
                            $("#MAD_ROC_NO2").addClass("errFld");

                            valid = false;
                        }
            
	
                        if( !valid )
                        {
                            alert("Sila isikan maklumat berikut.");
                        }
                        else {
                            $("#SEARCH_IND").val('NEW');
                        }

                        return valid;
                    }
			
                    function fnSearchAgency()
                    {
                        $("form").unbind("submit");
                        var valid = true;

                        $(".required").each(function() {
                            $(this).removeClass("errFld");
                        });
				
                        var agency  = $("#MAD_GOV_AGCY_CD").val();
                
                        if (agency == ''){

                            $("#MAD_GOV_AGCY_CD").addClass("errFld");

                            valid = false;
                        }
	
                        if( !valid )
                        {
                            alert("Sila isikan maklumat berikut.");
                        }

                        return valid;
                    }
			
                    $(window).load(function ()
                    {
                        $('#currentPgNo').change((e) => {
                            var selectedPage = $('#currentPgNo').val();
                            if (parseInt(selectedPage) > parseInt({{ ISSET($praStatuses) ? $praStatuses->lastPage() : 0 }})) {
                                selectedPage = '{{ ISSET($praStatuses) ? $praStatuses->lastPage() : "1" }}';
                            }else if(selectedPage < 1) {
                                selectedPage = "1";
                            }
                            var goPage = '{{ ISSET($praStatuses) ? $praStatuses->url(1) : "" }}';
                            goPage = goPage.slice(0, -1) + selectedPage;
                            $('#go_form').attr('action', goPage);
                        });

                        // if ( Number(($('#currentPgNo').val())) == Number(1)  ){
                        //     $('#next').attr('disabled',true);
                        //     $('#last').attr('disabled',true);
                        // }
                        // if ( Number(1) == 1 ){
                        //     $('#go').attr('disabled',true);
                        // }
                        // if ( Number(($('#currentPgNo').val())) == 1  ){
                        //     $('#prev').attr('disabled',true);
                        //     $('#first').attr('disabled',true);
                        // }
                        
                        // if ( Number(($('#currentPgNo2').val())) == Number(1)  ){
                        //     $('#next2').attr('disabled',true);
                        //     $('#last2').attr('disabled',true);
                        // }
                        // if ( Number(1) == 1 ){
                        //     $('#go2').attr('disabled',true);
                        // }
                        // if ( Number(($('#currentPgNo2').val())) == 1  ){
                        //     $('#prev2').attr('disabled',true);
                        //     $('#first2').attr('disabled',true);
                        // }
                    });

                    function fnPaymentDet( applNo, finNo ){

                        var vConfirmMsg = "Anda boleh membuat pembayaran di Kaunter atau Online. Teruskan untuk membuat pembayaran melalui Online.";

                        var dialogH = 170;
                        var dialogW = 500;
                        //Get the window height and width
                        var winH = ($(window).height()/2)+(dialogH/2);
                        var winW = ($(window).width()/2)-(dialogW/2);

                        var wPymt = window.showModalDialog("myimms/confirmWin", vConfirmMsg ,"resizable: yes; dialogHeight: "+dialogH+"px; dialogWidth: "+dialogW+"px; dialogTop: "+winH+"px; dialogLeft: "+winW+"px; " );

                        if( wPymt == "Confirm"){
            
                                $("#APPL_NO").val(applNo);
                                $("#FIN_NO").val(finNo);

                                return true;
                            }
                            else{
                                return false;
                            }
                        }

                        function fnPaymentRePrint( applNo, finNo ){

                            var vPymtDet = "MAD_APPL_NO="+applNo+"&MAD_FIN_NO="+finNo+"&RE_PRINT=Y";
                            var wPrint   = window.showModalDialog("myimms/PRAStatus/praPaymentPrint?"+vPymtDet, "" ,"resizable: yes; dialogHeight: 500px; dialogWidth: 1100px; ");
                        }

            

                function gotoPageNo( type ) {
                    $("form").unbind("submit");

                    var result = fnSearchRocNo();

                    if( result ){

                        var vCurrentPgNo = $('#currentPgNo').val().trim();
                        if ( vCurrentPgNo == '' || Number(vCurrentPgNo) == '0' )
                            $('#currentPgNo').val('1');

                        if( type == 'first'){
                            document.getElementById("currentPgNo").value = '1';
                        }
                        else if( type == 'prev'){
                            var vACT_PAGE = Number(1) - 1;
                            if( '1' == '1' ){
                                vACT_PAGE = '1';
                            }
                            document.getElementById("currentPgNo").value = vACT_PAGE;
                        }
                        else if( type == 'go'){
                            if ( Number(($('#currentPgNo').val())) > Number(1)  ){
                                alert("Maksimum muka surat ialah"+" "+1);
                                return false;
                            }
                        }
                        else if( type == 'next'){
                            var vACT_PAGE = Number(1) + 1;
                            if( Number(vACT_PAGE) > Number(1) ){
                                vACT_PAGE = '1';
                            }
                            document.getElementById("currentPgNo").value = vACT_PAGE;
                        }
                        else if( type == 'last'){
                            document.getElementById("currentPgNo").value = '1';
                        }

                        $("#SEARCH_IND").val('OLD');

                        
                                document.forms[0].txnDetail.value = gen_varpart();
                            }
                            return result;
                        }
                        
                        function gotoPageNo2( type ) {
                        $("form").unbind("submit");

                        var result = fnSearchRocNo();

                        if( result ){

                            var vCurrentPgNo = $('#currentPgNo2').val().trim();
                            if ( vCurrentPgNo == '' || Number(vCurrentPgNo) == '0' )
                                $('#currentPgNo2').val('1');

                            if( type == 'first'){
                                document.getElementById("currentPgNo2").value = '1';
                            }
                            else if( type == 'prev'){
                                var vACT_PAGE = Number(1) - 1;
                                if( '1' == '1' ){
                                    vACT_PAGE = '1';
                                }
                                document.getElementById("currentPgNo2").value = vACT_PAGE;
                            }
                            else if( type == 'go'){
                                if ( Number(($('#currentPgNo2').val())) > Number(1)  ){
                                    alert("Maksimum muka surat ialah"+" "+1);
                                    return false;
                                }
                            }
                            else if( type == 'next'){
                                var vACT_PAGE = Number(1) + 1;
                                if( Number(vACT_PAGE) > Number(1) ){
                                    vACT_PAGE = '1';
                                }
                                document.getElementById("currentPgNo2").value = vACT_PAGE;
                            }
                            else if( type == 'last'){
                                document.getElementById("currentPgNo2").value = '1';
                            }

                            $("#SEARCH_IND").val('OLD');

                            
                                    document.forms[0].txnDetail.value = gen_varpart();
                                }
                                return result;
                            }

                        $(function(){

                            $("#MAD_ROC_NO1")
                            .bind('keyup',function(event) {
                                $("#MAD_ROC_NO2").val('');
                                $("#MAD_ROC_NO2").removeClass("errFld");

                                var eTyp = event.srcElement.type;
                                var eKey = event.keyCode;

                                if( eTyp == 'text' && eKey != 8  ){
                                    validatePhoneNo(this,$('#MAD_ROC_NO1').val());
                          
                                    if( $("#MAD_ROC_NO1").val().length == 6 ){
                                        $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val() + '-');
                                    }
                          
                                    if( $("#MAD_ROC_NO1").val().length == 9 && $("#MAD_ROC_NO1").val().charAt(6) == '-' ){
                                        $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val() + '-');
                                    }
                          
                                }
                                else{
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().replace("-", "") );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 6 && $("#MAD_ROC_NO1").val().charAt(6) != '-' ){
                                    var part2 = $("#MAD_ROC_NO1").val().substr(6, $("#MAD_ROC_NO1").val().length);
                                    if( part2.indexOf("-") > -1 ){
                                        part2 = part2.replace("-", "");
                                    }

                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 6) + '-' + part2 );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 9 && $("#MAD_ROC_NO1").val().charAt(9) != '-' ){
                                    var part2 = $("#MAD_ROC_NO1").val().substr(9, $("#MAD_ROC_NO1").val().length);
                                    if( part2.indexOf("-") > -1 ){
                                        part2 = part2.replace("-", "");
                                    }
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 9) + '-' + part2 );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 14){
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 14) );
                                }

                                $("#MAD_ROC_NO").val($("#MAD_ROC_NO1").val());
                            });

                            $("#MAD_ROC_NO2")
                            .bind('blur',function(event) {
                                $("#MAD_ROC_NO").val($("#MAD_ROC_NO2").val());
                               
                            });


                            $("#VIEW_IMG")
                            .bind('click',function(event) {
                                window.showModalDialog("{{ asset('images/visapass/AP_SampleApplNo.jpg') }}", "" ,"resizable: yes; dialogHeight: 450px; dialogWidth: 1100px;");
                            });

                            $('#currentPgNo')
                            .bind('keyup',function(event) {
                                validateNumber(this,$('#currentPgNo').val());
                            });

                        });

        </script>
        <style type="text/css">
            .style1 {color: #0000FF}
            .labelM_3{padding-left:10px;background-color: #B3D9FF;font-size: 12px;line-height: 18px;width: 180px;border-bottom: 0px dotted #E0E0E0;}
        </style>
    

        <script language="javascript" type="text/javascript">
        if(typeof window.event != undefined)
                document.onkeydown = function()
            {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if ( ( t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (kc == 8 && (t == 'submit' || t == 'select-one' || t == 'button')) )
                    return false;
            }
            
            $(document).ready(function()
            {
                $.ajax({
                    type: "GET",
                    url: "myimms/menu_xml.xml",
                    dataType: "xml",
                    success: function(xml) { parseXml(xml); }
                });
            });

            function parseXml(xml)
            {
                var type = '36';
                var _lang = 'ms';
                var jList = $("#list");
                var c_lang = 'ms';
                var module = 'pra';
                var subModule = '';

                //alert('type:'+type+">> lang:"+_lang +">> module:"+module);
                if (_lang == ""){
                    _lang = c_lang;
                }

                var urlPath = $(location).attr('pathname');
                var urlBind = urlPath.substring(urlPath.lastIndexOf("/")+1,urlPath.length);
                
                $(xml).find("Business").each(function()
                {
                    if (type == $(this).attr("name")) {

                        $(xml).find("Module").each(function()
                        {
                            var moduleType = $(this).attr("type");
                            //alert('type : '+type);

                            if (module == moduleType){
                                if (_lang == "ms")
                                    $("#menu").append($(this).find("Title_ms").text() + "<br />");
                                else
                                    $("#menu").append($(this).find("Title_en").text() + "<br />");

                                $(this).find("SubMenus").each(function()
                                {
                                    var arr;
                                    if (_lang == "ms")
                                        arr = $(this).find("menu_ms").text();
                                    else
                                        arr = $(this).find("menu_en").text();

                                    var arrPath = $(this).find("url").text();
                                    var parameter = $(this).find("parameter").text();

                                    var vCls = "";
                                    if( arrPath == urlBind || arrPath == subModule ){
                                        vCls = " class=active ";
                                    }

                                    if (parameter != "")
                                        arrPath += "?type=" + type + "&lang=" + 'ms' + "&" + parameter;
                                    else
                                        arrPath += "?type=" + type + "&lang=" + 'ms';

                                    jList.append(
                                    $( "<li><span ><a href = " + arrPath + vCls + ">" + arr + "</a></span></li>" )

                                );
                                    
                                         
                                });


                            }
                        });

                    }
                });
            }

            function showClock()
            {
                var clock=new Date();
                var hours=clock.getHours();
                var minutes=clock.getMinutes();
                var seconds=clock.getSeconds();
                // for a nice disply we'll add a zero before the numbers between 0 and 9
                if (hours<10){
                    hours="0" + hours;
                }
                if (minutes<10){
                    minutes="0" + minutes;
                }
                if (seconds<10){
                    seconds="0" + seconds;
                }
                document.getElementById('showText').value=hours+":"+minutes+":"+seconds;
                t=setTimeout('showClock()',500);
            /* setTimeout() JavaScript method is used to call showClock() every 1000 milliseconds (that means exactly 1 second) */
            }
        </script>

        <script type="text/javascript">
            document.onclick=function() {         
                document.getElementById("popFrame").style.visibility="hidden";
            }
        </script>
  </head>

  <body onload="javascript:showClock();">
        <iframe src="{{ asset('js/popcal.html') }}" name="popFrame" id="popFrame" scrolling="no" frameborder="0" style="border:0; visibility:hidden;position:absolute;z-index:65535" width="204" height="184"></iframe>
        <input type="hidden" name="hdCurrLang" id="hdCurrLang" value="ms">
        <input type="hidden" name="hdCode" id="hdCode">
        <input type="hidden" name="counter" id="counter">

       <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td height="96" width="775" background="{{ asset('images/header/ms_Animated96.gif') }}">
                    <table border="0" width="775">
                        <tbody><tr>
                            <td width="25">&nbsp;</td>
                            <td width="130">&nbsp;</td>
                            <td width="110">&nbsp;</td>
                            <td width="40">&nbsp;</td>
                            <td width="150">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="3" valign="bottom">
                                
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2" align="">
                                <div style="width: 80px; overflow: auto; height: 30px; margin: 0; position: absolute; top: 58px;left: 398px; float: left;">
                                    <input type="text" name="showText" id="showText" readonly="true" style="width:60px;text-align:center;border:0px; font-size:11pt; font-weight: bold; font-family: Century Gothic;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3"><br>Log masuk adalah&nbsp;PELAWAT</td>
                        </tr>
                    </tbody></table>
                </td>
                <td height="96" background="{{ asset('images/header/square.jpg') }}">&nbsp;</td>
                <td height="96" width="220" background="{{ asset('images/header/square.jpg') }}">
                    <table border="0" width="220">
                        <tbody><tr>
                            <td align="center">
                                
                                    
                                    {{ $date ?? '' }}
                                
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/header/JIM_verticalLine.jpg') }}" width="200" height="7" border="0" alt=""></td>
                        </tr>
                        <tr>
                            <td align="center">
                                
                                
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/header/JIM_verticalLine.jpg') }}" width="200" height="7" border="0" alt=""></td>
                        </tr>
                        <tr>
                            <td align="center">&nbsp;
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody></table>

      <div id="boxmaster-b">
          <div id="boxmain">
              <div id="boxmenu">
                  <div id="box_menucontentPublic">
                      <div id="box_menucontainerPublic">
                    <br>
                    <li><span id="menu" class="submenu">MyONLINE*Pembantu Rumah Asing / Pekerja Asing<br></span>
                    <ul>
                        <ol id="list" style="text-transform: uppercase">
                        <!--- List items will be added dynamically. --->
                        <li><span><a href="{{ url('myimms/PRAStatus') }}" class="active">Pertanyaan Status Permohonan</a></span></li><li><span><a href="PRAVideoManual?type=36&amp;lang=ms&amp;module=pra">Video Tutorial</a></span></li></ol>
                    </ul>
                    </li>
                      </div>
                  </div>
              </div>

              <div id="box_contentPublic">
                  <div id="msg">

                      
                      
                  </div>
                  
        
<div class="form_container">
<form method="POST" action="{{ url('myimms/PRAStatus/search') }}" id="PRAStatus">
@csrf

            <input type="hidden" name="txnDetail">
            <input type="hidden" name="SEARCH_IND" id="SEARCH_IND" value="">

            <input type="hidden" name="APPL_NO" id="APPL_NO">
            <input type="hidden" name="FIN_NO" id="FIN_NO">
            <input type="hidden" name="VSTR_TYP" id="VSTR_TYP" value="M">
            <input type="hidden" name="CurrLang" id="CurrLang" value="ms">

            <div id="progressWin" style="display: none; top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;">
                <div id="progressBg" style=" background-image: url('{{ asset('styles/ui-lightness/images/ui-bg_diagonals-thick_20_666666_40x40.png') }}'); opacity: 0.6; filter: alpha(opacity=60); background-repeat: repeat; top: 0; left: 0; width: 100%; height: 100%; position: absolute; z-index: 1;"></div>
                <div id="progressTxt" style="font-size: 15px; font-weight: bold; position: absolute; top: 40%; width: 100%; overflow: visible; z-index: 2;" align="center">
                    <table width="350px" align="center" bgcolor="grey" style="height: 80px; border-color: black; border-width: medium; border-style: solid; ">
                        <tbody><tr>
                            <td valign="middle" align="center">
                                <img src="{{ asset('images/loading.gif') }}" border="0">
                                <br>
                                Pemprosesan Sedang Dijalankan. Sila Tunggu . . .
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>

            <div>
                <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                    <tbody><tr>
                        <td colspan="5" class="rowheader">STATUS PERMOHONAN PEMBANTU RUMAH ASING / PEKERJA ASING</td>
                    </tr>
                    <tr>
                        <td width="20%">&nbsp;</td>
                        <td width="20%">&nbsp;</td>
                        <td width="7%">&nbsp;</td>
                        <td width="20%">&nbsp;</td>
                        <td width="33%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5" bgcolor="#FFFF00">
                            <table border="0" style="font-weight: bold;">
                                <tbody><tr>
                                    <td width="9%">&nbsp;</td>
                                    <td width="1%">&nbsp;</td>
                                    <td width="60%">&nbsp;</td>
                                </tr>
                                <tr valign="top">
                                    <td colspan="3">
                                        <span style="text-transform: uppercase;">Status :</span>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <td>PERMOHONAN DITERIMA</td><td>-</td><td>Permohonan telah diterima.</td>
                                </tr>
                                <tr valign="top">
                                    <td>BARU</td><td>-</td><td>Permohonan telah diterima dan sedang diproses oleh Jabatan Imigresen Malaysia. Sila kirimkan salinan asal dari dokumen-dokumen sokongan sekiranya belum berbuat demikian.</td>
                                </tr>
                                <tr valign="top">
                                    <td>LULUS</td><td>-</td><td>Permohonan telah diluluskan oleh Jabatan Imigresen Malaysia dan bersedia untuk Pembayaran dan cetakan Pelekat. Sila buat pemeriksaan FOMEMA sekiranya belum berbuat demikian.</td>
                                </tr>
                                <tr valign="top">
                                    <td>TOLAK</td><td>-</td><td>Permohonan telah ditolak oleh Jabatan Imigresen Malaysia.</td>
                                </tr>
                                <tr>
                                    <td>BATAL</td><td>-</td><td>Permohonan telah dibatalkan oleh Jabatan Imigresen Malaysia.</td>
                                </tr>
                                <tr valign="top">
                                    <td>BAYAR</td><td>-</td><td>Permohonan telah dibayar dan bersedia untuk Cetakan Pelekat.</td>
                                </tr>
                                <tr valign="top">
                                    <td>CETAK</td><td>-</td><td>Pelekat telah di cetak dan sedia untuk dipungut.</td>
                                </tr>
                                <tr valign="top">
                                    <td>TANGGUH</td><td>-</td><td>Permohonan telah ditangguh oleh Jabatan Imigresen Malaysia.</td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                    <input type="hidden" name="MAD_ROC_NO" id="MAD_ROC_NO" value="">
                    <td class="labelM_3">No. Kad Pengenalan Majikan</td>
                    <td><input name="MAD_ROC_NO1" type="text" id="MAD_ROC_NO1" value="{{$employee?? '' }}" size="35" maxlength="20" style="text-transform: uppercase"><br>( Contoh Format : 999999-99-9999 )</td>
                    <td align="center"><b>ATAU</b></td>
                    <td class="labelM_3">No. Pendaftaran Syarikat</td>
                    <td><input name="MAD_ROC_NO2" type="text" id="MAD_ROC_NO2" value="{{$identification?? '' }}" size="35" maxlength="20" style="text-transform: uppercase"></td>
                    </tr>
                    <tr>
                        <td class="labelM_3">Nombor Permohonan</td>
                        <td colspan="3">
                            <input name="MAD_APPL_NO" type="text" id="MAD_APPL_NO" value="{{ $application_number ?? '' }}" size="51" maxlength="45" style="text-transform: uppercase" class="required">
                            <div id="VIEW_IMG" style="position: absolute; cursor: hand;"><img src="{{ asset('images/search_icon.png') }}" border="0" alt="Lihat Contoh">Lihat Contoh</div>
                        </td>
                        <td><input name="agencyIndicator" type="hidden" id="agencyIndicator" value="1"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    
                        <tr>
                            <td colspan="5">
                                <input type="submit" name="searchStatusPRA" id="searchStatusPRA" value="Carian" onclick="return fnSearchRocNo();" style="width: 100px;">
                                <input type="submit" id="view" name="view" value="KOSONGKAN" style="width: 100px;">
                            </td>
                        </tr>
                    
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    </form>
                </tbody></table>
            </div>
            <div>
                <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                    
                    <tbody><tr>
                        <td colspan="6" height="20px"></td>
                    </tr>
                </tbody></table>
            </div>
            <div>
                <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                    <tbody><tr class="subheader">
                        <td width="5%">Bil</td>
                        <td width="20%">Nombor Permohonan</td>
                        <td width="11%">No. Kad Pengenalan Majikan/ No. Pendaftaran Syarikat</td>
                        <td width="25%">Nama Pembantu Rumah/Pekerja</td>
                        <td width="15%">Nombor Dokumen</td>
                        <td width="14%">Status</td>
                        
                    </tr>

                        @if(isset($praStatuses))
                            @foreach($praStatuses as $praStatus)
                            <tr class="grida">
                                <td><div align="center">{{ ((($praStatuses->currentPage() - 1) * 15) + $loop->iteration) }}</div></td>
                                <td><div align="center">{{ $praStatus->application_number }}</div></td>
                                <td><div align="center">{{ $praStatus->identification }}</div></td>
                                <td><div align="center">{{ $praStatus->employee }}</div></td>
                                <td><div align="center">{{ $praStatus->document_number }}</div></td>
                                <td><div align="center">{{ $praStatus->status }}</div></td>
                            </tr>
                            @endforeach

                            @if(COUNT($praStatuses) <= 0)
                            <tr>
                                <td colspan="9" align="center" id="listNull">
                                    <font color="red"><strong>Rekod Tidak Dijumpai</strong></font>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" style="height: 10px;"><font style="font-weight: bolder">Jumlah Rekod : {{ $praStatuses->total() }}</font></td>
                                <td colspan="3" style="height: 10px; text-align: right">

                                    
                                    <form style="display: inline;" action="{{ $praStatuses->url(1) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="MAD_ROC_NO" value="{{$identification?? '' }}" />
                                        <input type="hidden" name="MAD_ROC_NO1" value="{{$employee?? '' }}" />
                                        <input type="hidden" name="MAD_APPL_NO" value="{{$application_number?? '' }}" />
                                        &nbsp;<input type="submit" name="searchStatusPRA" id="first" value="&nbsp;Ι&nbsp;<&nbsp;" title="Click here to show first page records" @if($praStatuses->currentPage() == $praStatuses->firstItem()) disabled="" @endif>
                                    </form>
                                    <form style="display: inline;" action="{{ $praStatuses->previousPageUrl() }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="MAD_ROC_NO" value="{{$identification?? '' }}" />
                                        <input type="hidden" name="MAD_ROC_NO1" value="{{$employee?? '' }}" />
                                        <input type="hidden" name="MAD_APPL_NO" value="{{$application_number?? '' }}" />
                                        &nbsp;<input type="submit" name="searchStatusPRA" id="prev" value="&nbsp;<<&nbsp;" title="Click here to show previous page records" @if($praStatuses->previousPageUrl() == NULL) disabled="" @endif>
                                    </form>
                                    <form style="display: inline;" action="{{ $praStatuses->previousPageUrl() }}" method="POST" id="go_form">
                                        @csrf
                                        <input type="hidden" name="MAD_ROC_NO" value="{{$identification?? '' }}" />
                                        <input type="hidden" name="MAD_ROC_NO1" value="{{$employee?? '' }}" />
                                        <input type="hidden" name="MAD_APPL_NO" value="{{$application_number?? '' }}" />
                                        &nbsp;<input type="text" name="currentPgNo" id="currentPgNo" size="2" value="{{ $praStatuses->currentPage() }}"><font style="font-weight: bolder">&nbsp;dari&nbsp;  {{ $praStatuses->lastPage() }}</font>
                                        &nbsp;<input type="submit" name="searchStatusPRA" id="go" value="PERGI KE" title="Click Here to find specific page number">
                                    </form>
                                    <form style="display: inline;" action="{{ $praStatuses->nextPageUrl() }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="MAD_ROC_NO" value="{{$identification?? '' }}" />
                                        <input type="hidden" name="MAD_ROC_NO1" value="{{$employee?? '' }}" />
                                        <input type="hidden" name="MAD_APPL_NO" value="{{$application_number?? '' }}" />
                                        &nbsp;<input type="submit" name="searchStatusPRA" id="next" value="&nbsp;>>&nbsp;" title="Click here to show next page records"  @if($praStatuses->nextPageUrl() == NULL) disabled="" @endif>
                                    </form>
                                    <form style="display: inline;" action="{{ $praStatuses->url($praStatuses->lastPage()) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="MAD_ROC_NO" value="{{$identification?? '' }}" />
                                        <input type="hidden" name="MAD_ROC_NO1" value="{{$employee?? '' }}" />
                                        <input type="hidden" name="MAD_APPL_NO" value="{{$application_number?? '' }}" />
                                        &nbsp;<input type="submit" name="searchStatusPRA" id="last" value="&nbsp;>&nbsp;Ι&nbsp;" title="Click here to show last page records" @if($praStatuses->currentPage() == $praStatuses->lastPage()) disabled="" @endif>
                                    </form>
                                </td>
                            </tr>
                            @endif

                            
                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                        @endif
                    
                    
                </tbody></table>
            </div>
        
    <div style="display: none;"><input type="hidden" name="_sourcePage" value="wgLeY4TC4eWxKMIoJzO2LdPLqXSloz73He2oNnS3AuQvYZaXzeX0Zowq9TslDDiz"><input type="hidden" name="__fp" value="Nojpc0W8MYU="></div>
</div>


    
              </div>
          </div>
      </div>
    


</body></html>
