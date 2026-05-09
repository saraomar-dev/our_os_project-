<?php
session_start();
include 'data/validator.php';

// استيراد الخوارزميات مرة واحدة فقط في البداية
require_once 'algorithms/sjfnonpreemptive.php';
require_once 'algorithms/sjfpreemptive.php';
require_once 'algorithms/priority.php';
require_once 'algorithms/prioritypre.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pid'])) {

    // 1. تصفير السيشن القديم تماماً لبدء عملية جديدة نظيفة
    unset($_SESSION['sjf']);
    unset($_SESSION['sjfpre']);
    unset($_SESSION['priority']);
    unset($_SESSION['Prioritypre']);

    $processes = [];

    // 2. تجميع العمليات من الـ Form
    for ($i = 0; $i < count($_POST['pid']); $i++) {
        $processes[] = [
            "id" => $_POST['pid'][$i],
            "arrival" => (int)$_POST['arrival'][$i],
            "burst" => (int)$_POST['burst'][$i],
            "priority" => (int)$_POST['priority'][$i]
        ];
    }

    // 3. التحقق من البيانات
    $check = validateProcesses($processes);
    if ($check !== true) {
        echo "<div class='alert alert-danger text-center'>$check</div>";
        exit();
    }

    // 4. تشغيل الخوارزميات وتخزين النتائج
    // ملاحظة: وحدت أسماء المفاتيح لتطابق ملفات العرض (كلها حروف صغيرة)
    
    $_SESSION['sjf'] = runSJF($processes);
    
    $_SESSION['priority'] = runPriority($processes); // تم تغيير الحرف لـ p صغيرة
    
    $_SESSION['sjfpre'] = runSJFpre($processes);
    
    $_SESSION['Prioritypre'] = runPriorityPreemptive($processes);

    // 5. التوجيه لصفحة النتائج
    header("Location: result.php");
    exit();

} else {
    // لو حد دخل الصفحة دي من غير ما يبعت Form يرجعه للرئيسية
    header("Location: index.php");
    exit();
}