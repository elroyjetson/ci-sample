<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (empty($page_title)) ? $this->config->item('default_page_title') : $page_title; ?></title>
    <meta name="description" content="<?php echo (empty($page_description)) ? $this->config->item('default_page_description') : $page_description; ?>">
</head>
<body>
    <?=$page_content?>
    <?php echo $this->load->view('layouts/fragments/analytics_fragment', '', true) . "\n"; ?>
</body>
</html>