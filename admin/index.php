<?php
require_once 'auth.php';
require_login();
require_once '../includes/functions.php';

$posts = get_all_posts($pdo);
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Anopcharik Patra</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        .actions { display: flex; gap: 10px; }
        .btn { display: inline-block; padding: 8px 15px; border-radius: 4px; text-decoration: none; color: white; background: #3498db; font-size: 14px; transition: background 0.3s; border: none; cursor: pointer; }
        .btn:hover { background: #2980b9; }
        .btn-success { background: #2ecc71; }
        .btn-success:hover { background: #27ae60; }
        .btn-danger { background: #e74c3c; }
        .btn-danger:hover { background: #c0392b; }
        .btn-warning { background: #f39c12; }
        .btn-warning:hover { background: #d68910; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: bold; color: #2c3e50; }
        tr:hover { background: #fdfdfd; }
        .actions-col { width: 150px; text-align: center; }
        .badge { background: #e1f5fe; color: #0288d1; padding: 4px 8px; border-radius: 12px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            Post Management
            <div class="actions">
                <a href="add.php" class="btn btn-success">+ Add New Post</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </h1>

        <?php if (isset($_GET['msg'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <?php echo htmlspecialchars($_GET['msg']); ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th class="actions-col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($post['title']); ?></strong><br><small style="color:#777;"><?php echo htmlspecialchars($post['slug']); ?></small></td>
                    <td><span class="badge"><?php echo htmlspecialchars($post['category']); ?></span></td>
                    <td><?php echo date('d M Y', strtotime($post['created_at'])); ?></td>
                    <td class="actions-col">
                        <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                        <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                        <a href="<?php echo post_url($post['slug']); ?>" target="_blank" class="btn" style="padding: 5px 10px; font-size: 12px; background: #95a5a6;">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($posts)): ?>
                <tr><td colspan="5" style="text-align: center;">No posts found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
