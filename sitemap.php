<?php

$links = array(
	"cv",
	"purpose",
	"blog",
	"portfolio",
	"video",
	"photos",
	"experiments",
	"experiments/anonynote"
);

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEBLOG);

$sql="SELECT * FROM `" . USERTABLE1 . "` WHERE live=1 ORDER BY `" . USERTABLE1 . "`.`date` DESC";

if ($result = $db->query($sql)) {
	while ($row = $result->fetch_assoc()) {
		$blog[] = $row["titlelink"];
	}
}

$db->close();

header("Content-type: text/xml; charset=utf-8");

//create your XML document, using the namespaces
$urlset = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" />');

// create homepage
$url = $urlset->addChild('url');
$url->addChild('loc', 'http://peterscene.com');
$url->addChild('changefreq', 'weekly');
$url->addChild('priority', '1.0');

// create main pages
foreach ($links as $item) {
	$url = $urlset->addChild('url');
	$url->addChild('loc', 'http://peterscene.com/' . $item);
	$url->addChild('changefreq', 'weekly');
	$url->addChild('priority', '1.0');
}

// create blog pages
foreach ($blog as $item) {
	//add the page URL to the XML urlset
	$url = $urlset->addChild('url');
	$url->addChild('loc', 'http://peterscene.com/blog/' . $item);
	$url->addChild('changefreq', 'weekly');
	$url->addChild('priority', '1.0');
}

// add whitespaces to xml output (optional)
$dom = new DomDocument();
$dom->loadXML($urlset->asXML());
$dom->formatOutput = true;

// output xml
echo $dom->saveXML();

?>
