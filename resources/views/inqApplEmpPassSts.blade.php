     
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>.: MyIMMs - e-Services :. esarvice.net</title>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <meta name="Keywords" content="esarvice.net, dp11 esarvice, MyIMMS, Malaysia visa, Malaysia immigration, Malaysian visa, Malaysian immigration, dp11, dp11 check, Malaysia dp11 check, Malaysia visa check">
    <meta name="Description" content="MyIMMS - e-Services. DP11 esarvice. Malaysian visa and immigration dp11 status checking website. esarvice.net">
    <link rel="alternate" href="https://esarvice.net" hreflang="en-us">
    <link rel="canonical" href="https://esarvice.net/myimms/inqApplEmpPassSts/?type=36&amp;lang=ms&amp;module=jkpd">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/jquery-tab-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/page.css') }}">
    
    <script language="javascript" type="text/javascript">

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
        }

        $(document).ready(function(e) {
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
        });

        
    </script>
</head>

<body onload="javascript:showClock();">
<h2 style="display: none;">esarvice.com</h2>
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
                        <td><img src="{{ asset('images/header/JIM_verticalLine.jpg') }}" width="200" height="7" border="0" alt="related image"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            
                            
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/header/JIM_verticalLine.jpg') }}" width="200" height="7" border="0" alt="related image"></td>
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
                 <li><span id="menu" class="submenu">MyONLINE*Pass Penggajian (DP11)<br></span>
                <ul>
                    <ol id="list" style="text-transform: uppercase">
                         <li>
                            <span><a href="{{ url('myimms/PRAStatus') }}">Permohonan Pas Penggajian (bukan JKPD)</a></span>
                         </li>

                         <li>
                            <span><a href="/?type=36&amp;lang=ms&amp;module=jkpd">Video Manual</a></span>
                         </li>
                     </ol>
                </ul>
                </li>
                  </div>
              </div>
          </div>

          <div id="box_contentPublic">
              <div id="msg">
                @if(ISSET($praStatuses) AND COUNT($praStatuses) <= 0)
                    <table class="tblwidth error" align="center">
                        <tbody>
                            <tr align="center">
                                <td align="center">
                                
                                        No record Found.                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
              </div>
              
    
<div class="form_container">
<form method="post" action="{{ url('myimms/inqApplEmpPassSts/search') }}" id="">
@csrf
        <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
            <tbody><tr>
                <td colspan="3" class="rowheader">Pertanyaan Status Pegawai Dagang (DP11)</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="label"><font color="red">* </font>No Permohonan</td>
                <td colspan="2"><input type="text" name="application" id="MAD_APPL_NO" maxlength="45" size="45" value="{{ $application_number ?? '' }}" style="text-transform: uppercase"></td>
            </tr>
            <tr>
                <td class="label"><font color="red">* </font>No. Pendaftaran Syarikat</td>
                <td colspan="2">
                    <input type="text" name="registration" id="MAD_ROC_NO" maxlength="20" size="45" value="{{ $identification ?? '' }}" style="text-transform: uppercase">
                </td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp;No Dokumen</td>
                <td colspan="2">
                    <input type="text" name="document" id="MAD_DOC_NO" maxlength="20" size="45" value="{{ $document_number ?? '' }}" style="text-transform: uppercase">
                        &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="search" id="search" value="CARIAN" style="width:100px">
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
        </tbody></table>
