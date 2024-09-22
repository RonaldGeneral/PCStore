<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
        <div class="card w-25">
            <div class="card-header fs-5 p-3">
                <b>Log Activity</b>
            </div>
            <div class="card-body">
                <xsl:choose>
                    <xsl:when test="activity/title = 'Add Customer'">
                        <p>Title : Add Customer</p>
                        <p>Description : <xsl:value-of select="/activity/log/description" /></p>
                        <p>Page : <xsl:value-of select="/activity/log/page" /></p>
                        <p>Admin Username : <xsl:value-of select="/activity/log/adminusername" /></p>
                        <p>Created On : <xsl:value-of select="/activity/log/createdon" /></p>
                    </xsl:when>
                    <xsl:when test="payment/title = 'Add Staff'">
                        <p>Title : Add Staff</p>
                        <p>Description : <xsl:value-of select="/activity/log/description" /></p>
                        <p>Page : <xsl:value-of select="/activity/log/page" /></p>
                        <p>Admin Username : <xsl:value-of select="/activity/log/adminusername" /></p>
                        <p>Created On : <xsl:value-of select="/activity/log/createdon" /></p>
                    </xsl:when>
                    <xsl:when test="payment/title = 'Add Product'">
                        <p>Title : Add Product</p>
                        <p>Description : <xsl:value-of select="/activity/log/description" /></p>
                        <p>Page : <xsl:value-of select="/activity/log/page" /></p>
                        <p>Admin Username : <xsl:value-of select="/activity/log/adminusername" /></p>
                        <p>Created On : <xsl:value-of select="/activity/log/createdon" /></p>
                    </xsl:when>
                    
                </xsl:choose>
                
                
            </div>
        </div>
  </xsl:template>
</xsl:stylesheet>