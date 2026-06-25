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
                          Ada pelamar pada bagian {{ $applyJob['title_job'] }}
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 16px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td style="padding: 5px">First Name:</td>
                                <td style="padding: 5px">{{ $applyJob['first_name'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Last Name:</td>
                                <td style="padding: 5px">{{ $applyJob['last_name'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Phone:</td>
                                <td style="padding: 5px">{{ $applyJob['phone'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Email:</td>
                                <td style="padding: 5px">{{ $applyJob['email'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Address:</td>
                                <td style="padding: 5px">{{ $applyJob['address'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">English Proficiency:</td>
                                <td style="padding: 5px">{{ $applyJob['english_proficiency'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Latest Salary:</td>
                                <td style="padding: 5px">{{ $applyJob['latest_salary'] }}</td>
                              </tr>
                              <tr>
                                <td style="padding: 5px">Salary Expectation:</td>
                                <td style="padding: 5px">{{ $applyJob['salary_expectation'] }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 10px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <strong>Job Experience (Latest 3)</strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 16px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <thead>
                              <th style="text-align: left; padding: 5px;">Company/School Name</th>
                              <th style="text-align: left; padding: 5px;">Position</th>
                              <th style="text-align: left; padding: 5px;">Start Date</th>
                              <th style="text-align: left; padding: 5px;">End Date</th>
                            </thead>
                            <tbody>
                              @foreach($applyJob['job'] as $itemJob)
                              <tr>
                                <td style="padding: 5px">{{ $itemJob['company'] }}</td>
                                <td style="padding: 5px">{{ $itemJob['position'] }}</td>
                                <td style="padding: 5px">{{ $itemJob['start_date'] }}</td>
                                <td style="padding: 5px">{{ $itemJob['end_date'] }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 10px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <strong>Latest Education</strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0 0 16px 0; font-size: 14px; line-height: 150%; font-weight: 400; color: #2b2b2b; letter-spacing: 0.01em;">
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <thead>
                              <th style="text-align: left; padding: 5px;">Level</th>
                              <th style="text-align: left; padding: 5px;">Institution</th>
                              <th style="text-align: left; padding: 5px;">Major</th>
                            </thead>
                            <tbody>
                              @foreach($applyJob['education'] as $itemEdu)
                              <tr>
                                <td style="padding: 5px">{{ $itemEdu['level'] }}</td>
                                <td style="padding: 5px">{{ $itemEdu['institution'] }}</td>
                                <td style="padding: 5px">{{ $itemEdu['major'] }}</td>
                              </tr>
                              @endforeach
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
