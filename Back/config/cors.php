<?php
// CORS - Cross Origin Request Sharing 

// CORS is a mechanism that allows resources on a web page to be requested 
// from another domain outside the domain from which the first resource was served.

return [
    // Пути с которых можно делать cross-origin (разные адреса нп запрос между
    // http://localhost:5173 и http://localhost:8000 будет cross-origin)
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    // Допустимые методы для запросов
    'allowed_methods' => ['*'],
    // Допустимые origins - с каких доменов можно делать запросы
    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:5173')], 
    // Можно прописать regex для допустимых ориджинов
    'allowed_origins_patterns' => [],
    // Какие хедеры можно отправлять
    'allowed_headers' => ['*'],
    // Определяет какие хедеры можно дополнительно отправить на фронт
    'exposed_headers' => [],
    // Количество секунд для кеширования preflight запросов
    // Для development лучше 0, для production лучше 3600
    'max_age' => 0,
    // Добавляет в запросы credentials (cookies etc.)
    'supports_credentials' => true,
];