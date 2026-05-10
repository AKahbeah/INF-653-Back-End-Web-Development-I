const validateEvent = (data) => {
    const { title, date, seatCapacity, price } = data;

    const errors = [];

    if (!title) errors.push("Title is required");

    if (!date) errors.push("Date is required");

    if (seatCapacity == null || seatCapacity <= 0) {
        errors.push("Seat capacity must be greater than 0");
    }

    if (price == null || price < 0) {
        errors.push("Price cannot be negative");
    }

    return errors;
};

module.exports = validateEvent;