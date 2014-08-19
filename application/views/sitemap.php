<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc><?php echo base_url(); ?></loc> 
        <priority>1.0</priority>
    </url>

    <?php foreach($sitemap as $url) { ?>
    <url>
        <loc><?php echo base_url($url["url"]); ?></loc>
	<lastmod><?php echo date("Y-m-d"); ?></lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.8</priority>
    </url>
    <?php } ?>

</urlset>
