### README - LOOPIS FAQ

LOOPIS FAQ plugin creates:

custom post type for FAQ entries: 'faq', temporary slug: faqs

**Templates:** archive-faq.php, single-faq.php
**URL:s:** /faqs/ -> archive-faq.php, /faqs/post -> single-faq.php

custom taxonomy, hierarchical categories: faq_kategori (slug: faq-kategori)

**Templates:** "WIP: taxonomy-faq.php ?"
**URL:s:** /faq_kategori/ -> 404, /faq_kategori/category -> taxomony-faq.php , example: /faq_kategori/instruktioner/
/faq_kategori/instruktioner/hur-man-blir-medlem redircts to /faqs/hur-man-blir-medlem
alternative URL: /?faq_kategori=instruktioner | /faqs/?faq_kategori=instruktioner

custom tags, nonhierarchical tags: faq_tag (slug: faq-tag)
**URLS:** /faq-tag/tag -> WIP

**Templates:** "WIP: taxonomy-faq.php ?"

**Redirects:** 

**"MVP templates":** archive-faq.php, single-faq.php
In theme-folder for templates: add two template files: cp page-faq.php archive-faq.php, cp page.php single-faq.php

After installation of plugin: Flush permalinks: Settings - Permalinks - Save Changes 
