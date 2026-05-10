# Event Ticketing API

A simple REST API for an event ticketing system built with Node.js, Express, and MongoDB.

## Features

- User registration and login
- JWT authentication
- Admin-only event creation, update, and deletion
- User booking creation and history retrieval
- 404 and centralized error handling middleware

## Getting Started

### Prerequisites

- Node.js 18+ (or compatible)
- MongoDB connection string

### Installation

```bash
npm install
```

### Environment Variables

Create a `.env` file in the project root with the following values:

```env
PORT=5000
MONGO_URI=<your-mongodb-uri>
JWT_SECRET=<your-jwt-secret>
```

### Run Locally

```bash
npm run dev
```

or

```bash
npm start
```

The API will start on `http://localhost:5000` by default.

## API Routes

### Auth

- `POST /api/auth/register`
  - Register a new user
  - Body: `{ name, email, password }`

- `POST /api/auth/login`
  - Authenticate and return a JWT
  - Body: `{ email, password }`

### Events

- `GET /api/events`
  - Get all events
  - Optional query params: `category`, `date`

- `GET /api/events/:id`
  - Get event by ID

- `POST /api/events`
  - Create event (admin only)
  - Requires `Authorization: Bearer <token>`

- `PUT /api/events/:id`
  - Update event (admin only)
  - Requires `Authorization: Bearer <token>`

- `DELETE /api/events/:id`
  - Delete event (admin only)
  - Requires `Authorization: Bearer <token>`

### Bookings

- `POST /api/bookings`
  - Create a booking (authenticated user)
  - Requires `Authorization: Bearer <token>`
  - Body: `{ eventId, quantity }`

- `GET /api/bookings`
  - Get bookings for the authenticated user
  - Requires `Authorization: Bearer <token>`

- `GET /api/bookings/:id`
  - Get a single booking by ID (only the owner can access)
  - Requires `Authorization: Bearer <token>`

## Notes

- The `authMiddleware` protects authenticated routes and reads the JWT from the `Authorization` header.
- Admin-only routes use `roleMiddleware` to restrict access to users with the `admin` role.
- The app uses centralized error handling in `middleware/errorMiddleware.js`.

## Scripts

- `npm start` — run the app with Node
- `npm run dev` — run the app with Nodemon
