<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" 
                xmlns:html="http://www.w3.org/TR/REC-html40"
				xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title>XML Sitemap</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<style type="text/css">
					 body {
                        font-family: Helvetica, Arial, sans-serif;
                        font-size: 13px;
                        margin: 0;
                        padding: 45px;
                        color: #545353;
                    }
					
					
					a {
						color: #000;
						text-decoration: none;
					}
					a:visited {
						color: #777;
					}
					a:hover {
						text-decoration: underline;
					}
					td {
						padding: 12px;
                        background: #AED7FF;
                        border-bottom: 1px solid #fff;
                        color: #669;
                        border-top: 1px solid #fff;
					}
					th {
						text-align:left;
						padding-right:30px;
						font-size:11px;
					}
					tr:hover td {
                        background: #CCCCCC;
                        color: #339;
                    }
					thead th {
						font-size: 12px;
                        font-weight: bold;
                        padding: 8px;
                        background: #679DE0;
                        border-top: 4px solid #000066;
                        border-bottom: 4px solid #000066;
                        color: #039;
					}
				</style>
			</head>
			<body>
				<div id="content">
					<h1>Video Sitemap Index</h1>
					
					
					<p class="expl">
						This sitemap contains <xsl:value-of select="count(sitemap:sitemapindex/sitemap:sitemap)"/> sitemaps.
					</p>			
					<table id="sitemap" cellpadding="3">
						<thead>
							<tr>
								<th width="80%">sitemap location</th>
								
								<th width="20%">Last Change</th>
							</tr>
						</thead>
						<tbody>
							<xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
							<xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
							<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
								<tr>
									<td>
										<xsl:variable name="itemsitemap">
											<xsl:value-of select="sitemap:loc"/>
										</xsl:variable>
										<a href="{$itemsitemap}">
											<xsl:value-of select="sitemap:loc"/>
										</a>
									</td>
								
									<td>
										<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)))"/>
									</td>
								</tr>
							</xsl:for-each>
						</tbody>
					</table>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>