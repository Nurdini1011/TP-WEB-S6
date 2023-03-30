<h1> Liste des Artiles </h1>
<ol>
    <?php foreach ($articles as $article) : ?>
        <li> <a href = "/articles/searchByslug/<?=$article['slug'] ?>"><?= $article['title'] ?></a>
        <!-- <?= $data?> == <?php echo $data; ?> -->
        </li>
        
    <?php endforeach ?>

</ol>
  
