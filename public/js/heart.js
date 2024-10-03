const maxLives = 5;
const lifeRechargeTime = 30000; // 30 ثانية
let lives;

// تحميل الصفحة
window.onload = function() {
    // التأكد من دعم المتصفح لـ localStorage
    if (typeof(Storage) !== "undefined") {
        // جلب عدد الأرواح من localStorage أو تعيين القيمة الافتراضية
        lives = localStorage.getItem('lives') ? parseInt(localStorage.getItem('lives')) : maxLives;
    } else {
        // إذا كان localStorage غير مدعوم، تعيين القيمة الافتراضية
        lives = maxLives;
    }

    updateLives(); // تحديث عرض الأرواح في الصفحة

    // إذا كانت الأرواح أقل من الحد الأقصى، ابدأ إعادة الشحن
    if (lives < maxLives) {
        rechargeLives();
    }
}

// تحديث عدد الأرواح في الصفحة وفي localStorage
function updateLives() {
    document.querySelector('.lives').textContent = lives; // عرض عدد الأرواح في الصفحة
    localStorage.setItem('lives', lives); // حفظ الأرواح في localStorage

    // إذا وصلت الأرواح إلى 0، تعطيل جميع الأزرار
    if (lives === 0) {
        disableAllButtons();
    }
}

// تقليل الأرواح عند الضغط على زر مستوى
function loseLife(button) {
    if (lives > 0) {
        lives--; // تقليل عدد الأرواح
        button.disabled = true; // تعطيل الزر الذي تم الضغط عليه
        updateLives(); // تحديث عرض الأرواح

        // إذا كانت الأرواح 0، ابدأ إعادة الشحن
        if (lives === 0) {
            rechargeLives();
        }
    }
}

// تعطيل جميع الأزرار
function disableAllButtons() {
    const buttons = document.querySelectorAll('.level-button');
    buttons.forEach(button => button.disabled = true);
}

// تمكين جميع الأزرار
function enableAllButtons() {
    const buttons = document.querySelectorAll('.level-button');
    buttons.forEach(button => button.disabled = false);
}

// إعادة شحن الأرواح
function rechargeLives() {
    const rechargeInterval = setInterval(() => {
        if (lives < maxLives) {
            lives++; // زيادة عدد الأرواح
            updateLives(); // تحديث عرض الأرواح
        }

        // عند الوصول إلى الحد الأقصى من الأرواح، إيقاف الشحن
        if (lives === maxLives) {
            clearInterval(rechargeInterval);
            enableAllButtons(); // تمكين جميع الأزرار عند امتلاء الأرواح
        }
    }, lifeRechargeTime); // مدة الشحن لكل روح
}
