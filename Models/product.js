
const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const SchemaProduct = new Schema({
    name: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    price: {        
        type: Number,
        required: true
    },
    quntity: {
        type: Number,
        required: true
    },
    image: {
        type: String,
        required: true
    },
  
});

module.exports = mongoose.model('Product', SchemaProduct);