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
        // Hiển thị các nút CRUD phía trên bảng
        let crudHtml = `
            <div id="crud-buttons" style="margin-bottom:15px;">
                <button onclick="createRecord('${table}')">Thêm</button>
            </div>
        `;
        document.getElementById('data-table').innerHTML = crudHtml;

        // Hiển thị dữ liệu bảng
        fetch(`/dashboard/data/${table}`)
            .then(res => res.text())
            .then(html => {
                document.getElementById('data-table').innerHTML = crudHtml + html;

                // Thêm nút Sửa/Xóa cho từng dòng (nếu muốn động, cần sửa ở backend trả về)
                // Hoặc bạn có thể render luôn nút Sửa/Xóa trong HTML table ở backend
            });
    }

    // Hàm xử lý khi nhấn Thêm
    function createRecord(table) {
        window.location.href = `/crud/${table}/create`;
    }

        // Tải danh sách bảng khi trang vừa load
        window.onload = function() {
            loadAllTables();
            const urlParams = new URLSearchParams(window.location.search);
            const table = urlParams.get('table');
            if (table) {
                showData(table);
            }
        }

        // Xử lý sự kiện click cho các nút Sửa và Xóa
        document.addEventListener('click', function(e) {
        // Xóa
        if (e.target.classList.contains('btn-delete')) {
            if (!confirm('Xóa?')) return;
            const table = e.target.getAttribute('data-table');
            const id = e.target.getAttribute('data-id');
            fetch(`/crud/${table}/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({'_method': 'DELETE'})
            })
            .then(res => {
                if (res.ok) {
                    showData(table); // Tải lại bảng sau khi xóa
                } else {
                    alert('Xóa thất bại!');
                }
            });
        }
        //sửa
        if (e.target.classList.contains('btn-edit')) {
        const table = e.target.getAttribute('data-table');
        const id = e.target.getAttribute('data-id');
        fetch(`/crud/${table}/${id}/edit`)
            .then(res => res.text())
            .then(formHtml => {
                document.getElementById('data-table').innerHTML = formHtml;
                // Gắn lại sự kiện submit cho form sửa
                const editForm = document.querySelector('#dynamic-edit-form');
                if (editForm) {
                    editForm.onsubmit = function(ev) {
                        ev.preventDefault();
                        const formData = new FormData(editForm);
                        fetch(`/crud/${table}/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: new URLSearchParams([...formData, ['_method', 'PUT']])
                        })
                        .then(res => {
                            if (res.ok) {
                                showData(table); // Cập nhật lại bảng sau khi sửa
                            } else {
                                alert('Cập nhật thất bại!');
                            }
                        });
                    }
                }
            });
    }
    });
    </script>
</body>
</html>
