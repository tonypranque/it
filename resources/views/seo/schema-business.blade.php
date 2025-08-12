<!-- resources/views/seo/schema-local-business.blade.php -->
<script type="application/ld+json">
@verbatim
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "KarjalaTech",
          "image": "{{ asset('images/logo.jpg') }}",
  "url": "https://karjalatech.ru",
  "telephone": "+7-921-755-12-34",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ул. Красная, д. 6",
    "addressLocality": "Петрозаводск",
    "addressRegion": "Республика Карелия",
    "postalCode": "185035",
    "addressCountry": "RU"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "61.7850",
    "longitude": "34.3422"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
      "opens": "09:00",
      "closes": "18:00"
    }
  ],
  "priceRange": "₽₽",
  "sameAs": [
    "https://vk.com/karjala_tech",
    "https://t.me/karjala_tech",
    "https://yandex.ru/maps/org/karjalatech/1234567890"
  ]
}
    @endverbatim
</script>
