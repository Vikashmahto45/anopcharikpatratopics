<?php
require_once 'auth.php';
require_login();
require_once '../includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id) {
    header('Location: index.php');
    exit;
}

// Fetch post
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    die("Post not found.");
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);
    $meta_desc = trim($_POST['meta_desc']);
    $meta_title = trim($_POST['meta_title']);
    $keywords = trim($_POST['keywords']);
    
    $slug = trim($_POST['slug']);
    if (empty($slug) && !empty($title)) {
        $slug = generate_slug($title);
    }

    if (empty($title) || empty($content) || empty($category)) {
        $error = "Title, Content, and Category are required.";
    } else {
        try {
            $update_stmt = $pdo->prepare("UPDATE posts SET title = ?, slug = ?, content = ?, meta_title = ?, meta_desc = ?, category = ?, keywords = ? WHERE id = ?");
            $update_stmt->execute([$title, $slug, $content, $meta_title, $meta_desc, $category, $keywords, $id]);
            header('Location: index.php?msg=Post+updated+successfully');
            exit;
        } catch (PDOException $e) {
            $error = "Database Error: " . $e->getMessage() . " (Slug might already exist)";
        }
    }
}

$categories = get_all_categories($pdo);
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Admin</title>
    <!-- Use same styles as add.php -->
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-top: 0; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="text"], select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        textarea { resize: vertical; min-height: 300px; }
        .btn { display: inline-block; padding: 10px 20px; border-radius: 4px; text-decoration: none; color: white; border: none; cursor: pointer; font-size: 16px; }
        .btn-primary { background: #3498db; }
        .btn-primary:hover { background: #2980b9; }
        .btn-secondary { background: #95a5a6; margin-left: 10px; }
        .btn-secondary:hover { background: #7f8c8d; }
        .error { color: #e74c3c; background: #fdfadd; padding: 10px; border-radius: 4px; margin-bottom: 20px; border-left: 4px solid #e74c3c; }
        .help-text { font-size: 12px; color: #777; margin-top: 5px; }
        .row { display: flex; gap: 20px; }
        .col { flex: 1; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Post: <?php echo htmlspecialchars($post['title']); ?></h1>
        
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">Post Title *</label>
                <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($_POST['title'] ?? $post['title']); ?>">
            </div>

            <div class="row">
                <div class="col form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">-- Select Category --</option>
                        <?php 
                        $current_cat = $_POST['category'] ?? $post['category'];
                        foreach ($categories as $cat): 
                        ?>
                            <option value="<?php echo htmlspecialchars($cat['slug']); ?>" <?php echo ($current_cat === $cat['slug']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="slug">URL Slug (Optional)</label>
                    <input type="text" id="slug" name="slug" value="<?php echo htmlspecialchars($_POST['slug'] ?? $post['slug']); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="content">Letter Content (HTML Allowed) *</label>
                <textarea id="content" name="content" required><?php echo htmlspecialchars($_POST['content'] ?? $post['content']); ?></textarea>
            </div>

            <fieldset style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <legend style="color: #666; font-weight: bold; padding: 0 5px;">SEO Settings</legend>
                
                <div class="form-group">
                    <label for="meta_title">SEO Title</label>
                    <input type="text" id="meta_title" name="meta_title" value="<?php echo htmlspecialchars($_POST['meta_title'] ?? $post['meta_title']); ?>">
                </div>

                <div class="form-group">
                    <label for="meta_desc">SEO Description</label>
                    <input type="text" id="meta_desc" name="meta_desc" value="<?php echo htmlspecialchars($_POST['meta_desc'] ?? $post['meta_desc']); ?>">
                </div>

                <div class="form-group">
                    <label for="keywords">Target Keywords</label>
                    <input type="text" id="keywords" name="keywords" value="<?php echo htmlspecialchars($_POST['keywords'] ?? $post['keywords']); ?>">
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
