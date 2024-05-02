<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>Print</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i&display=swap&subset=arabic,latin-ext" rel="stylesheet">

    <style>
        th, td {
            padding: 5px;
        }
        span {
            content: "\2714";
            background-color: #0a0c0d;
        }
        body {
            font-family: 'Amiri', sans-serif;
            font-size: 14px;

        }
        h3 {
            font-family: 'Amiri', sans-serif;
        }
        @page {
            header: page-header;
            footer: page-footer;
        }


    </style>
    @yield('css')
</head>


<?php $i=0;?>

@foreach($Students as $student)
    @if($student!=null)
    <body>
    <h4 class="text-center" style=" font-weight: bold;  font-family: 'DejaVuSans';"> <strong>الجمهورية الجزائرية الديمقراطية الشعبية </strong></h4>
    <h4 class="text-center" style=" font-weight: bold">  <strong>PEOPLE’S DEMOCRATIC REPUBLIC OF ALGERIA </strong></h4>

    <table width=100% style="border-bottom:2px solid #000; margin-bottom:1cm">
        <tr >
            <td  width=45% style="font-size: 13px">
                <p>MINISTRY OF HIGHER EDUCATION AND </p>
                <p class="text-center" style="padding-right: 150px"> &#160; &#160; &#160; &#160; &#160; &#160; &#160;SCIENTIFIC RESEARCH </p>
                <p style=" font-weight: bold" >{{$student?->ll_etablissement_arabe}}</p>


            </td>
            <td class="text-center" >
                <img src="https://num.univ-msila.dz/Quittance/public/images/R.png" alt="Msila University" width="100px">
            </td>
            <td dir="rtl" width=30% style="font-size: 16px">
                <p>وزارة التعليم العالي والبحث العلمي</p>
                <p style=" font-weight: bold">{{$student?->ll_etablissement_arabe}} - </p>


            </td>
        </tr>
    </table>


    <table width=100%>
        <tr >
            <td width=45% style="text-align: center;font-size: 20px">
                <strong>:  بتاريخ   </strong>
            </td>
            <td dir="rtl" width=55% style="font-size: 20px">
                <strong> الرقم:  </strong>
            </td>
        </tr>
    </table>

    <table width=100%>
        <tr >
            <td style="font-size: 30px;text-align: center" >
                <p>

                    التبرئة الإلكترونیة لنهاية الدراسة
                <p>
            </td>


        </tr >
    </table>


    <br>
    <table width=100%>
        <tr >
            <td style="font-size: 15px" dir="rtl">
                <p>
                    تشهد المصالح الادارية و البيداغوجية التالية أن الطالب (ة) :
                <p>
            </td>
        </tr >
    </table>
    <table width=100%>

        <tr >
            <td width="50%" style="font-size: 15px" dir="rtl">

                <p>
                    الاسم :{{$student->prenom_arabe}}
                <p>
            </td>
            <td width="50%" style="font-size: 15px" dir="rtl">

                <p>
                    اللقب :  {{$student->nom_arabe}}
                <p>
            </td>

        </tr >
    </table>
    <table width=100%>

        <tr >
            <td width="30%" style="font-size: 15px" dir="rtl">


            </td>
            <td width="30%" style="font-size: 15px" dir="rtl">
                <p>
                    ب :  {{$student->lieu_naissance}}
                <p>
            </td>
            <td width="40%" style="font-size: 15px" dir="rtl">

                <p>
                    تاريخ و مكان الميلاد  :  {{$student->date_naissance}}
                <p>
            </td>
        </tr >
    </table>

    <table width=100%>

        <tr >
            <td width="40%" style="font-size: 15px" dir="rtl">

                <p>
                    القسم :  {{$student->ll_departement}}
                <p>
            </td>
            <td width="60%" style="font-size: 15px" dir="rtl">

                <p>
                    الكلية :  {{$student->ll_faculte}}
                <p>
            </td>

        </tr >
    </table>

    <table width=100%>

        <tr >

            <td width="50%" style="font-size: 15px" dir="rtl">

                <p>
                    رقم بطاقة تسجيل الطالب :  {{$student->numero_matricule_etudiant}}
                <p>
            </td>
            <td width="50%" style="font-size: 15px" dir="rtl">

                <p>
                    السنة :   2022/2023
                <p>
            </td>


        </tr >
    </table>

    <table width=100%>
        <tr >
            <td style="font-size: 15px;text-align: center" dir="rtl" >
                <p>

                    قد قام بتسوية كل الالتزامات تجاه المصالح المعنية و سلمت هذه لاستعمالها في حدود ما يسمح به القانون
                <p>
            </td>
        </tr >
    </table>
    <table width=100%>
        <tr >
            <td  width="33%" style="font-size: 15px;text-align: center" dir="rtl" >
                <p>
                    <br>
                    سحب الملف
                <p>
            </td>

            <td  width="33%" style="font-size: 15px;text-align: center" dir="rtl" >
                <p>
                    <br>
                    تحويل
                <p>
            </td>
            <td  width="33%" style="font-size: 15px;text-align: center" dir="rtl" >

                <label>
                    <br>سحب الشهادة
                    <span>&#10004;</span>


                </label>
            </td>

        </tr >
    </table>


    <table dir="rtl" style="border: 1px solid;width: 100%;border-collapse: collapse;">
        <tr   style="border: 1px solid;width: 100%;border-collapse: collapse;">
            <th width="33%" height="30px"  style="text-align:center">	الكلية / القسم</th>
            <th width="33%" style="text-align:center">مكتبة الكلية / المعهد</th>

            <th width="33%" style="text-align:center">المكتبة المركزية</th>


        </tr>
        <tr style="text-align:center" height="130px" style="border: 1px solid;width: 100%;border-collapse: collapse;">
            @if($student->sit_dep )
                <td style="text-align:center">تمت الموافقة من طرف : {{$student?->sit_dep_updated_by?->name}}    </td>
            @else
                <td height="100px" style="text-align:center"> الطالب لم يكمل عملية التبرئة </td>
            @endif

                @if($student->sit_bf )
                    <td style="text-align:center">تمت الموافقة من طرف : {{$student?->sit_bf_updated_by?->name}}    </td>
                @else
                    <td height="100px" style="text-align:center"> الطالب لم يكمل عملية التبرئة </td>
                @endif
                @if($student->sit_bc )
                    <td style="text-align:center">تمت الموافقة من طرف : {{$student?->sit_bc_updated_by?->name}}   </td>
                @else
                    <td height="100px" style="text-align:center"> الطالب لم يكمل عملية التبرئة </td>
                @endif

        </tr>

    </table>
    <table dir="rtl" style="border: 1px solid;width: 100%;border-collapse: collapse;">
        <tr   style="border: 1px solid;width: 130%;border-collapse: collapse;">
            <th width="50%" style="text-align:center" height="30px">مصلحة المنح</th>
            <th width="50%"  style="text-align:center">مصلحة الايواء</th>
        </tr>
        <tr style="text-align:center" height="100px" style="border: 1px solid;width: 100%;border-collapse: collapse;">
                @if($student->sit_brs)
                        <td height="100px" style="text-align:center">تمت الموافقة من طرف : {{$student?->sit_brs_updated_by?->name}}   </td>
                @else
                    <td height="100px" style="text-align:center"> الطالب لم يكمل عملية التبرئة </td>
                @endif



                @if($student->sit_ru )

                        <td height="100px" style="text-align:center">تمت الموافقة من طرف : {{$student?->sit_ru_updated_by?->name}}   </td>

                        @else
                            <td height="100px" style="text-align:center"> الطالب لم يكمل عملية التبرئة </td>
                        @endif

</tr>

</table>
<table width=100%>
<tr >

<td  width="30%" style="font-size: 20px;text-align: center" dir="rtl" >
    <p>
        <br>
        مدير الدراسات :
    <p>
</td>

<td  width="70%" style="font-size: 20px;text-align: right" dir="rtl" >
    <p>
        <br>
        لا تسلم الا نسخة واحدة خلال الموسم الجامعي.
    <p>
</td>


</tr >

</table>

<table>
<tr dir="rtl" style="text-align: right">


</tr>
</table>

<pagebreak></pagebreak>

<body>
<?php $i++;?>
@endif
@endforeach
