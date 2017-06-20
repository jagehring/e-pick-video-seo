<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>Video Sitemap</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
                <style type="text/css">
                    body {
                        font-family: Helvetica, Arial, sans-serif;
                        font-size: 13px;
                        margin: 0;
                        padding: 45px;
                        color: #545353;
                    }
                    p.expl a {
                        color: #DA3114;
                        font-weight: bold;
                    }
                    a {
                        color: #339;
                        text-decoration: none;
                    }

                    a:visited {
                        color: #777;
                    }

                    a:hover {
                        text-decoration: underline;
                    }

                    .mainbox {
                        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                        font-size: 12px;
                        text-align: left;
						width:auto;
						height:auto;
						
                    }

                    .mainbox th {
                        font-size: 12px;
                        font-weight: bold;
                        padding: 8px;
                        background: #679DE0;
                        border-top: 4px solid #000066;
                        border-bottom: 4px solid #000066;
                        color: #039;
                    }

                    .mainbox td {
                        padding: 12px;
                        background: #AED7FF;
                        border-bottom: 1px solid #fff;
                        color: #669;
                        border-top: 1px solid #fff;
                    }

                    .mainbox tr:hover td {
                        background: #CCCCCC;
                        color: #339;
                    }
                </style>
            </head>
            <body>
                <h1><center>Video Sitemap</center></h1>

                <p class="expl">
						This video sitemap contains <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/> videos.
					</p>

                <table width="auto" class="mainbox">
                    <thead>
                        <th scope="col" width="8%">Video Thumbnail</th>
                        <th scope="col" width="10%">Video Title</th>
                        <th scope="col" width="27%">Video Description</th>
                        <th scope="col" width="27%">Video Transcript</th>
                        <th scope="col" width="4%">Duration</th>
						<th scope="col" width="10%">Category</th>
						<th scope="col" width="10%">Tags</th>
                    </thead>
                    <tbody>
                        <xsl:for-each select="sitemap:urlset/sitemap:url">
                            <xsl:variable name="link">
                                <xsl:value-of select="sitemap:loc"/>
                            </xsl:variable>
                            <xsl:variable name="thumb">
                                <xsl:value-of select="video:video/video:thumbnail_loc"/>
                            </xsl:variable>
							<xsl:variable name="player">
                                <xsl:value-of select="video:video/video:player_loc"/>
                            </xsl:variable>
							<xsl:variable name="desc">
									<xsl:value-of disable-output-escaping="yes" select="video:video/video:description"/>
							</xsl:variable>    
							<xsl:variable name="trans">
									<xsl:value-of disable-output-escaping="yes" select="video:video/video:transcript"/>
							</xsl:variable> 
                            <tr>
                                <td>
                                    <a href="{$player}">
                                        <img src="{$thumb}" width="120" height="90"/>
                                    </a>
                                </td>
                                <td>
                                    <a href="{$link}">
                                        <xsl:value-of disable-output-escaping="yes" select="video:video/video:title"/>
                                    </a>
                                </td>
                                <td>
								  
								<xsl:choose>
									<xsl:when test="string-length($desc) &lt; 200">
										<xsl:value-of select="$desc"/>
									</xsl:when>
									<xsl:otherwise>
										<xsl:value-of select="concat(substring($desc,1,200),' ...')"/>
									</xsl:otherwise>
								</xsl:choose>
							    </td>
                                <td>
                                   <xsl:choose>
									<xsl:when test="string-length($trans) &lt; 200">
										<xsl:value-of select="$trans"/>
									</xsl:when>
									<xsl:otherwise>
										<xsl:value-of select="concat(substring($trans,1,200),' ...')"/>
									</xsl:otherwise>
								</xsl:choose>
                                </td>
                                <td>
                                    <xsl:value-of select="video:video/video:duration"/>
                                </td>
								<td>
								   
                                    <xsl:value-of select="video:video/video:category"/>
									
                                </td>
									<td>
								   
                                    <xsl:for-each select="video:video/video:tag">
                                    <xsl:value-of select="."/>,</xsl:for-each>
									
                                </td>
							
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
