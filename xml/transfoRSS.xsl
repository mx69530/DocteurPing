<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:output 
  method="html"
  encoding="UTF-8"
  indent="yes" />
  
	<xsl:template match="/">
	  <xsl:apply-templates select="*|text()|processing-instruction()" />
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
	
	<xsl:template match="title"><h2><xsl:value-of select="."/></h2></xsl:template>
	<xsl:template match="link"><a><xsl:attribute name="href"><xsl:value-of select="."/></xsl:attribute><xsl:value-of select="."/></a></xsl:template>
	<xsl:template match="description"><p><xsl:value-of select="."/></p></xsl:template>
  
</xsl:stylesheet>
