<html dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body dir="rtl" style="background-color: #eee;">
    <table
        style="max-width: 700px;width: 100%;margin: 100px auto 0;background-color: #fff;border-radius: 10px;overflow: hidden;padding: 10px;box-shadow: 1px 0 7px #ddd;">
        <tr>
            <td>
                <div style="padding: 10px 0;text-align: center;">
                    <img src="{{ env('SOB_LOGO') }}" alt="Logo" height="200">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <h1 style="text-align: center;margin: 0px 0 5px;padding: 5px 0;color: #194481;">
                    بيان اعتراض من القائمة أ بعد رفض طلب ترشحها
                </h1>
                <h3 style="text-align: center;">
                    الزميل/ة <b>{{ $member->name }} {{ $member->surname }}</b>
                </h3>
                <h4>
                    نرفق لكم نص البيان الصادر عن القائمة أ والمتعلق برفض قرار اللجنة الانتخابية النهائي بعدم قبول
                    قائمتهم تبعاً للبند
                    <b>د</b>
                    من المادة رقم
                    <b>2</b>
                    من الملحق الانتخابي
                </h4>
                <p>بيان الى الهيئة العامة</p>
                <p>نحن المترشحون إلى الانتخابات للاتحاد</p>
                <p>الرئيس : تميم السيد عيسى</p>
                <p>عضو الإدارة : جهاد الدين كشكة</p>
                <p>عضو الإدارة : بيان العسس</p>
                <p>عضو الإدارة : شهد القصّاب</p>
                <p>عضو الإدارة : خلاد السوادي</p>
                <p>نحيطكم علماً بأننا قد تقدمنا بطلب ترشح إلى الانتخابات لاتحاد طلبة سوريا - سكاريا ثم تم رفض طلبنا حسب
                    البند رقم ٢ الذي ينص على: </p>
                <p>" لم تتخذ بحق أي من أفرادها إجراءات إجزائية فوق الدرجة الثانية خلا آخر ثلاث سنوات " </p>
                <p>وبما أن البند المذكور ضمن بنود اتحاد طلبة سوريا - سكاريا فمن الطبيعي أن البند لا يشمل الأخ المترشح
                    (خلاد السوادي) الحاصل على شرط جزائي من اتحاد طلبة سوريا العام</p>
                <p>إلا أن اللجنة الانتخابية أصرت على أن البند يشمله.</p>
                <p>وبعد ذلك أبدينا تعاونا مع اللجنة الانتخابية وأخبرناهم بإمكانية استبدال العضو خلاد السوادي بآخَر، إلا
                    أنهم لم يبدوا أيَّ تعاوناً ولم يعطونا أي مجال لتعديل الأمر وقاموا برفض ترشحنا من جديد.</p>
                <p>ندين بقرار اللجنة الانتخابية الذي حرمنا حق الترشح للانتخابات من غير أي حق ونطلب منكم ان تؤازرونا في
                    هذا الطلب كي نستطيع الوصول إلى حقنا في الترشح ودمتم بخير.</p>
                <p
                    style="color: #fff;display: block;background-color:#194481;text-align: center;padding: 10px;font-size: 20px;font-weight: bold;border-radius: 10px;text-decoration: none;letter-spacing: 4px;">
                    {{ $verifyingCode }}
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
