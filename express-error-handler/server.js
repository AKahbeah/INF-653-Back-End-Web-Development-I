const express = require("express");
const app = express();

// Import middleware
const logger = require("./middleware/logger");
const errorHandler = require("./middleware/errorHandler");

// Built-in middleware
app.use(express.json());

// Custom logger middleware (runs first)
app.use(logger);

//
// ✅ Basic route (home)
//
app.get("/", (req, res) => {
    res.send("Express server is running!");
});

//
// ✅ Normal route (no error)
//
app.get("/hello", (req, res) => {
    res.json({
        message: "Hello! This route is working fine.",
    });
});

//
// ❌ TEST ROUTE THAT FORCES AN ERROR
//
app.get("/error-test", (req, res) => {
    throw new Error("This is a forced test error!");
});

//
// ❌ ASYNC ERROR EXAMPLE (proper Express style)
//
app.get("/async-error", (req, res, next) => {
    try {
        // This will crash JSON parsing intentionally
        JSON.parse("{ invalid json }");
    } catch (err) {
        next(err); // sends error to errorHandler middleware
    }
});

//
// ⚠️ ERROR HANDLER (MUST BE LAST)
//
app.use(errorHandler);

//
// 🚀 START SERVER
//
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});