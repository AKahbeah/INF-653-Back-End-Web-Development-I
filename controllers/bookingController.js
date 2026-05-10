const Booking = require('../models/Booking');
const Event = require('../models/Event');
const validateBooking = require('../validators/bookingValidator'); // ✅ Use validator

// CREATE BOOKING (USER ONLY)
const createBooking = async (req, res, next) => {
    try {
        const { eventId, quantity } = req.body;

        // Validate booking input
        const errors = validateBooking(req.body);
        if (errors.length > 0) {
            return res.status(400).json({ errors });
        }

        // Validate event exists
        const event = await Event.findById(eventId);
        if (!event) {
            return res.status(404).json({ message: "Event not found" });
        }

        // Check available seats
        const availableSeats = event.seatCapacity - event.bookedSeats;
        if (quantity > availableSeats) {
            return res.status(400).json({ message: "Not enough seats available" });
        }

        // Create booking
        const booking = await Booking.create({
            user: req.user._id,
            event: eventId,
            quantity
        });

        // Update booked seats
        event.bookedSeats += quantity;
        await event.save();

        res.status(201).json(booking);

    } catch (error) {
        next(error);
    }
};

// GET ALL BOOKINGS FOR LOGGED-IN USER
const getMyBookings = async (req, res, next) => {
    try {
        const bookings = await Booking.find({ user: req.user._id })
            .populate('event');

        res.json(bookings);

    } catch (error) {
        next(error);
    }
};

// GET SINGLE BOOKING (ONLY OWNER)
const getBookingById = async (req, res, next) => {
    try {
        const booking = await Booking.findById(req.params.id)
            .populate('event');

        if (!booking) {
            return res.status(404).json({ message: "Booking not found" });
        }

        // Ownership check
        if (booking.user.toString() !== req.user._id.toString()) {
            return res.status(403).json({ message: "Access denied" });
        }

        res.json(booking);

    } catch (error) {
        next(error);
    }
};

module.exports = {
    createBooking,
    getMyBookings,
    getBookingById
};