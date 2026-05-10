// middleware/roleMiddleware.js
const adminOnly = (req, res, next) => {
  // Make sure req.user exists (protect middleware must run first)
  if (!req.user) {
    return res.status(401).json({ message: 'Not authorized, no user found' });
  }

  // Check user role
  if (req.user.role !== 'admin') {
    return res.status(403).json({ message: 'Admins only' });
  }

  // User is admin, proceed
  next();
};

module.exports = adminOnly;