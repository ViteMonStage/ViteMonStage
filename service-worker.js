var cacheName = 'testcache';
var appShellFiles = [
  'C:\Users\Paul DESPONT\Desktop\Projet WEB\ViteMonStage\php\candidature.php',
  '/candidature.php',
  '/companies_detail.php',
  '/companies.php',
  '/db.php',
  '/disconnect.php',
  '/footer.php',
  '/login_check.php',
  '/login.php',
  '/navbar.php',
  '/notification.php',
  '/offer_detail.php',
  '/offer.php',
  '/permissions.php',
  '/profile.php',
  '/search_user_sql.php',
  '/searchcompany.php',
  '/searchoffers.php',
  '/send_application.php',
  '/send_rating.php',
  '/send_trust.php',
  '/steps_manager.php',
  '/visible.php',
  '/wishlist.php',
  '/candidatures.php',
  '/companies.php',
  '/edit_profile.php',
  '/favicon.io',
  '/index.php',
  '/legal_terms.php',
  '/login.php',
  '/offers_detail.php',
  '/offers.php',
  '/profile_user.php',
  '/search_user.php',
  '/wishlist.php',
  '/candidatures.scss',
  '/companies_details.scss',
  '/companies.scss',
  '/edit_profile.scss',
  '/global.scss',
  '/index.scss',
  '/login.scss',
  '/offers_details.scss',
  '/offers.scss',
  '/profile_user.scss',
  '/search_user.scss',
  '/wishlist.scss',
  '/candidatures.scss',
  '/companies_detail.js',
  '/login.js',
  '/notifications.js',
  '/profile_user.js',


];


self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.addAll(appShellFiles);
    })
  );
});



self.addEventListener('fetch', (e) => {
  e.respondWith(
    caches.match(e.request).then((r) => {
          console.log('[Service Worker] Récupération de la ressource: '+e.request.url);
      return r || fetch(e.request).then((response) => {
                return caches.open(cacheName).then((cache) => {
          console.log('[Service Worker] Mise en cache de la nouvelle ressource: '+e.request.url);
          cache.put(e.request, response.clone());
          return response;
        });
      });
    })
  );
});
