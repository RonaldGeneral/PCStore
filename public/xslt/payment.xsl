
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
        <div class="card w-25">
            <div class="card-header fs-5 p-3">
                <b>Payment details</b>
            </div>
            <div class="card-body">
                <xsl:choose>
                    <xsl:when test="payment/method = 'tng'">
                        <p>Payment Method : TnG EWallet </p>
                        <p>TnG Number : <xsl:value-of select="/payment/number" /></p>
                    </xsl:when>
                    <xsl:when test="payment/method = 'fpx'">
                        <p>Payment Method : FPX Transfer </p>
                        <p>Bank Name : <xsl:value-of select="/payment/bank" /></p>
                        <p>Card Number : <xsl:value-of select="/payment/number" /></p>
                    </xsl:when>
                    <xsl:when test="payment/method = 'card'">
                        <p>Payment Method : Debit/Credit card </p>
                        <p>Card Number : <xsl:value-of select="/payment/number" /></p>
                    </xsl:when>
                </xsl:choose>
                
                <p>Total Amount : RM <xsl:value-of select="/payment/total" /></p>
            </div>
        </div>
  </xsl:template>
</xsl:stylesheet>
