const express = require('express')
const app = express()
const port = 5200
const db = require('./db');
const { v4: uuidv4 } = require("uuid");
const axios = require('axios');
const xml = require('xml');
const xmlbuilder = require('xmlbuilder2');


db.checkDatabaseAndCreateTable();

app.set('view engine', 'ejs')

app.use(express.json()); // for parsing application/json
app.use(express.urlencoded({ extended: true }));

app.post("/payment", (req, res, next) => {
    const data = req.body;
    csrf = data.csrf;

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

app.get("/payment/get/", async (req, res, next) => {
    let id = req.query.id;

    result = await db.query('SELECT method, bank, number, total FROM payment WHERE id = ?', [id]);

    if(result && result[0]) {
        payment_xml = {payment:result[0]};
    }

    const doc = xmlbuilder.create(payment_xml);
    payment_xml = doc.end({ prettyPrint: true });

    console.log(payment_xml);
    res.json({data: payment_xml});
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
        case 'card':
            res.render('payment-card', {total, id});
            break;
    }
});

app.post("/success", async (req, res, next) => {
    const data = req.body;
    
    result = await db.query('SELECT id as token, post_link, redirect_link, method FROM payment WHERE id = ?', [data.payment_id]);
    payment = result[0];
    data.token = payment.token;
    data.method = payment.method;

    if(data.number)
        await db.query('UPDATE payment SET number = ?  WHERE id = ?', [data.number, data.payment_id]);
    if(data.bank)
        await db.query('UPDATE payment SET bank = ? WHERE id = ?', [data.bank, data.payment_id]);
    console.log(data, payment.post_link);

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