<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>مرحبا بك في لوحة التحكم!</h1>
    <div id="userInfo"></div> <!-- مكان لعرض معلومات المستخدم -->
    <div id="dataContainer"></div> <!-- مكان لعرض البيانات المحمية -->
    <div id="message" style="color:red;"></div>

    <script>
        $(document).ready(function() {
            const token = localStorage.getItem('jwt_token');
            const userInfo = JSON.parse(localStorage.getItem('user_info')); // استرجاع معلومات المستخدم

            if (!token) {
                window.location.href = '/'; // إعادة التوجيه إذا لم يكن هناك توكين
            }

            // عرض معلومات المستخدم
            if (userInfo) {
                $('#userInfo').html('<h2>معلومات المستخدم:</h2><pre>' + JSON.stringify(userInfo, null, 2) + '</pre>');
            } else {
                $('#userInfo').html('<p>لم يتم العثور على معلومات المستخدم.</p>');
            }

            $.ajax({
                url: '/api/dashboard', // مسار API للوحة التحكم
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token // إضافة التوكين إلى رأس الطلب
                },
                success: function(data) {
                    $('#dataContainer').html('<pre>' + JSON.stringify(data, null, 2) + '</pre>');
                },
                error: function(xhr) {
                    $('#message').text('خطأ في تحميل البيانات: ' + xhr.responseJSON.message);
                }
            });
        });
    </script>
</body>
</html>
