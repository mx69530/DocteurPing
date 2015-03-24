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
				<link href="../css/rss.css" rel="stylesheet" type="text/css"/>
		  </head>
		  <body>
			  <xsl:apply-templates select="*|text()|processing-instruction()" />
		  </body>
	  </html>
	</xsl:template>
	
	<xsl:template match="channel">
		<div class="block">
			<xsl:apply-templates select="*|text()|processing-instruction()" />
		</div>
	</xsl:template>
	
	<xsl:template match="item">
		<!--<div class="subblock">
			<ul>
				<xsl:apply-templates select="*|text()|processing-instruction()" />
			</ul>
		</div>-->
	</xsl:template>
	
	<xsl:template match="title"><h1><xsl:value-of select="."/></h1></xsl:template>
	<xsl:template match="link"><a><xsl:attribute name="href"><xsl:value-of select="."/></xsl:attribute>Lien</a></xsl:template>
	<xsl:template match="description"><p><xsl:value-of select="."/></p></xsl:template>
  
</xsl:stylesheet>