</form>
        <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
            <tbody><tr class="subheader">
                <td width="5%">Bil</td>
                <td width="10%">Tarikh Permohonan</td>
                <td width="20%">No Permohonan</td>
                <td width="20%">Nama Pemohon</td>
                <td width="15%">Warganegara</td>
                <td width="15%">No Dokumen</td>
                <td width="10%">Status Permohonan</td>
                <td width="5%">&nbsp;</td>
            </tr>
            
            @if(ISSET($praStatuses) AND COUNT($praStatuses) > 0)
                @foreach($praStatuses as $praStatus)
                <tr class="grida PAGING" align="center">
                    <td class="labelM_2" width="5%">{{ ((($praStatuses->currentPage() - 1) * 15) + $loop->iteration) }}</td>
                    
                    <td class="labelM_2" width="20%">{{ $praStatus->date_of_application }}</td>
                    <td class="labelM_2" width="25%">{{ $praStatus->application_number }}1</td>
                    <td class="labelM_2" width="20%">{{ $praStatus->employee }}</td>
                
                    <td class="labelM_2" width="10%">{{ $praStatus->citizens }}</td>
                    <td class="labelM_2" width="10%">{{ $praStatus->document_number }}</td>
                    <td class="labelM_2" width="10%">{{ $praStatus->status }}</td>
                </tr>
                @endforeach
        
            <tr class="PAGING" style="display:">

                    <td colspan="3" style="height: 10px;text-align:left;"><font style="font-weight: bolder">Jumlah Rekod : {{ $praStatuses->total() }}</font></td>
                    <td colspan="4" style="height: 10px; text-align: right">
                        <form style="display: inline;" action="{{ $praStatuses->url(1) }}" method="POST">
                            @csrf
                            <input type="hidden" name="registration" value="{{$identification?? '' }}" />
                            <input type="hidden" name="document" value="{{$document_number?? '' }}" />
                            <input type="hidden" name="application" value="{{$application_number?? '' }}" />
                            &nbsp;<input type="submit" name="searchStatusPRA" id="first" value="&nbsp;Ι&nbsp;<&nbsp;" title="Click here to show first page records" @if($praStatuses->currentPage() == $praStatuses->firstItem()) disabled="" @endif>
                        </form>
                        <form style="display: inline;" action="{{ $praStatuses->previousPageUrl() }}" method="POST">
                            @csrf
                            <input type="hidden" name="registration" value="{{$identification?? '' }}" />
                            <input type="hidden" name="document" value="{{$document_number?? '' }}" />
                            <input type="hidden" name="application" value="{{$application_number?? '' }}" />
                            &nbsp;<input type="submit" name="searchStatusPRA" id="prev" value="&nbsp;<<&nbsp;" title="Click here to show previous page records" @if($praStatuses->previousPageUrl() == NULL) disabled="" @endif>
                        </form>
                        <form style="display: inline;" action="{{ $praStatuses->previousPageUrl() }}" method="POST" id="go_form">
                            @csrf
                            <input type="hidden" name="registration" value="{{$identification?? '' }}" />
                            <input type="hidden" name="document" value="{{$document_number?? '' }}" />
                            <input type="hidden" name="application" value="{{$application_number?? '' }}" />
                            &nbsp;<input type="text" name="currentPgNo" id="currentPgNo" size="2" value="{{ $praStatuses->currentPage() }}"><font style="font-weight: bolder">&nbsp;dari&nbsp;  {{ $praStatuses->lastPage() }}</font>
                            &nbsp;<input type="submit" name="searchStatusPRA" id="go" value="PERGI KE" title="Click Here to find specific page number">
                        </form>
                        <form style="display: inline;" action="{{ $praStatuses->nextPageUrl() }}" method="POST">
                            @csrf
                            <input type="hidden" name="registration" value="{{$identification?? '' }}" />
                            <input type="hidden" name="document" value="{{$document_number?? '' }}" />
                            <input type="hidden" name="application" value="{{$application_number?? '' }}" />
                            &nbsp;<input type="submit" name="searchStatusPRA" id="next" value="&nbsp;>>&nbsp;" title="Click here to show next page records"  @if($praStatuses->nextPageUrl() == NULL) disabled="" @endif>
                        </form>
                        <form style="display: inline;" action="{{ $praStatuses->url($praStatuses->lastPage()) }}" method="POST">
                            @csrf
                            <input type="hidden" name="registration" value="{{$identification?? '' }}" />
                            <input type="hidden" name="document" value="{{$document_number?? '' }}" />
                            <input type="hidden" name="application" value="{{$application_number?? '' }}" />
                            &nbsp;<input type="submit" name="searchStatusPRA" id="last" value="&nbsp;>&nbsp;Ι&nbsp;" title="Click here to show last page records" @if($praStatuses->currentPage() == $praStatuses->lastPage()) disabled="" @endif>
                        </form>
                    </td>
            </tr>
            @else
            <tr>
                <td colspan="8" height="20px">&nbsp;</td>
            </tr>
            @endif

<tr>
    <td colspan="8" height="20px">&nbsp;</td>
</tr>
        </tbody></table>
    

</div>
          </div>
      </div>
  </div>




</body></html>

