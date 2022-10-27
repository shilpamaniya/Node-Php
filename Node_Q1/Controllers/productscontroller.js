        
const Product = require('../Models/product');
const mongoose = require('mongoose');

module.exports.addProduct = function (req, res) {
    var product = new Product();
    product.name = req.body.name;
    product.description = req.body.description;
    product.price = req.body.price;
    product.quntity = req.body.quntity;
    product.image = req.file.originalname;  
    
    product.save(function (err, doc) {
        if (!err) {
          
            res.redirect('/');
        }
        else {
            if (err.name == 'ValidationError') {
                res.render("addproduct", {
                    viewTitle: "Insert Product....",
                    product: req.body
                });
            }
            else
                console.log('record not inserted....  ' + err);
        }
    });
}

module.exports.showProduct = function (req, res) {
    Product.find(function (err, docs) {
            if (!err) {
                res.render("showproducts", {
                    products: docs
                });
            }
            else {
                console.log('record not display....' + err);
            }
    });
}
