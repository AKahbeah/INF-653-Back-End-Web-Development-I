const mongoose = require('mongoose');

const eventSchema = new mongoose.Schema(
    {
        title: {
            type: String,
            required: true,
            trim: true
        },

        description: {
            type: String,
            default: ""
        },

        category: {
            type: String,
            default: ""
        },

        venue: {
            type: String,
            default: ""
        },

        date: {
            type: Date,
            required: true
        },

        time: {
            type: String,
            default: ""
        },

        seatCapacity: {
            type: Number,
            required: true,
            min: 1
        },

        bookedSeats: {
            type: Number,
            default: 0,
            min: 0
        },

        price: {
            type: Number,
            required: true,
            min: 0
        }
    },
    { timestamps: true }
);

module.exports = mongoose.model('Event', eventSchema);