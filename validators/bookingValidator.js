const validateBooking = (data) => {
    const { quantity } = data;

    const errors = [];

    if (!quantity || quantity <= 0) {
        errors.push("Quantity must be greater than 0");
    }

    return errors;
};

module.exports = validateBooking;