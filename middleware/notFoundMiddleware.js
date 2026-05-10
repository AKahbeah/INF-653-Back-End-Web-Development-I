// middleware/notFoundMiddleware.js
const notFound = (req, res, next) => {
  res.status(404);

  if (req.headers.accept && req.headers.accept.includes('text/html')) {
    return res.send('<h1>404 - Page Not Found</h1>');
  }

  return res.json({ error: '404 Not Found' });
};

module.exports = notFound;