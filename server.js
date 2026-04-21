require("dotenv").config();

const express = require("express");
const cors = require("cors");
const connectDB = require("./dbConfig");

const app = express();

// Middleware
app.use(express.json());
app.use(cors());

// Routes
app.use("/students", require("./routes/studentRoutes"));

// Connect DB and start server
connectDB().then(() => {
  app.listen(process.env.PORT, () => {
    console.log(`Server running on port ${process.env.PORT}`);
  });
});