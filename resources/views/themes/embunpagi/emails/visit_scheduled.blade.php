<!-- Change values in the template and pass { {variables} } with API call -->
<!-- Feel free to adjust it to your needs and delete all these comments-->
<!-- Also adapt TXT version of this email -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
  <!--[if !mso]><!-- -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    #outlook a {
      padding: 0;
    }

    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    .ExternalClass * {
      line-height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

  </style>
  <!--[if !mso]><!-->
  <style type="text/css">
    @media only screen and (max-width:480px) {
      @-ms-viewport {
        width: 320px;
      }
      @viewport {
        width: 320px;
      }
    }
  </style>
  <!--<![endif]-->
  <!--[if mso]><xml>  <o:OfficeDocumentSettings>    <o:AllowPNG/>    <o:PixelsPerInch>96</o:PixelsPerInch>  </o:OfficeDocumentSettings></xml><![endif]-->
  <!--[if lte mso 11]><style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style><![endif]-->
  <!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" type="text/css">
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');
  </style>
  <!--<![endif]-->
  <style type="text/css">
    @media only screen and (max-width:595px) {
      .container {
        width: 100% !important;
      }
      .button {
        display: block !important;
        width: auto !important;
      }
    }
  </style>
</head>

<body style="font-family: 'Inter', sans-serif; background: #D9E2E5;">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody>
      <tr>
        <td valign="top" align="center">
          <table class="container" width="600" cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td style="padding: 10px 0; text-align: center; font-size: 42px; color: #ffffff;">&nbsp;</td>
              </tr>
              <tr>
                <td class="main-content" style="padding: 48px 30px 40px; color: #2b2b2b;" bgcolor="#ffffff">
                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                      <tr>
                        <td style="padding: 0 0 24px 0; text-align: center">
                          <img src="{{ asset('img/Logo-EPIS-Horizontal.png') }}" height="75" alt="Embun Pagi School" border="0">
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 24px 0; font-size: 18px; line-height: 150%; font-weight: bold; color: #2b2b2b; letter-spacing: 0.01em;">
                          Halo Admin,
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 10px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          Ada permintaan School Tour dari visitor website.
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 16px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td style="padding: 5px">Child's Name:</td>
                                <td style="padding: 5px">{{ $visit->child_name }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Parent's Name:</td>
                                <td style="padding: 5px">{{ $visit->parent_name }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Phone:</td>
                                <td style="padding: 5px">{{ $visit->phone }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Email:</td>
                                <td style="padding: 5px">{{ $visit->email }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Name of School:</td>
                                <td style="padding: 5px">{{ $visit->school_from }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Program:</td>
                                <td style="padding: 5px">{{ $visit->program }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Visit Date:</td>
                                <td style="padding: 5px">{{ $visit->visit_date }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Visit Time:</td>
                                <td style="padding: 5px">{{ $visit->visit_time }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="padding: 48px 0 30px 0; font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                  <strong>Embun Pagi School</strong><br>
                  <span>
                    Jl. Raya Kapin No 8<br/>
                    Kalimalang, Jakarta Timur 13450<br/>
                  </span><br>
                  <span>Phone. +6221-8651578</span><br>
                  <span>Phone. +62-811-8881-0170</span><br>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
