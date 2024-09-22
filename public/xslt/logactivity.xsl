<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
        <div class="card w-60">
            <div class="card-header fs-5 p-3">
                <b>Log Activity</b>
            </div>
            <div class="card-body">

                <table border="1">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Page</th>
                        <th>Admin Username</th>
                        <th>Created On</th>
                    </tr>
                    <xsl:for-each select="activity/log">
                        <xsl:sort select="createdon" order="descending" />
                        <tr>
                            <td>
                                <xsl:value-of select="title"/>
                            </td>
                            <td>
                                <xsl:value-of select="description"/>
                            </td>
                            <td>
                                <xsl:value-of select="page"/>
                            </td>
                            <td>
                                <xsl:value-of select="adminusername"/>
                            </td>
                            <td>
                                <xsl:value-of select="createdon"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
                
                
            </div>
        </div>
  </xsl:template>
</xsl:stylesheet>