Relay API

This is a Laravel-based API for managing individual relays and relay groups. It allows toggling relays, setting timers, and grouping relays for batch operations—ideal for home automation or IoT controlled systems.

⚙️ Features

- CRUD operations on relays
- Toggle relays with optional timers
- Create and toggle groups of relays
- API protected routes (Sanctum middleware)

## 🛠 Tech Stack

- PHP 8+
- Laravel 10+
- MySQL or compatible DB
- Composer
- Laravel Sanctum (for authentication)

## 🚀 Installation

```bash
git clone https://github.com/4chrlss/relayapi.git
cd relayapi
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate

📡 API Endpoints

🔌 Relay Management

Method | Endpoint                             | Description
GET    | /api/relay                           | List all relays
POST   | /api/relay                           | Create a new relay
GET    | /api/relay/{id}                      | Show a specific relay
PUT    | /api/relay/{id}                      | Update a relay
DELETE | /api/relay/{id}                      | Delete a relay
PATCH  | /api/relay/toggle/{id}               | Toggle relay ON/OFF
PATCH  | /api/relay/withtoggleRelayTimer/{id} | Toggle relay with a timer
