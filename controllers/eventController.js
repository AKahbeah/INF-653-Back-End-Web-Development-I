const Event = require('../models/Event');
const validateEvent = require('../validators/eventValidator'); // match your file

// CREATE EVENT (ADMIN ONLY)
const createEvent = async (req, res, next) => {
    try {
        // ✅ Validate input
        const errors = validateEvent(req.body);
        if (errors.length > 0) {
            return res.status(400).json({ errors });
        }

        // ✅ Create event
        const event = await Event.create(req.body);
        res.status(201).json(event);

    } catch (error) {
        next(error);
    }
};

// GET ALL EVENTS (with optional filters)
const getEvents = async (req, res, next) => {
    try {
        const filter = {};

        if (req.query.category) {
            filter.category = req.query.category;
        }

        if (req.query.date) {
            filter.date = new Date(req.query.date);
        }

        const events = await Event.find(filter);
        res.json(events);

    } catch (error) {
        next(error);
    }
};

// GET SINGLE EVENT
const getEventById = async (req, res, next) => {
    try {
        const event = await Event.findById(req.params.id);

        if (!event) {
            return res.status(404).json({ message: "Event not found" });
        }

        res.json(event);

    } catch (error) {
        next(error);
    }
};

// UPDATE EVENT (ADMIN ONLY)
const updateEvent = async (req, res, next) => {
    try {
        const event = await Event.findById(req.params.id);

        if (!event) {
            return res.status(404).json({ message: "Event not found" });
        }

        // ✅ Validate input (only if fields are being updated)
        const errors = validateEvent(req.body);
        if (errors.length > 0) {
            return res.status(400).json({ errors });
        }

        // prevent seatCapacity < bookedSeats
        if (req.body.seatCapacity && req.body.seatCapacity < event.bookedSeats) {
            return res.status(400).json({
                message: "seatCapacity cannot be less than booked seats"
            });
        }

        const updated = await Event.findByIdAndUpdate(req.params.id, req.body, { new: true });
        res.json(updated);

    } catch (error) {
        next(error);
    }
};

// DELETE EVENT (ADMIN ONLY)
const deleteEvent = async (req, res, next) => {
    try {
        const event = await Event.findById(req.params.id);

        if (!event) {
            return res.status(404).json({ message: "Event not found" });
        }

        await event.deleteOne();
        res.json({ message: "Event deleted successfully" });

    } catch (error) {
        next(error);
    }
};

module.exports = {
    createEvent,
    getEvents,
    getEventById,
    updateEvent,
    deleteEvent
};