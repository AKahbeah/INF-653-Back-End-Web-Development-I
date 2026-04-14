const fs = require("fs");
const path = require("path");

function errorHandler(err, req, res, next) {
    const logFilePath = path.join(__dirname, "../logs/errorLog.txt");

    const log = `
========================
Time: ${new Date().toISOString()}
Error Name: ${err.name}
Error Message: ${err.message}
========================\n`;

    fs.appendFile(logFilePath, log, (fileErr) => {
        if (fileErr) console.log("Error logging failed:", fileErr);
    });

    res.status(500).json({
        success: false,
        message: "Internal Server Error",
    });
}

module.exports = errorHandler;