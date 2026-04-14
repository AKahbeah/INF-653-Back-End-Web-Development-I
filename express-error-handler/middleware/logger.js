const fs = require("fs");

function logger(req, res, next) {
    const log = `${new Date().toISOString()} | ${req.method} | ${req.url}\n`;

    fs.appendFile("logs/requestLog.txt", log, (err) => {
        if (err) console.log("Logger error:", err);
    });

    next();
}

module.exports = logger;