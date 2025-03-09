const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();

// Đường dẫn tới thư mục chứa ảnh (src/image)
const imageFolder = path.join(__dirname, 'src', 'image');

// API trả về danh sách file ảnh dưới dạng JSON
app.get('/api/images', (req, res) => {
  fs.readdir(imageFolder, (err, files) => {
    if (err) {
      console.error('Lỗi đọc thư mục ảnh:', err);
      return res.status(500).json({ error: 'Không thể liệt kê ảnh' });
    }
    // Lọc các file có đuôi jpg, jpeg, png, gif
    const imageFiles = files.filter(file => /\.(jpg|jpeg|png|gif)$/i.test(file));
    res.json(imageFiles);
  });
});

// Cho phép truy cập các file tĩnh trong thư mục src (index.html, ảnh, …)
app.use('/src', express.static(path.join(__dirname, 'src')));

// Chạy server trên cổng 3000
app.listen(3000, () => {
  console.log('Server đang chạy tại http://localhost:3000');
});
