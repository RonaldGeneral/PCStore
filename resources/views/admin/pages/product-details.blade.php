@extends('admin.layouts.default')

@section('content')
<div class="page-path">
    <a class="me-2" href="{{url()->previous()}}">
        <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg>

        Product Details
    </a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Product image -->
                    <a href="javascript: void(0);" class="text-center d-block mb-4 btn">
                        <img id="main-img" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSERUSExMVEhUVFRUQFRUVGBUVFxUYFxYWFhUXFhgYHSghGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGi0fHR0rLS0rLS0tLS0rLSsrLS0tLS0tLSstLS0tKy0tLSstLS0tLS0tLS0tKystKy03LS0tLf/AABEIAMkA+gMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABQYDBAcCAQj/xABGEAACAQIDBAYGCAQDBwUAAAABAgADEQQSIQUxQWEGEyJRcYEHMkJykaEUI1JigrHR8DOSosFDc8IkNIOy4eLxFlSTo9L/xAAZAQEAAwEBAAAAAAAAAAAAAAAAAQIDBAX/xAAnEQEAAgICAgEEAQUAAAAAAAAAAQIDEQQSITFRIkFhcUIygZGx4f/aAAwDAQACEQMRAD8A7jERAREQEREBERAREQEREBERAREpPpCwDY56OAWq1FStTGVWUX0p5adNGFxcF6ua1/8AC5QLtE4x/wCgNpYcf7NtK9twLV6PyBqCfDjukOG3sK4/4NQf6Xluk/CNu0ROMJ6VdoUf94wam285atL5m4klhfTItQELg2z77dauS1xe7Zbg9wtI0l1WJzrD+lmj/i4WunNDTqD/AJgflJbB+kvZtQ2Nc0j3VadRPmRY/GQaW+JGYPpDhKv8PE0X5Col/he8kgb7tYH2IiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgJUtn1OtxmMr8A6YKmb3BWgpZyO762tVU/wCXLLtHGLRo1KzmyU0eqx7lRSx+QlW6MUGp4WkH0qMprVf82sxq1f63aaY43KJStVpFY15IVmkNtGpYGdtYZyhsWSzZV3n93PKa2K2RRK5WpI9tczIpN+JuRcTbSoBc8TvP9oZrxbz4ejg43WN29yq9TYuHD9pWVDocjuMv3gL2t3i26Z8X0CpsCExFRc1vWVHGmo9UKfnJfE0LzLseuR9U3s6pzXu8vy8JlOOs/Z01w0n3Ci4z0ZYjfTrUn97PTPkAGHzmtR6NbXwzAp1wUa3o1b38ka/ynWkM2KbSs4qqW4lPsoaelLaeH/j0VIGhNWlUpfPQSWwPprB/i4Tzp1Afkw/vLej6WmjjNhYSsb1MNQc/aNNM381r/OUnCwniT9pY8H6Xdnv64rUfeTMP6C0nsF052dV9XF0gTwc9Wfg9pTcV6PsA+6m9M/cqP+Tlh8pC4v0WJ/hYl15VEV/mpWVnFZnPGyQ7Rh8XTqC6Ojj7rBvymafnjFejvF0rtTqUWA1uHem/wK2/qmTYGM2phsZh6bVa4D1QMjVesRlBHWaZmGikmZzGp1P3Z2xXr5mH6DieUOgvvtPUhQiIgIiICIiAiIgIiICIiAiIgVrp9Vvh0w//ALqvTw5G+6C9WuDyNKlUHnPtNryO6RV+s2iiX0w2HLkcOsxD5VPiEo1P/lm9SnVhr42pZ9rtKTtfaoZyqm6jS/ef0m701271Y6hD22F3P2VPDxP5eIlKWvOmHbxMH87f2TtPEzdo1ZXqFaS2FqRL0koovMNfDnRl0ZdQZmotNkLeUlUoV8wB7+Hd3ibdN5G5Mh5H85np1ZVdJo8yh5oU6kzLUhXTbzT5mmv1kxVql+zw9r9P3w8ZXJeKVm0piGLGVsx+6N3Pn+kieiuG+k7XdzqmEpikNNOsqXZyPBQynxE3MdiBTR6jeqis58FFz+UkfRHs8pg+vf18QzYhj/mG4+KhD5meVhtOTJOSzn51utIpH3XqIidLyyIiAiIgIiICIiAiIgIiICIkT0r2icNgq9ZdXWm3VjvqN2aY83KjzgU7ZVfrq2IxGv12IfL7lK1CnbkRSz/jM3dvbYXCYdqrWJ9Smv23INh4aEnkDNXo7g1pUqdJfVpotMeCgLc/C85n016R/S8QSp+pp3Sl977VT8RA8gvG87qeI0tjx97efTXrY1qjs7tmZiWYniT+93CekqyJStMy15fb0620nMPVk1hKsrezqdSpmKIzhBmcgaKPvHcPDeeE22L2tfKOX6yY8oycitI8rLV2rSpeu4B+yNW+A1mo3S0X7FJiO9iF+QvK+mEm9QwUt1j7uDJzMk/0+Ezh+lKtpUpFQfaU5reVgfhJCnWHAgjgRuI4GQlPZ3KbNCmaenA7uXfKWiPs24vKva3W6epVpnWrIilXmwteVejtI9YSQBqToP385nanlFvn3niZ52VQ7PWHe2i+73+ZHwA75lqzyuZl7W6x6grO5VXpjd6dPDISGxNVKOm8JcM7eAsB+KdZ2ZhhSpIgFgqgAd2mg8hp5TmewqH0nbHemEpAf8Srqdf8u48QJ1aTgr1xx+fLzOXfvln8eCIiauYiIgIiICIiAiIgIiICIiAlK9JOKuMLhhb6yt17j7mHGcf/AGtQl1nMOkuMFXalUkgJhqSYe53KSOvrG/dlajf3JakbkhD9OdtdRhhQQ2qVwQbb1pbnPix7Phn7py2pUm9t7axxNd6x0DGyA+yi6IPG2p5kyJ1ZgqgszEKqgXJJ3AAbzOqZ06qV6wyGtbjLr0U6F1K9quIzUqRsQm6pUH+hfmeFtDN/of0NWjlrYgB6u9U0K0u6/Bn57hwvvl8pGcGXmfxp/l10xT7s9Js9Fw7UaaKiZGUKosLkHXmb7ydTKbUwkv8Ah5WsVh8rsvcSP0+VpvwcnuJ/bm5NPUoRMFykhhcFym7RoSTw2GnfaXDMNOhgeUjukyimKY4tnPkMo/v8pcKOHnP+l+Nz4pgPVpAUR4qSX/qJH4RMt7lvxq/Xv4Y6VeSOzaZq1Fpjjqx7lGrH4aeJEr1KrLt0HwvYesfaPVr4LYtbxJA/BM8t+lJl6U21CedQBYaAaAdw4CR+MqhFZ2NlVS7HuAFz8hJKrKn07qn6OKC+viaiYZeNgxu5PLKpH4hPH69raO/Ss2+Ex6JMEfo74pxZ8TUeueNs5uB4WAI5NL7NHYeCWjh6dNRYKigDuAAAHkLDym9O+XkEREgIiICIiAiIgIiICIiAiIgealQKCxNgAWJPADUmfnLbm2GbCvU1D42rUqkHetN2zkeSmmngT3TsvpR2gaGy8Swvd0FAW3jrSEJHgrMfKfnvaGJOIqItNSbKtJF0uSd/xJt4ATXFrflrhiJt5aFKizsERSzMcqgbyZ0vop0YXCjO1nrEatwQHeqf3bj4aT70Y6PLhlzNZqzCzNwUfYXl3nj4SwoJ5vL5neelPX+/+PYxcfr9VvbPTm5SmpTm3SnNRezeoyJ29Sy1Ffg4yn3l/UW/lMlKRnnaWH6ykyjeO0vvDUfHd5ztwX6WiXJlruNIzCi8mcKkg9m1LgSfwzT1Zs8y1dS87bx4w2HerpmAyoDxdtE+ep5AzkhPO/M8ZYPSBtrrK4oKexRvm51Dv/lGniWlYFSTV2YK9a/tsAzrOxML1WGpJuIQFvebtN8yZyrZWH66vSpfbdVPu3u/9IYzstQzl5dvUNbT5atSVRKP0rbNOnvTCU8za/4lWxII7+rCnylqruFBZjYAFie4DUn4SF9E2GNRa2NcENiKjVADvCk9lfwgW8DOTDH1b+GPJtqsV+XQoiJ0OIiIgIiICIiAiJiqYhF3sBAyxIvE7bpoP7sQo+JkVX6T3uE1IF7KLtblmtm8ry3WRaZr1cbTXew8Br+Uo1bb7VPaAuOyWJYHkbWy/AjmBrI7E7QbVahZSQNxC28ACBUU/PgY1CF5xnSGmn/cQPlvkZX6Ujicqn2tAvhdje/K27WVOpmCAnKaZN/aAU7r2ABQ/C9vaEUhqzUGsLbmzMSpO4X0qDlcE9x3ydx8Cx7boJiqBSpaopswDEmxG5gd6nXeNdZyvaPQhmBaie+9JyDUFja/ZuGUjUbz3kcLfSxZU9gtTb1WLhurvzBuVtbhc620ExPjlYjN9WTufTq2P3XBOUmxsLndvuJbxIomF23jMGwRwaij2Klybccr7/mwEt2xelmGr2Ut1LnTLUsAT919x+R5TdxarUGWsgqA2IbTNyIO5+V/jKttXoYGu1Bs3Eod/nvP/N4ic2Xh0t5iHTi5mTH43uPy6EgmzTnHsBtjGYEhbkoP8Opdkt9zXs/gNu+XfYPTzDVrLV/2Z/vm9MnlU4fiC+c5J49qfl3U5dL+/ErrTmdDNekbi41B1BG48wZsJJqm6AqU+rrMm4E518G1+RuPKNv7dGFwzVARnPYpg63dgbacQNWPJZtdJqdurq9x6s+B1X5g/wA05J032ya2IyA9ijdAO9jbOfiAv4ec9PDPasOe2OJnbAuJvqSSTqSdSSdSSeJmUV5CrXkr0d2XVxtdaFLQntO5FxTQb3bv5DibDnOiZ1G2i/8Aov2cXqPimHZQGlTJ4uw7ZHuqQPxnunRHmHZuAp4eilGkLIi5R3niSTxYkkk95MyMZ5ma/e21Y8yrHpAxZTCNTX18Qy4VB3575/6FeXTozgBQwtKmOCj8ha/OwEou0Kf0ra9Ch7GHpms/dnqEAX5hVDD3jOnCXxxqv7cea27/AKIiJdkREQE8VKqrvIE9mQm0MOQxbeDr4f8ASTWIn2N6ptJBuufl+c1qu02O4AfOR14vNukK7Z6mIZt7EzFeebxeW0MeKw61FKsLg/EeB4SsbR2PUpkFS9RfuKMw7r77+IAlqLT7Ynh8ZWa7SpVKp1gLOpUC16gsTc7iy37YOpLXDd957WoyKRY1KbXykfwzr6ysPUa67rg7wRJfamwEqdpVVXvfUXU+W5Tfja/jK+5qUnZXsPtJl7LgEW32uu6xABHCxmcxpLZpUzmVqOZmtfIWXMNT2dLB15XN7m4tML1EcMzMEYnSxbIe/OALp+G45TzTQMw6rKj8Fdide9KjXOunZNtd1+Hk4pTcVP4l/XCgVBYEFW4vvGhsdPKVH3EsQUFdQVyjLZjmKjcVdScw14k2vuF5GPRYqxpOClxdQhYsbHVqZuH3bwWtobC2kg+ekb61UIB3XQki6h0a5Vh3Gx07pH1cOrgsGKNcAIzjU7xaofVtwD2Om8mSMGDx+oCXopvysFNFiB2gD7LM2mbU8xukhSxisRcGiTquZls3f1bg9q1xqNNRrIzEMajKuIQoNAWzlH00uVa/WcdbE87aTCiuFIpCk1IEOzXJC2NszBjnpnUage6eMmLTCFgxSLUGWqgcHjYXPx0bz+MrW1OiIa7UG/Cb6eO9h49qbdHaCqQq1AoF70yo6q4vdabkqBc7max11JknTxILEFXpstj2wQATbQMQNbncbX3i41l9xIpeB2ljdntam7It/wCG/apNv3Le3mhB75fej/pJw9SyYhTh33Z9XpHxPrJ5iw+1MeIpK4K1EDA6HQa+IOjfvWVvafRINdqJ52NyB/qX5jumd8MS0pltX061jlWvhmyEOGXOjKQwYr2lsRv1AHnPzmzFu0d7do+J1MmsDjMZs981J3o3Oo9am/ipujHT3hyktsbaey6tTNjcK1Jibl6L1TQJOpJpA50ueClh4ScNoxxMS6acis+JQXR7o9XxtXq6K3t67m4SmO92/sNTwE7r0V6N0cBR6un2mNmqVCLNUYd/co1svC54kk7exTh+pX6L1XU+z1OXJz9XS/fx75ukzHLmm3j1DSZ2MZhduJ0G+89kyu9PMaaeCqBfXrWwqC9iTV7JtzyZz5Tn1udJmesbfPRZS65sRj2H+8VWZLixyA5aQPMItvOdDkR0T2cMPhKVMcFHnoNfMAHzkvOt5xERAREQE8ul56iBCY3Akar8P0keCd3GWllvInaGA9ob5pS+vEo00BTPIfOe1pDmf3ymNaxBs2hmTNNkPU8kz4WngtA+PNLGYZKgyuuYcOBXwM2XaYHaRMJVbaeyHp9pfrE7x6w94D+00vpl1yvdl0swtnFt1m9pdT2Tp3W3y45rfv8AORO0tjpUuydh95Hst+h5/naZzT4EGGNJhVRmqrYXK6Wv7DrqR5kq3C/DV6pHVzYU2FtCTkN730Hapn3jl5AbvtSnWoNm1pkG2e9hffYWuTpyPO0w1RRYm5yPbhYUWN+9SSgt3G1/siUSw1ywKpiAgS3ZBGoXcWpmn6o03XCm24zEiMXP0VgL+yOzVUA3Nye1UXduJ90bpkrGqo6t6ahAT2XFh3kow1uO9Lk8bieKlEs2XDuLNl+r0VhuOjWu9iN5OfvHeGOni6WT1lSpr9ZTp5Rrl4Czd5uMoGt1JtPtjRRWqN1qN2kAByXNxdKlrqw1JUZbjfcHXyMYlj1hz1Da1VUXMvM5vXbgbhWFzrfd9Vair1prZqZOUsoZ83J1YDut2tx3QNrZuK7H1anKBbI5sMxIHZqN2CPurkI1sG1kguLTNbOFcEqVJsQw3jUAjlmC33i8g6r08TVFmekzHKAb1F1sCFt2l93Ud2W9p6qYs0SKbIzEDsmpYsOA6pgLKBvFs4vbmDMWmEJ+tTVwVdQb6HQa+IOjfLxle2l0TVrtSNuNtSP/ANL8x3CSOHrOtjmd+zpQcDrmI4qC17ag3F72JCjht4XFLUJCE5l1I1FuFw1t3wl/plCi0XxWBqZ6bvQbdmUjK3cDvV/dYeUvOwPSqdExtPl1tEfN6Z/NT+GbFWiHBDKDfTuv4jcR+9ZW9p9FFbWkch+wfU8rar8xylL4ttK3mvp17Zm1aOJTrKFVaq96nUcmU6qeRAMr+2E+lbUwuGGq0VOKqD7znJTPioDHweceaniMJUDAvQcbnUkA8g6mzDl8ROw+h+hUrdbjq7GpUqkDOQouEHViwUAD1WGg4XmNcfW22l83aunTFFtB4T7ES7EiIgIiICIiAnwi8+xAito7PDC4kMWKGzeRltIkftDABhL1voQnWTwakxYik1M2O6YTUm8TtDM9SYGqTwzT4AIDNPuWfbzyWgYsXh1dcrjMOf6/3lX2nsdqZDUlzDiDq19dQSbgbt1j4y0uZhcys12KOKhBKVbupaxpau4bUdkg9ht4337wd0xPQA1ojMy3zq4vVQq3BTow0Gqi41vaWbaeykqknVSdCVNsw7mBuD/44C0gMYhw7WRFSxJzN7ag6BamYWJU6qoQjcLzKa69pYaDF+1XRQCDas4AYaaHK38a2m8E85iFOtrUFUFAADUBJABIGUpYkakdki2omzWp9aoasOqOXs1WGUniFK76q6mzDUcbyNK1aBDg2vcK62ZHHEX3MO9T5iQNp8XTZciHqTrmbKFSpf7QW5T5jU6CfcHiTQN2qZwCSaakMLm4PaPqnmlz4TGcKtRgABTdvVy3ak5+7a5Q8tR7s2aOwmYguBSG5gCGv7o3DzY9/KNTI0ko02YmnYk3+qqnU34o+lz3XIb3pJ4elWqAKy1Cga5NXstTI0uGYEVRyKny3zfwmzKVM9lSzcGbtHyFgB5C8lRgzcdYwp33A3LnwQa25mw5y8U+UI/C0ygIL5+4WsAPMk6+NhwAE2WAADOVpqxyhnIUMx3Kt/Xb7q3PKSFLYeJqVAKISlSGUtVqqXqvuLCmnqUxbTMQxvrLPhuiVE1fpFRBVrWCio4uVUblS/qjU7om8R6FR2r0ZfEYapRo2qVHAQFuzTS7DM1zqxAuRa2tp0DopsUYPC06AN8igE95AAv/AH8zN+jhgu4TYEpNtpIiJUIiICIiAiIgIiICIiBo47BBxKvjcEUPKXaauLwgYS1baFHvGabu0tnFDcDykbebRO0MmafC0x3ny8sPRMxMZ9LTwYHlphqC/wC+7dMrTGYFc2nsRixenZ8xzWc6qb3sCdGXk3C2/ecmztlmmSXcENfNTUDqze+8EW0O4AC3hpJ9aJPh3nQTZwezM/qqanPVU+O9vKUmsR5ERg8KB2aSAX35RqfeO8+c36Gz7mxJJ+wnaPmdw8dZaMH0dJHbOn2F7K+dtTJ7CbNSmLKoHgJWbxHoVfZ+w3O4CiNN3ae3EFuHlJ3AbCp09QtzvLHUk995LqgE9TObTKWNKIEyWiJAREQEREBERAREQEREBERAREQEREDXxOGDCVbauyipJX9/v98rjMVeiGGsmJ0OcnSfLywbX2RxGn7/AH+98BUosDYqfhp5Gb1ttDTxGPpobFgW+yNT/wBJq4bbAqfw0L7tdANT3ki5tw5jvvNnEbISuRdSxB9m3zJ0/dpPbL6MGw0CDuXf/MdZS1p+RHUKjaGoddLU6Yso7OoO8trfU8rW1m5hdkO5uFyA8W1+C/rLVgdiU6fDX5/GSSUwNwlO2vSUDgujqjV+0fva/LdJqlhlXcJniVHwCfYiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiIHirSDCxkZX2Gj77232ubfCS0QNTDbPRBoBNoCfYgIiICIiAiIgIiICIiAiIgIiICIiAiIgf/9k="
                            class="img-fluid" style="max-width: 280px;" alt="Product-img">
                    </a>

                    <div class="d-lg-flex d-none justify-content-center">
                        <span onclick="changeImg(1)" class="pe-auto">
                            <img src="data:image/jpeg;base64,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"
                                id="img1" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                        <span onclick="changeImg(2)" class="ms-2 pe-auto">
                            <img src="data:image/avif;base64,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"
                                id="img2" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                        <span onclick="changeImg(3)" class="ms-2 pe-auto">
                            <img src="data:image/avif;base64,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"
                                id="img3" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                    </div>

                    <script>
                        function changeImg(id) {
                            var mainimg = document.getElementById("main-img")
                            var imgsrc = document.getElementById("img" + id)

                            mainimg.src = imgsrc.src;
                        }
                    </script>
                </div> <!-- end col -->
                <div class="col-lg-7">
                        <!-- Product title -->
                        <h3 class="mt-0">
                            Lenovo Ideapad 5
                            <a class="ms-3" href="javascript: void(0);" data-bs-toggle="modal"
                                data-bs-target="#edit-product-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960">
                                    <path
                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                    </path>
                                </svg>
                            </a>
                        </h3>
                        <p class="font-16">
                            <span class="svg-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                        </p>

                        <!-- Product stock -->
                        <div class="my-3">
                            <h6><span class="badge bg-success">Active</span></h6>
                        </div>

                        <!-- Product price -->
                        <div class="mt-4">
                            <h3>RM 4,298.00</h3>
                        </div>

                        <!-- Product description -->
                        <div class="mt-4">
                            <h6 class="font-14">Category:</h6>
                            <p class="fs-09 mb-3 text-muted">Laptop</p>

                            <h6 class="font-14">Description:</h6>

                            <ul class="text-muted" style="list-style-type: disc;">
                                <li>
                                    <p>14″ 2-in-1 laptop with AMD Ryzen™ processors for powerful performance</p>
                                </li>
                                <li>
                                    <p>360-degree convertible design for versatile modes of use</p>
                                </li>
                                <li>
                                    <p>Enough storage &amp; swift memory for faster executions</p>
                                </li>
                                <li>
                                    <p>Smart AI features, rapid charging, &amp; optional Lenovo Digital Pen</p>
                                </li>
                                <li>
                                    <p>Swift memory &amp; storage for multitasking</p>
                                </li>
                            </ul>
                        </div>
                </div> <!-- end col -->
            </div> <!-- end row-->


            <!-- Specification -->
            <div class="table-responsive table-bordered mt-4 col-11 m-auto">
                <table class="table table-centered mb-0 table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Specification</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="">
                            <td class="py-4 d-flex justify-content-between fs-6">
                                Processor
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="py-3 border-1"><input id="txtDesc" class="form-control" value="Up to AMD Ryzen™ 7 8845HS" ></td>
                        </tr>
                        <tr>
                            <td class="py-3 d-flex justify-content-between">
                                Operating System
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="py-3 border-1">Up to Windows 11 Pro</td>
                        </tr>
                        <tr>
                            <td class="py-3 d-flex justify-content-between">
                                Graphics
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="py-3 border-1">AMD Radeon™ Graphics (UMA)</td>
                        </tr>
                        <tr>
                            <td class="py-3 d-flex justify-content-between">
                                Memory
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="py-3 border-1">Up to 16GB LPDDR5X</td>
                        </tr>
                        <tr>
                            <td class="py-3 d-flex justify-content-between">
                                Storage
                                <a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="py-3 border-1">Up to 1TB PCIe M.2</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div>
