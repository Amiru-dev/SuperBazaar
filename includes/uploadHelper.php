<?php

/**
 * Validates an uploaded image (upload status, max size, MIME type, getimagesize)
 * and moves it into $relativeDir with a generated filename.
 *
 * @return array{ok: bool, path?: string, error?: string}
 */
function saveUploadedImage(string $field, string $relativeDir, int $maxBytes = 5242880): array
{
    if (!isset($_FILES[$field]) || $_FILES[$field]["error"] !== UPLOAD_ERR_OK) {
        return ["ok" => false, "error" => "Please upload a valid image"];
    }

    $tmp = $_FILES[$field]["tmp_name"];
    if ($_FILES[$field]["size"] > $maxBytes) {
        return ["ok" => false, "error" => "Image size must be 5MB or less"];
    }

    $allowed = [
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/webp" => "webp",
    ];

    $mime = null;
    if (function_exists("finfo_open")) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo !== false) {
            $mime = finfo_file($finfo, $tmp);
            finfo_close($finfo);
        }
    }

    $imgInfo = @getimagesize($tmp);
    if ($imgInfo === false) {
        return ["ok" => false, "error" => "Uploaded file is not a valid image"];
    }

    $detectedMime = $mime ?: ($imgInfo["mime"] ?? "");
    if (!isset($allowed[$detectedMime])) {
        return ["ok" => false, "error" => "Only JPG, PNG, and WEBP images are allowed"];
    }

    $ext = $allowed[$detectedMime];
    $relDir = trim($relativeDir, "/\\");
    $relPath = $relDir . "/" . uniqid("", true) . "." . $ext;
    $absPath = __DIR__ . "/../" . $relPath;

    if (!is_dir(dirname($absPath))) {
        mkdir(dirname($absPath), 0755, true);
    }

    if (!move_uploaded_file($tmp, $absPath)) {
        return ["ok" => false, "error" => "Failed to save uploaded image"];
    }

    return ["ok" => true, "path" => $relPath];
}
?>
