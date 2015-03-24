<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:output 
  method="html"
  encoding="UTF-8"
  doctype-public="html"
  indent="yes" />
  
	<xsl:template match="/">
	  <html>
		  <head>
			  	<title>XML</title>
				<meta charset="UTF-8"/>
				<meta name="description" content="Truc de chinois"/>
				<meta name="keywords" content="chinois, acuponcture"/>
				<meta name="author" content="Tanguy Falconnet - Maxime Servettaz"/>
				<link href="../css/xml.css" rel="stylesheet" type="text/css"/>
		  </head>
		  <body>
			  <xsl:apply-templates select="*|text()|processing-instruction()" />
		  </body>
	  </html>
	</xsl:template>
	
	<xsl:template match="pathologie">
		<div class="block">
			<h1>Pathologie</h1>
			<xsl:apply-templates select="*|text()|processing-instruction()" />
		</div>
	</xsl:template>
	
	<xsl:template match="meridien">
		<div class="subblock">
			<h2>Méridien</h2>
			<ul>
				<xsl:apply-templates select="*|text()|processing-instruction()" />
			</ul>
		</div>
	</xsl:template>
	
	<xsl:template match="symptomes">
		<div class="subblock">
			<h2>Symptomes</h2>
			<ul>
				<xsl:apply-templates select="*|text()|processing-instruction()" />
			</ul>
		</div>
	</xsl:template>
	
	<xsl:template match="description"><p class="description"><xsl:value-of select="."/></p></xsl:template>
	<xsl:template match="nom"><li><xsl:value-of select="."/></li></xsl:template>
	<xsl:template match="categorie"><li><xsl:value-of select="."/></li></xsl:template>
	<xsl:template match="symptome"><li><xsl:value-of select="."/></li></xsl:template>
  
</xsl:stylesheet>
