<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>Notify</title>
<style type="text/css">
    div, p, a, li, td { -webkit-text-size-adjust:none; }
    .ReadMsgBody{width: 100%; background-color: #f3f3f3;}
    .ExternalClass{width: 100%; background-color: #f3f3f3;}
    body{width: 100%; height: 100%; background-color: #f3f3f3; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
    html{width: 100%;}

    @font-face {font-family: 'proxima_nova_softmedium';src: url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_medium-webfont.eot');src: url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_medium-webfont.eot?#iefix') format('embedded-opentype'),url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_medium-webfont.woff') format('woff'),url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_medium-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;
    }

    @font-face {font-family: 'proxima_nova_softregular';src: url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_regular-webfont.eot'); src: url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_regular-webfont.eot?#iefix') format('embedded-opentype'),url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_regular-webfont.woff') format('woff'),url('http://www.rocketway.net/themebuilder/demo_template/folio/font/mark_simonson_-_proxima_nova_soft_regular-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;
    }

    .hover:hover {opacity:0.90;filter:alpha(opacity=90);}

</style>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td>

            <table width="960" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 50px; margin-bottom: 100px;">
                <tr>
                    <td width="960">

                        <table width="960" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr>
                                <td width="960" bgcolor="#ffffff" style="border: 1px solid #e7eeee; border-radius: 5px;">
                                    <table width="960" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 40px;">
                                        <tr>
                                            <td width="960" style="padding-bottom: 40px; border-bottom: 1px solid #e7eeee;">
                                                <center><img src="{{url('public/img/logopemprovjatim.png')}}" alt="RocketWay" border="0"></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="960" style="font-size: 39px; color: #65707a; text-align: center; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; line-height: 48px; padding-top: 40px;">
                                                Selamat {{$data['name']}} anda berhasil melakukan pendaftaran
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="960" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 60px; margin-bottom: 60px;">
                                        <tr>
                                            <td width="40"></td>
                                            <td width="370" style="text-align: center;" valign="top">
                                                <p style="font-size: 16px; color: #686868; text-align: center; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; line-height: 24px;">Untuk mengaktifkan akun anda, klik link di bawah ini</p><p style="margin-bottom: 28px;"></p><p style="margin-bottom: 5px;"></p><br/><br/><a href="{{route('userConfirmation',['email'=>$data['email'],'token'=>$data['token']])}}" target="_blank" style="background-color: #65707a; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; text-decoration: none; color: #ffffff; padding: 10px 20px 10px 20px; border-radius: 4px; font-size: 18px;" class="hover">Konfirmasi</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

