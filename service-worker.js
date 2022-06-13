self.addEventListener('install', (e) => {
    console.log('[Service Worker] Installation');
});

var cacheName = 'js13kPWA-v1';
var appShellFiles = [
  '/js13kPWA-v1/PWA/LOGO2.png',
  '/js13kPWA-v1/index.html',
];

