const express = require('express');
const router = express.Router();

const { createBooking, getMyBookings, getBookingById } = require('../controllers/bookingController');

const protect = require('../middleware/authMiddleware');

// All booking routes are user-only (must be logged in)
router.post('/', protect, createBooking);
router.get('/', protect, getMyBookings);
router.get('/:id', protect, getBookingById);

module.exports = router;
