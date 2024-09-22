
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
        <div class="col-3">
            <div class="card p-3">
                <div class="card-body">
                    <h5 class="header-title mb-3">Billing Information</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <xsl:choose>
                                <xsl:when test="payment/method = 'tng'">
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>TnG Ewallet</p>
                                    <p class="mb-2"><span class="fw-bold me-2">TnG number:</span> <xsl:value-of select="/payment/number" /></p>
                                </xsl:when>
                                <xsl:when test="payment/method = 'fpx'">
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>FPX Transfer</p>
                                    <p class="mb-2"><span class="fw-bold me-2">FPX Bank Name:</span> <xsl:value-of select="/payment/bank" /></p>
                                    <p class="mb-2"><span class="fw-bold me-2">Card Number:</span> <xsl:value-of select="/payment/number" /></p>
                                </xsl:when>
                                <xsl:when test="payment/method = 'card'">
                                    <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span>Debit/Credit card</p>
                                    <p class="mb-2"><span class="fw-bold me-2">Card number:</span> <xsl:value-of select="/payment/number" /></p>
                                </xsl:when>
                            </xsl:choose>                            
                        </li>
                    </ul>

                </div>
            </div>
        </div> 
  </xsl:template>
</xsl:stylesheet>
