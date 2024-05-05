<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black; font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Giao tiếp</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Trang cộng đồng</a></li>
        </ol>
    </nav>
    <div class="ms-5 border border-solid rounded mb-4" style="width: 90%;border-width: 1px; border-radius: 5px;">
        <div class="container mt-3 mb-3">
            <div class="d-flex align-items-center">
                <img class="ms-4 avatar avatar-48 bg-light rounded-circle text-white p-1"
                    src="../../public/images/logo.png">
                <div class="ms-3" style="width: 90%; background-color:#e8e8e8;border-radius: 5px;">
                    <p class="m-1 ms-3" onclick="openPopup()">Hãy chia sẻ bài đăng của bạn</p>
                </div>
            </div>
        </div>
    </div>
    <div id="editModal" class="popup">
        <div class="popup-content"
            style="display: flex; flex-direction: column; align-items: flex-start; min-width: 60vh;  max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h5>Chỉnh sửa bài viết</h5>
            <form id="editBlogForm" style="width: 100%;">
                <input type="hidden" id="editBlogID">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="editTitleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="editContentInput"></textarea>
                <input type="file" accept="image/*" style="margin-bottom: 10px;" id="editFileInput" name="editFileInput"
                    onchange="previewEditImage(event)" multiple>
                <div id="editPreviewImage" class="mt-3 mb-3"></div>
                <div id="editfileNames"></div>
                <button type="button" onclick="submitEditForm()" style="background-color:#ffd700;"
                    class="btn btn-primary text-dark">Lưu</button>
            </form>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content"
            style="display: flex; flex-direction: column; align-items: flex-start; min-width: 60vh;  max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="closePopup()">&times;</span>
            <h5>Hãy chia sẻ suy nghĩ của bạn</h5>
            <form id="blogForm" enctype="multipart/form-data" style="width: 100%;">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="titleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="contentInput"></textarea>
                <input type="file" accept="image/*" style="margin-bottom: 10px;" id="fileInput" name="fileInput"
                    onchange="previewImage(event)" multiple>
                <div id="fileNames"></div>
                <button type="button" onclick="submitForm()" style="background-color:#ffd700;"
                    class="btn btn-primary text-dark">Đăng
                    bài</button>
            </form>
        </div>
    </div>
    <?php
    include_once ("../../controller/seller/getAccountdetail.php");
    $account = fetchAccountdetail(1);
    include_once ("../../controller/seller/fetchListBlog.php");
    $blogList = fetchListBlog();
    foreach ($blogList as $blog) {
        ?>
        <div class="ms-5 border border-solid rounded mb-5" style="width: 90%;border-width: 1px; border-radius: 5px;">
            <div style="display: flex; justify-content: center">
                <div style="width: 96%; padding-left: 20px; padding-right: 20px;">
                    <div style="display: flex; align-items: center;justify-content: space-between;">
                        <div style="display: flex; align-items: center;">
                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                src="../../public/images/logo.png">
                            <div style="padding-left: 12px">
                                <div>
                                    <strong><?php echo $account['nameStore']; ?></strong>
                                </div>
                                <!-- <div class="note-style">43 phút trước</div> -->
                            </div>

                        </div>

                        <div class="d-flex">
                            <a class="ms-4" href="#"
                                onclick="openEditModal(<?php echo $blog['id']; ?>, '<?php echo $blog['header']; ?>', '<?php echo $blog['content']; ?>','(<?php echo $blog['image']; ?>')"
                                style="text-decoration: none;">Chỉnh sửa</a>
                            <a class="ms-4" href="#" onclick="confirmDelete(<?php echo $blog['id']; ?>)"
                                style="text-decoration: none; color: red;">Xóa bài</a>

                        </div>

                    </div>
                    <div>
                        Tiêu đề: <?php echo $blog['header']; ?>
                    </div>
                </div>
            </div>
            <div class="container container-border-page">
                <div>
                    <?php
                    $blog_content = $blog['content'];
                    $cleaned_content = str_replace(array("\\r", "\\n", "\\r\\n"), '', $blog_content);
                    echo "<div>$cleaned_content</div>"; ?>
                    <img src="<?php echo $blog['image']; ?>" alt="" class="mt-3"
                        style="max-height: 400px; max-width: 70%;" />
                </div>
                <?php
                include_once ("../../controller/seller/fetchCommentList.php");
                $blogID = $blog["id"];
                $commentList = fetchCommentList($blogID);
                $commentCount = count($commentList);
                ?>
                <div style="
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                ">
                    <?php if ($commentCount > 0): ?>
                        <div><?php echo $commentCount; ?> bình luận</div>
                    <?php else: ?>
                        <div></div>
                    <?php endif; ?>
                </div>
                <hr />
                <div style="display: flex; justify-content: space-between">
                    <div class="like-style">
                        <span class="iconify" data-icon="mdi-light:comment"
                            style="color: #ffd700; height: 24px; width: 24px"></span>
                        <div>Bình luận</div>
                    </div>
                    <div class="like-style">
                        <span class="iconify" data-icon="majesticons:share-line"
                            style="color: #ffd700; height: 24px; width: 24px"></span>
                        <div>Chia sẻ</div>
                    </div>
                </div>
                <hr />
                <div>
                    <a class="link-underline-light linkStyleColor" href="#">Xem thêm bình luận</a>
                </div>
                <?php
                foreach ($commentList as $comment) {
                    ?>
                    <div style="margin-top: 5px">
                        <div style="display: flex">
                            <img src="/BTL/public/images/Avatar-Profile-PNG-Photos 1.png" alt="" />
                            <div class="comment-style">
                                <div>
                                    <strong>Anh</strong>
                                </div>
                                <div><?php echo $comment['content']; ?></div>
                            </div>
                        </div>
                        <div class="note-style" style="margin-left: 60px">
                            <a class="linkStyleColor" href="#" style="margin-left: 10px">Phản hồi</a>
                        </div>
                    </div>
                <?php } ?>
                <div style="
                margin-top: 5px;
                display: flex;
                margin-bottom: 20px;
                align-items: center;
                ">
                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="../../public/images/logo.png">
                    <input type="text" placeholder="Viết bình luận" class="comment-note-style" />
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    function previewImage() {
                    const input = event.target;
                    const preview = document.getElementById("fileNames");

                    if (input.files && input.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.classList.add("img-fluid");
                            preview.innerHTML = "";
                            preview.appendChild(img);
                        };

                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.innerHTML = "";
                    }
                }
    function previewEditImage(event) {
        const input = event.target;
        const preview = document.getElementById("editfileNames");
        const editPreviewImage = document.getElementById("editPreviewImage");
        console.log("ahihi: ", editPreviewImage)
        editPreviewImage.innerHTML = "";
        console.log("ahihi: ", editPreviewImage)
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-fluid");
                preview.innerHTML = "";
                preview.appendChild(img);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = "";
        }
    }

    function openEditModal(blogID, title, content, imageUrl) {
        var editModal = document.getElementById('editModal');
        var editBlogIDInput = document.getElementById('editBlogID');
        var editTitleInput = document.getElementById('editTitleInput');
        var editContentInput = document.getElementById('editContentInput');
        var editPreviewImage = document.getElementById('editPreviewImage');

        editBlogIDInput.value = blogID;
        editTitleInput.value = title;
        editContentInput.textContent = content
            .replace(/<p>/g, '\n')
            .replace(/<br\s*\/?>/g, '\n')
            .replace(/<\/p>/g, '\n')
            .replace(/^\s+|\s+$/g, '')
            .replace(/[\r\n]+/g, '\n');

        if (imageUrl) {
            var absoluteImageUrl = window.location.origin + "/BTL/" + imageUrl;
            editPreviewImage.innerHTML = '<img src="' + absoluteImageUrl + '" class="img-fluid" style="max-width: 100%; max-height: 200px;" />';
        } else {
            console.log("khong")
            editPreviewImage.innerHTML = '';
        }

        editModal.style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById("editfileNames").innerHTML = "";

        // Clear the content of the editPreviewImage div
        document.getElementById("editPreviewImage").innerHTML = "";

        // Hide the edit modal
        document.getElementById("editModal").style.display = "none";
    }

    function submitEditForm() {
        var blogID = document.getElementById('editBlogID').value;
        var title = document.getElementById('editTitleInput').value.trim();
        var content = document.getElementById('editContentInput').value.trim();
        content = content.replace(/\n/g, '<br/>');
        console.log(content)
        fetch('../../controller/seller/editBlog.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ blogID: blogID, title: title, content: content })
        })
            .then(response => {
                if (response.ok) {
                    closeEditModal();
                    console.log('Blog post updated successfully');
                    window.location.reload()
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function submitForm() {
        if (!validateForm()) {
            return;
        } else {
            console.log("Submit")
            var title = document.getElementById('titleInput').value.trim();
            var content = document.getElementById('contentInput').value.trim();

            // Read and encode files to base64
            var files = document.getElementById('fileInput').files;
            var images = [];
            var reader;
            var counter = 0;

            for (var i = 0; i < files.length; i++) {
                reader = new FileReader();
                reader.onload = function (event) {
                    images.push(event.target.result);
                    counter++;
                    if (counter === files.length) {
                        // All files processed, send JSON data
                        var requestBody = {
                            title: title,
                            content: content,
                            images: images
                        };

                        fetch('../../controller/seller/addBlog.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestBody)
                        })
                            .then(response => {
                                if (response.ok) {
                                    return response.text();
                                } else {
                                    throw new Error('Network response was not ok');
                                }
                            })
                            .then(data => {
                                if (data === 'success') {
                                    window.location.href = "?page=community";
                                    console.log("success");
                                } else {
                                    console.error('Error:', data);
                                }
                            })
                            .catch(error => {
                                // Catch any fetch errors
                                console.error('Error:', error);
                            });

                        closePopup();
                    }
                };
                reader.readAsDataURL(files[i]);
            }
        }
    }


    function validateForm() {
        var title = document.getElementById('titleInput').value.trim();
        var content = document.getElementById('contentInput').value.trim();
        var image = document.getElementById('fileInput').value.trim();

        if (title === '' || content === '') {
            alert('Vui lòng nhập Tiêu đề và Nội dung bài đăng');
            return false; // Prevent form submission
        }

        return true;
    }
    function confirmDelete(blogID) {
        if (confirm("Are you sure you want to delete?")) {
            // If the user confirms deletion, make the DELETE request
            fetch('../../controller/seller/deleteBlog.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ blogID: blogID })
            })
                .then(response => {
                    if (response.ok) {
                        console.log("Blog post deleted successfully");
                        window.location.reload(); // For example, reload the page
                    } else {
                        console.error('Error:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            // Cancel deletion
            console.log("Delete action canceled");
        }
    }
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        // Clear input fields
        document.getElementById("titleInput").value = "";
        document.getElementById("contentInput").value = "";
        document.getElementById("fileInput").value = "";
        document.getElementById("fileNames").innerHTML = "";

        // Hide the popup
        document.getElementById("popup").style.display = "none";
    }

    document.getElementById('fileInput').addEventListener('change', function () {
        var fileNamesDiv = document.getElementById('fileNames');
        fileNamesDiv.innerHTML = ''; // Clear previous content

        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var fileName = document.createElement('p');
            fileName.textContent = 'File ' + (i + 1) + ': ' + files[i].name;
            fileNamesDiv.appendChild(fileName);
        }
    });

</script>