@stop


@section('modal')
<div class="modal modal-lg fade" id="edit-product-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtName" placeholder="John">
                        <label for="txtName" class="col-form-label">Title</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtDesc" placeholder="John">
                        <label for="txtDesc">Description</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control fs-09" id="txtPrice" placeholder="John">
                        <label for="txtPrice" class="col-form-label">Price</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlCategory" class="form-select fs-09">
                            <option selected="true" value="laptop">Laptop</option>
                            <option value="prebuilt">Prebuilt</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <label for="ddlCategory">Category</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlStatus" class="form-select fs-09">
                            <option selected="true" value="1">Active</option>
                            <option value="2">Hidden</option>
                        </select>
                        <label for="ddlStatus">Status</label>
                    </div>
                    <div class="mb-3">
                        <label for="img1" class="form-label fs-09">Default Image</label>
                        <input type="file" id="img1Upload" class="form-control fs-09" accept=".png,.jpg,.jpeg" />
                   </div>
                   <div class="mb-3">
                        <label for="img2" class="form-label fs-09">Image 2</label>
                        <input type="file" id="img2Upload" class="form-control fs-09" accept=".png,.jpg,.jpeg" />
                    </div>
                    <div class="mb-3">
                        <label for="img3" class="form-label fs-09">Image 3</label>
                        <input type="file" id="img3Upload" class="form-control fs-09" accept=".png,.jpg,.jpeg" />
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
                        changes</button>
                    <button class="btn btn-primary fs-09">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop