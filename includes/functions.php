
<?php
function handleFileUpload($file, $destination) {
    $target_dir = "../uploads/" . $destination . "/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}

function updateSection($conn, $section, $title, $content, $file = null) {
    $file_path = '';
    if ($file && $file['size'] > 0) {
        $file_path = handleFileUpload($file, $section);
    }
    
    $stmt = $conn->prepare("INSERT INTO sections (section_name, title, content, file_path, updated_at) 
                           VALUES (?, ?, ?, ?, NOW())
                           ON DUPLICATE KEY UPDATE 
                           title=?, content=?, file_path=COALESCE(?, file_path), updated_at=NOW()");
    
    $stmt->bind_param("sssssss", $section, $title, $content, $file_path, $title, $content, $file_path);
    return $stmt->execute();
}