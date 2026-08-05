# Gleamly Website

Premium, enquiry-generating website for **Gleamly** — cleaning services across East & Southeast London.

## Local setup (XAMPP)

1. Ensure Apache + PHP are running in XAMPP.
2. Open: http://localhost/gleamly/
3. Before going live, edit `includes/config.php`:
   - Set `SITE_URL` to `https://gleamly.uk`
   - Change admin password hash
   - Replace `G-XXXXXXXXXX` in `includes/header.php` with your GA4 Measurement ID

## Admin panel

- URL: http://localhost/gleamly/admin/
- Username: `admin`
- Password: `gleamly2026` *(change immediately)*

Enquiries from the Quote and Contact forms appear in the admin dashboard and are stored in `data/quotes.json`. Uploaded photos go to `assets/uploads/`.

## Pages included

- Homepage, How it works, Pricing, Reviews, About, FAQ, Contact
- 4 service pages: Home, Business, Deep, End of Tenancy
- Request a Quote (photo upload + CSRF + honeypot spam protection)
- Instant price estimator (non-binding)
- Privacy, Terms, Thank you, branded 404
- WhatsApp float + sticky mobile CTA bar
- SEO: meta tags, LocalBusiness/Service/FAQ schema, sitemap.xml, robots.txt

## Production checklist

- [ ] Point domain / deploy files to hosting with SSL
- [ ] Update `SITE_URL` and GA4 ID
- [ ] Verify Google Search Console + submit sitemap
- [ ] Confirm `mail()` or SMTP for lead emails
- [ ] Change admin credentials
- [ ] Update RewriteBase in `.htaccess` if not in `/gleamly/` subfolder
