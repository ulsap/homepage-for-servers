<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'databases.php'; 

$customTags = [
    'h1'      => '<h1>{param}</h1>',
    'h2'      => '<h2>{param}</h2>',
    'h3'      => '<h3>{param}</h3>',
    'spoiler' => '<details class="spoiler"><summary>Показать спойлер</summary><div class="spoiler-content">{param}</div></details>',
    'quote'   => '<blockquote class="quote">{param}</blockquote>',
    'center'  => '<div style="text-align: center;">{param}</div>',
    'left'    => '<div style="text-align: left;">{param}</div>',
    'right'   => '<div style="text-align: right;">{param}</div>'
];

$stmt = $db->prepare('SELECT * FROM rules LIMIT 1');
$stmt->execute();
$text = $stmt->fetchColumn();
$safe_text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
$parser = new \JBBCode\Parser();
$defaultSet = new \JBBCode\DefaultCodeDefinitionSet();
foreach ($customTags as $tagName => $htmlTemplate) {
    $builder = new \JBBCode\CodeDefinitionBuilder($tagName, $htmlTemplate);
    $parser->addCodeDefinition($builder->build());
}
$parser->parse($safe_text);
$html_result = $parser->getAsHtml();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <div class="block">
        <?php echo nl2br($html_result);?>
        <div class="buttons">
        <a class="btn" href="index.html">Домой</a>
        </div>
    </div>
</body>
</html>