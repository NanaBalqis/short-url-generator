<!DOCTYPE html>
<html>
<head>
    <title>Short URL Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 700px;">
        <h2 class="text-center mb-3">Short URL Generator</h2>
        <p class="text-center text-muted">Enter a long URL and generate a shorter link.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('shorten') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Original URL</label>
                <input 
                    type="text" 
                    name="original_url" 
                    class="form-control" 
                    placeholder="Example: https://www.google.com/search?q=forcetech"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Generate Short URL
            </button>
        </form>

        <?php if (session()->getFlashdata('short_url')): ?>
            <div class="alert alert-success mt-4">
                <strong>Your Short URL:</strong><br>
                <a href="<?= session()->getFlashdata('short_url') ?>" target="_blank">
                    <?= session()->getFlashdata('short_url') ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>