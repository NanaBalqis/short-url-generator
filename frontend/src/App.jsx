import { useState } from "react";
import "./App.css";

function App() {
  const [originalUrl, setOriginalUrl] = useState("");
  const [shortUrl, setShortUrl] = useState("");
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);

  const handleShorten = async (e) => {
    e.preventDefault();

    setError("");
    setShortUrl("");
    setLoading(true);

    try {
      const response = await fetch("http://localhost:8080/api/shorten", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          original_url: originalUrl
        })
      });

      const data = await response.json();

      if (data.success) {
        setShortUrl(data.short_url);
        setOriginalUrl("");
      } else {
        setError(data.message);
      }
    } catch (err) {
      setError("Unable to connect to the server.");
    }

    setLoading(false);
  };

  return (
    <div className="page">
      <div className="card">
        <h1>Short URL Generator</h1>
        <p>Convert long URLs into short and shareable links.</p>

        <form onSubmit={handleShorten}>
          <input
            type="text"
            placeholder="Enter long URL..."
            value={originalUrl}
            onChange={(e) => setOriginalUrl(e.target.value)}
          />

          <button type="submit" disabled={loading}>
            {loading ? "Generating..." : "Shorten URL"}
          </button>
        </form>

        {error && <div className="error">{error}</div>}

        {shortUrl && (
          <div className="result">
            <p>Your short URL:</p>
            <a href={shortUrl} target="_blank" rel="noreferrer">
              {shortUrl}
            </a>
          </div>
        )}
      </div>
    </div>
  );
}

export default App;