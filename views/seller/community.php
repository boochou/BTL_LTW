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
        <div class="popup-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h5>Edit Blog Post</h5>
            <form id="editBlogForm" style="width: 100%;">
                <input type="hidden" id="editBlogID">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="editTitleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="editContentInput"></textarea>
                <button type="button" onclick="submitEditForm()" style="background-color:#ffd700;"
                    class="btn btn-primary text-dark">Lưu</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup">
        <div class="popup-content" style="display: flex; flex-direction: column; align-items: flex-start;">
            <span class="close" onclick="closePopup()">&times;</span>
            <h5>Hãy chia sẻ suy nghĩ của bạn</h5>
            <form id="blogForm" style="width: 100%;">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="titleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="contentInput"></textarea>
                <input type="file" accept="image/*" style="margin-bottom: 10px;" id="fileInput" multiple>
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
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-v" id="dropdownMenuButton" onclick="toggleMenu(this)"></i>
                            <div class="dropdown-menu" id="dropdownMenu" style="display: none;">
                                <a class="dropdown-item" href="#"
                                    onclick="openEditModal(<?php echo $blog['id']; ?>, '<?php echo $blog['header']; ?>', '<?php echo $blog['content']; ?>')">Modify</a>
                                <a class="dropdown-item" href="#"
                                    onclick="confirmDelete(<?php echo $blog['id']; ?>)">Delete</a>
                            </div>
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
                    echo $cleaned_content; ?>
                    <!-- <div style="display: flex; justify-content: center">
                        <img src="./images/Rectangle 45.png" alt="" style="width: 45%" />
                        <img src="./images/Rectangle 45.png" alt="" style="width: 45%" />
                    </div> -->
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
    // Add event listener to listen for clicks on the document
    document.addEventListener('click', function (event) {
        // Get the dropdown menu
        var menu = document.getElementById('dropdownMenu');

        // Check if the clicked element is inside the dropdown menu
        var isClickInsideMenu = menu.contains(event.target);

        // Get the dropdown menu icon
        var menuIcon = document.getElementById('dropdownMenuButton');

        // Check if the clicked element is the dropdown menu icon
        var isClickOnMenuIcon = menuIcon.contains(event.target);

        // If the click is outside the menu and not on the menu icon, close the menu
        if (!isClickInsideMenu && !isClickOnMenuIcon) {
            menu.style.display = 'none';
        }
    });

    // Function to open the edit modal and populate fields with data
    function openEditModal(blogID, title, content) {
        var editModal = document.getElementById('editModal');
        var editBlogIDInput = document.getElementById('editBlogID');
        var editTitleInput = document.getElementById('editTitleInput');
        var editContentInput = document.getElementById('editContentInput');

        // Populate fields with data
        editBlogIDInput.value = blogID;
        editTitleInput.value = title;
        editContentInput.textContent = content
            .replace(/<p>/g, '\n')
            .replace(/<br\s*\/?>/g, '\n')
            .replace(/<\/p>/g, '\n')
            .replace(/^\s+|\s+$/g, '')
            .replace(/[\r\n]+/g, '\n');

        // Display the modal
        editModal.style.display = 'block';
    }


    // Function to close the edit modal
    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Function to submit the edit form
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
            var requestBody = {
                title: title,
                content: content
            };
            console.log(JSON.stringify(requestBody));
            fetch('../../controller/seller/addBlog.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ title: title, content: content })
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
    }

    function validateForm() {
        var title = document.getElementById('titleInput').value.trim();
        var content = document.getElementById('contentInput').value.trim();

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

    function toggleMenu(icon) {
        // Get the dropdown menu
        var menu = icon.nextElementSibling;

        // Toggle the display property
        if (menu.style.display === "none") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    }
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
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