# GoodBlox

A fan-made recreation of an older version of the Roblox gaming platform (circa 2008-2010), providing a "FREE Virtual World-Building Game" with avatar chat, 3D environments, and physics.

## Architecture

- **Language:** PHP 8.2
- **Database:** PostgreSQL (via Replit's built-in database, using PDO)
- **Web Server:** PHP built-in server with a custom `router.php` for URL rewriting
- **Frontend:** HTML, CSS, JavaScript (no build step)

## Project Structure

- `/inc/` - Core includes: db.php (database connection), config.php (site config + session), header.php, footer.php, nav.php, alerts.php, functionsapi.php
- `/api/` - Backend API endpoints for game client and avatar rendering
- `/Login/` - Registration (NewAge.php) and password recovery
- `/My/` - User-specific pages (Home, Inbox, Settings, Avatar customization)
- `/Forum/` - Forum system
- `/admin/` - Administration tools
- `/Game/` - Game server interaction
- `/asset/` - Asset storage and retrieval
- `/Thumbs/` - Generated thumbnails
- `router.php` - Custom URL router for the PHP built-in server (handles .aspx, .ashx, .html → .php rewrites)

## Database

Uses Replit's built-in PostgreSQL database. Connection details via environment variables:
- `PGHOST`, `PGPORT`, `PGUSER`, `PGPASSWORD`, `PGDATABASE`

Key tables: `users`, `global`, `catalog`, `assets`, `owneditems`, `owned_items`, `games`, `gamesvisits`, `friends`, `messages`, `forumgroups`, `topics`, `forum`, `comments`, `reports`, `achievements`, `owned_achievements`, `wearing`, `pageviews`, `limited_sales`, `avatar_cache`

## Running

The workflow runs: `php -S 0.0.0.0:5000 /home/runner/workspace/router.php`

## Key Notes

- Original project used MySQL; migrated to PostgreSQL. MySQL backtick syntax has been converted to standard SQL.
- `VALUES (NULL, ...)` auto-increment inserts have been updated to omit the id column for PostgreSQL SERIAL compatibility.
- `LIMIT x,y` MySQL syntax replaced with `LIMIT y OFFSET x` PostgreSQL syntax.
- Original external MySQL database at `mysql.serv00.com` has been replaced with Replit's built-in PostgreSQL.
- `.htaccess` URL rewriting (for Apache) is handled by `router.php` instead.
