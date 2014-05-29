<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Data</h2>
  <xsl:for-each select="ib/maintenance">
    <tr>
      <td><xsl:value-of select="para"/></td>
    </tr>
  </xsl:for-each>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>