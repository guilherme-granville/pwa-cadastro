self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open('todo-cache').then(function (cache) {
            return cache.addAll([
                '/',
                '/index.php',
                '/style.css',
                '/cadastro.svg',
                '/manifest.json',
                '/teste.html'
            ]);
        })
    );
});

self.addEventListener('fetch', function(event){
    event.respondWith(
        caches.match(event.request).then(function(response){
            return response || fetch(event.request);
        })
    );
});