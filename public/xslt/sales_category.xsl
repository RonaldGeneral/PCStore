<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
    <html>
    <body>
        <h1>Sales by Category Report</h1>
        <canvas id="sales-category-chart"></canvas>
        <script>
            const categories = [
                <xsl:for-each select="report/sales_by_category/category">
                    "<xsl:value-of select="name"/>",
                </xsl:for-each>
            ];

            const sales = [
                <xsl:for-each select="report/sales_by_category/category">
                    <xsl:value-of select="total_sales"/>,
                </xsl:for-each>
            ];

            const data = {
                labels: categories,
                datasets: [{
                    label: 'Sales by Category (RM)',
                    data: sales,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            new Chart(document.getElementById('sales-category-chart').getContext('2d'), {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </body>
    </html>
</xsl:template>

</xsl:stylesheet>
