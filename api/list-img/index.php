<?php
header('Content-Type: application/json');

// Đường dẫn tới thư mục chứa ảnh
$dir = 'image/';

// Các định dạng ảnh cho phép
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

// Kiểm tra xem thư mục có tồn tại không
if (!is_dir($dir)) {
    echo json_encode(array('error' => 'Thư mục không tồn tại.'));
    exit;
}

// Lấy danh sách file trong thư mục
$files = scandir($dir);
$images = array();

// Lọc các file có định dạng ảnh
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($extension, $allowed_extensions)) {
        $images[] = $file;
    }
}

// Trả về danh sách ảnh dưới dạng JSON
echo json_encode($images);
?>
<?php
header('Content-Type: application/json');

// Đường dẫn tới thư mục chứa ảnh
$dir = './image/';

// Các định dạng ảnh cho phép
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

// Kiểm tra xem thư mục có tồn tại không
if (!is_dir($dir)) {
    echo json_encode(array('error' => 'Thư mục không tồn tại.'));
    exit;
}

// Lấy danh sách file trong thư mục
$files = scandir($dir);
$images = array();

// Lọc các file có định dạng ảnh
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($extension, $allowed_extensions)) {
        $images[] = $file;
    }
}

// Trả về danh sách ảnh dưới dạng JSON
echo json_encode($images);
?>
