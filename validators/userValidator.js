const validateUser = (data) => {
    const { name, email, password } = data;

    const errors = [];

    if (!name) errors.push("Name is required");

    const emailRegex = /\S+@\S+\.\S+/;
    if (!email || !emailRegex.test(email)) {
        errors.push("Valid email is required");
    }

    if (!password || password.length < 6) {
        errors.push("Password must be at least 6 characters");
    }

    return errors;
};

module.exports = validateUser;