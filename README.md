README

LOOPIS FAQ plugin creates:

custom post type for FAQ entries: 'faq', temporary slug: faqs

Templates: archive-faq.php, single-faq.php
URLs: /faqs/ -> archive-faq.php, /faqs/post -> single-faq.php

custom taxonomy, hierarchical categories: faq_kategorier (slug: faq-kategorier)

Templates: "WIP: taxonomy-faq.php ?"
URLs: /faq_kategorier/ -> 404, /faq_kategorier/category -> taxomony-faq.php , example: /faq_kategorier/instruktioner/
/faq_kategorier/instruktioner/hur-man-blir-medlem redircts to /faqs/hur-man-blir-medlem
alternative URL: /?faq_kategorier=instruktioner

custom tags, nonhierarchical tags: faq_tag (slug: faq-tag)
URLS: /faq-tag/tag -> WIP

Templates: "WIP: taxonomy-faq.php ?"

"MVP templates": archive-faq.php, single-faq.php 
