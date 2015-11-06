<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
      xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >

  <xsl:template match="/">
    <HTML>
      <BODY>
        <TABLE>
          <xsl:for-each select="assessmentItems/assessmentItem">
            <p>
              <p>Galdera: <xsl:value-of select="itemBody/p" /></p>
              <p>Zailtasuna: <xsl:value-of select="@complexity" /></p>
              <TD>Gaia: <xsl:value-of select="@subject" /></TD>
			  <p>.........................................</p>
            </p>
          </xsl:for-each>
        </TABLE>
      </BODY>
    </HTML>
  </xsl:template>

</xsl:stylesheet>