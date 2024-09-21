<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <body>
                <h1>Sales Figure Over Time Report</h1>
                <canvas id="sales-figure-chart"></canvas>
                <script>
                    const months = [
                        <xsl:for-each select="report/sales_figure/sale">
                            "<xsl:value-of select="month"/>",
                        </xsl:for-each>
                    ];

                    const sales = [
                        <xsl:for-each select="report/sales_figure/sale">
                            <xsl:value-of select="total_sales"/>,
                        </xsl:for-each>
                    ];

                    const data = {
                        labels: months,
                        datasets: [{
                            label: 'Sales Over Time (RM)',
                            data: sales,
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    };

                    new Chart(document.getElementById('sales-figure-chart').getContext('2d'), {
                        type: 'line',
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
