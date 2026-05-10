const express = require('express');
const router = express.Router();

const { createEvent, getEvents, getEventById, updateEvent, deleteEvent } = require('../controllers/eventController');

const protect = require('../middleware/authMiddleware');
const adminOnly = require('../middleware/roleMiddleware');

// Public routes
router.get('/', getEvents);
router.get('/:id', getEventById);

// Admin routes (must be logged in and admin)
router.post('/', protect, adminOnly, createEvent);
router.put('/:id', protect, adminOnly, updateEvent);
router.delete('/:id', protect, adminOnly, deleteEvent);

module.exports = router;