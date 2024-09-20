const express = require('express')
const app = express()
const port = 5200
const db = require('./db');
const { v4: uuidv4 } = require("uuid");
const axios = require('axios');


db.checkDatabaseAndCreateTable();

app.set('view engine', 'ejs')

app.use(express.json()); // for parsing application/json
app.use(express.urlencoded({ extended: true }));

app.post("/payment", (req, res, next) => {
    const data = req.body;

    let uuid = uuidv4()
    db.insertRecord('payment', {
        id:uuid,
        total: data.total,
        method:data.method,
        post_link:data.post_link,
        redirect_link:data.redirect_link,
    })
    
    res.json({
        "url":`http://localhost:${port}/payment-details/${uuid}`,
    });
});

app.get("/payment-details/:id", async (req, res, next) => {
    const data = req.body;
    let id = req.params.id;

    result = await db.query('SELECT total, method FROM payment WHERE id = ?', [id]);

    payment = result[0];
    total = parseFloat(payment.total).toFixed(2)
    switch(payment.method) {
        case 'tng':
            res.render('payment-tng', {total, id});
            break;
        case 'fpx':
            res.render('payment-fpx', {total, id});
            break;
        case 'bank':
            res.render('payment-bank', {total, id});
            break;
    }
});

app.post("/success", async (req, res, next) => {
    const data = req.body;
    
    console.log(data);
    result = await db.query('SELECT post_link, redirect_link FROM payment WHERE id = ?', [data.payment_id]);
    payment = result[0];

    axios.post(payment.post_link, data)
        .then((response) => {
            console.log('Response:', response.data);
            res.redirect(payment.redirect_link);
        })
        .catch((error) => {
            console.error('Error:', error.message);
            res.redirect(payment.redirect_link);
        });

});

app.listen(port, ()=> console.log(`Web service app listening on http://localhost:${port}`))