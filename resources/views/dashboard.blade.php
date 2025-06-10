<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }
        .box {
            border: 1px solid #333;
            padding: 30px 50px;
            border-radius: 10px;
            cursor: pointer;
            background: #f5f5f5;
            font-size: 20px;
            text-align: center;
            transition: background 0.2s;
        }
        .box:hover {
            background: #e0e0e0;
        }
        .data-table {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <h1>Chào mừng bạn đã đăng nhập thành công!</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>

    <div id="all-tables" class="box-container"></div>
    <div id="data-table" class="data-table"></div>

    <script>
        // Lấy danh sách tất cả các bảng trong database và hiển thị thành các box
        function loadAllTables() {
            fetch('/dashboard/tables')
                .then(res => res.json())
                .then(tables => {
                    let html = '';
                    tables.forEach(table => {
                        html += `<div class="box" onclick="showData('${table}')">${table}</div>`;
                    });
                    document.getElementById('all-tables').innerHTML = html;
                });
        }

        // Khi bấm vào box, hiển thị dữ liệu bảng đó
        function showData(table) {
            fetch(`/dashboard/data/${table}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('data-table').innerHTML = html;
                });
        }

        // Tải danh sách bảng khi trang vừa load
        window.onload = function() {
            loadAllTables();
        }
    </script>
</body>
</html>
