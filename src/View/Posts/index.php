<?php

/**
 * @var AppController $this
 */
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!-- ドキュメントは→ https://getbootstrap.jp/docs/5.0/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/posts.css">
    <script src="/js/posts.js"></script>
    <title><?= $this->get('pageName') ?></title>
</head>

<body>
    <div class="navbar header">
        <span class = "navbar-brand mb-0 h1"><?= $this->get('serviceName') ?></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>

    <br>

    <div class="content">
        <div>
            <!-- 投稿フォーム -->
            <form method="POST" action="/Posts/create" class="post-form">
                <div class="post-form-name">
                    <label class = "form-label">名前</label>
                    <input type="text" id="name" name="name" class="post-form-name-input form-control" placeholder="あなたの名前を入力してください。" maxlength="30" required>
                </div>
                <div class="post-form-message">
                    <label class = "form-label">投稿文</label>
                    <textarea id="message" name="message" class="post-form-message-text form-control" placeholder="投稿内容をここに入力してください。" maxlength="140" required></textarea>
                </div>

                <div class="post-form-submit">
                    <button type="submit" class="post-form-submit-button btn btn-info">投稿</button>
                </div>
            </form>
            <hr>
            <!-- 投稿一覧 -->
            <div class="posts">
                <?php if ($this->get('posts')) : ?>
                    <?php foreach ($this->get('posts') as $post) : ?>
                        <!-- 投稿カード -->
                        <div class="post">
                            <div class="post-icon">
                                <img src="/imgs/egg_purple.png" class="post-image" alt="egg_icon">
                            </div>
                            <div class="post-info" data-id="<?=$post['id']?>">
                                <input type="text" class="post-name post-not-edit-input" value= <?= $post['name'] ?> readonly><br>
                                <textarea class="post-text post-not-edit-textarea" readonly><?= $post['message'] ?></textarea>
                                <div class="post-action">
                                    <button type="button" class="post-action-btn edit-btn" onclick="editPost(this)">✒️編集</button>
                                    <button type="button" class="post-action-btn delete-btn" onclick="deletePost(this)">🗑削除</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <span>まだ何も投稿されていません</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>