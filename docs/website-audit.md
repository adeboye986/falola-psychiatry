# Falola Psychiatry Practice Website Audit

Audit date: 2026-11-04

## Scope and evidence rules

- First-party facts are transcribed from pages or public assets served by `https://www.falolapsychiatry.com`.
- The bare domain redirects to the `www` host. Wix currently serves the public site.
- Search results and third-party profiles are discovery aids only and are marked unverified.
- Missing facts are not inferred. Clinical claims, credentials, insurance participation, fees, and testimonials require owner approval before publication.
- The audit records the legacy site; it does not endorse its claims, policies, legal language, or security practices.

## Technical environment

| Component | Finding |
| --- | --- |
| PHP | 8.5.0 locally; application requires `^8.3` |
| Composer | 2.8.12 |
| Laravel | 13.40.0; `laravel/framework` constraint `^13.17` |
| Testing | PHPUnit 12.5.43 |
| Node | Not installed on the host; official Node 22.23.4 was checksum-verified and used from `/tmp` for Phase 1 |
| Frontend build | Vite 8, `laravel-vite-plugin` 3.x |
| CSS | Tailwind CSS 4 via `@tailwindcss/vite`; CSS-first configuration in `resources/css/app.css` |
| JavaScript | Alpine.js added as the only application runtime dependency |
| Database | SQLite is the default local connection; sessions, cache, and queues use database drivers |
| Views | Blade, with `resources/views/welcome.blade.php` as the original starter view |

## Domain and platform

| URL | Result | Status |
| --- | --- | --- |
| `https://falolapsychiatry.com/` | Redirects to the `www` URL | Verified by HTTP response |
| `https://www.falolapsychiatry.com/` | Public Wix site | Verified |
| `https://www.falolapsychiatry.com/sitemap.xml` | Sitemap index | Verified |
| `https://www.falolapsychiatry.com/pages-sitemap.xml` | Lists the home, pricing, policy, and booking pages | Verified |
| `https://www.falolapsychiatry.com/booking-services-sitemap.xml` | Lists one Wix booking service | Verified |

## Discoverable page inventory

| Page | Source URL | Discoverability | Notes |
| --- | --- | --- | --- |
| Home | `https://www.falolapsychiatry.com/` | Navigation and sitemap | Main public content, biography, services, testimonial, contact form, and footer |
| Office & Fees Policies | `https://www.falolapsychiatry.com/office-fees-policies` | Navigation and sitemap | Detailed operational, payment, controlled-medication, telehealth, privacy, and dismissal language |
| Plans & Pricing | `https://www.falolapsychiatry.com/plans-pricing` | Sitemap only | Appears unfinished; contains generic template text |
| Book a Session | `https://www.falolapsychiatry.com/book-a-session` | Sitemap only | Two Stripe Payment Links and one Wix booking service |
| Return Client Session | `https://www.falolapsychiatry.com/service-page/return-client-session` | Booking sitemap | One-hour service, `$1`, `Location 1`, no description |
| Booking calendar | `https://www.falolapsychiatry.com/booking-calendar/return-client-session` | Linked by service page | Wix booking flow; no implementation is copied |
| Our Physician | Home-page anchor | Main navigation | Not a standalone page |
| Leave A Message | Home-page anchor | Main navigation | Contact-form section, not a standalone page |

No other first-party pages were found in the published sitemaps. Search-discovered profiles on Tebra, Zocdoc, Doximity, and similar sites are third-party content and are not approved content sources.

## Home-page inventory

### Headings and introductory content

- “For as he thinketh in his heart, so is he ...Prov 23:7”
- “Mental Health Care” / “When You Need It”
- “Comprehensive and Compassionate Care with focus on empathy and respect. Flexible Hours, Anywhere in Alabama (via Telepsychiatry)”

### Insurance names shown

The site displays: Medicare, United Health care, Blue Cross Blue Shield, Aetna, Curative, Cigna, ChampVa, and Viva. The page does not describe plan-level participation, network status, referral rules, or effective dates. All names must be reconfirmed before reuse.

### Telepsychiatry statements

1. “Involves the use of interactive video and audio communications to enable the physician to connect with individuals.”
2. “Provides you easy and faster access to mental health care from the comfort of your home.”
3. “To see one of our physicians, you must be physically located anywhere in Alabama.”

### Services named

- ADHD
- Anxiety
- Depression
- Bipolar Disorders
- Trauma
- OCD
- Addiction
- Schizophrenia
- Brief Psychotherapies
- Academic Coaching

The legacy site provides names and imagery but no substantive service descriptions, eligibility criteria, treatment claims, or emergency guidance.

### Physician biography

The home page identifies Michael Falola, M.D., M.P.H. and presents a biography, training awards, research interests, and an employment timeline. The complete transcription is preserved in `docs/content-inventory.md`. Credentials, awards, dates, affiliations, board status, and current appointments have not been independently credentialed for this project.

### Testimonial

One attributed testimonial is published: Danny, April 01 2025. Its complete text and source are preserved in `docs/content-inventory.md`. Reuse requires confirmation of consent, authenticity, applicable advertising rules, and whether the attribution should remain public.

### Appointment instructions

- Call `659 346 6314` and leave a name and phone number; the site states a callback will occur within 24 business hours.
- Email `contact@falolapsychiatry.com` with a name and phone number.
- Email `mfalola@falolapsychiatry.com` with a name and phone number.

These instructions invite personal information over voicemail and ordinary email. They are inventory only and are not implemented in the new foundation.

### Contact details

| Item | Legacy value | Verification note |
| --- | --- | --- |
| Main phone | `659 346 6314` | First-party footer and appointment copy |
| Fax | `949 703 8754` | First-party footer |
| General email | `contact@falolapsychiatry.com` | First-party appointment copy |
| Physician email | `mfalola@falolapsychiatry.com` | First-party appointment copy and footer |
| Primary Office | `289 Glen Cross Dr, Trussville, AL 35173` | First-party footer |
| Service Location #1 | `3516 Vann Road Suite 114-A Trussville, AL 35235` | First-party footer; third-party results show ZIP 35173, so confirm |

A search result associated with an organization listing showed `205-201-1502`, conflicting with the first-party phone. It is not treated as verified.

### Forms and integrations

- Contact form fields: required first name, optional last name, required email, optional phone, message, submit.
- No visible warning asks users not to submit medical or emergency information.
- Appointment scheduler: `https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057`.
- Patient portal: `https://portal.kareo.com/pp-webapp/app/new/login`.
- Publications: `https://www.researchgate.net/profile/Michael-Falola`.
- News link: `https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26`.

The form's recipient, storage, retention, consent behavior, spam controls, and business-associate coverage were not publicly discoverable.

## Office and fees policy inventory

The policy page contains these sections; exact publishable copy is retained in `docs/content-inventory.md`:

- Check-in: identification, demographic/insurance changes, copays, deductible deposits, self-pay fees, balances, returned checks, and accepted payment methods.
- No-show/late cancellation: 72-hour notice, late-arrival threshold, and appointment-value fee language.
- Telehealth: audio/video requirements, possible in-person care, day-of instructions, late courtesy reminder, and Alabama physical-location requirement.
- Refills: recent-visit requirement, 48–72-hour processing, appointment requests, and restrictions after missed visits or outside business hours.
- Treatment access and safety: two-business-day nonurgent response language, emergency-room/911 directions, and urgent scheduling language.
- Controlled medications: visit intervals, lost medication, random urine testing, database queries, and prescriber discretion.
- Telehealth prescribing: possible annual in-person visit and a quoted federal telemedicine-flexibility statement.
- Laboratory and drug testing: testing conditions, costs, refill holds, and random pill counts.
- Documents and records: form fees, physician-to-physician faxing, patient-copy charges, and absence notes.
- Dismissal: effects, medication transition language, causes, and notice method.
- Privacy/HIPAA: staff access, disclosure exceptions, billing/collection disclosures, releases, and minor confidentiality language.

The federal prescribing statement was current at the audit date: DEA and HHS extended relevant telemedicine flexibilities through December 31, 2026. It expires soon and must receive legal/compliance review rather than being copied as evergreen text.

## Pricing conflicts

| Source | Amount shown | Status |
| --- | --- | --- |
| Office policy page | New consultation `$300`; follow-up `$175` | Public first-party content |
| Book a Session Stripe links | Initial evaluation `$350`; follow-up `$160` | Public first-party links |
| Return Client Session | `$1` for one hour | Likely test or incomplete configuration; unverified |
| Plans & Pricing | Family Plan `$169/month`; Individual Plan `$99/month` | Contains placeholder benefits; likely unfinished |

No price should be published or connected to payment until the practice resolves these conflicts in writing.

## Asset inventory

All assets are hosted by Wix. Ownership, model releases, stock licenses, accessibility text, and permission to migrate must be confirmed.

| Placement | Legacy asset URL |
| --- | --- |
| Pink/cream hero image | `https://static.wixstatic.com/media/11062b_0d444309c6d7432aa53c81e5c65ce9bb~mv2.jpg` |
| Practice logo | `https://static.wixstatic.com/media/5100b5_05a8ad81655240f98621b5cbf33961dc~mv2.png` |
| Intro decorative image | `https://static.wixstatic.com/media/11062b_77378e4c3a0347d4a47232127ec77e33~mv2.jpg` |
| Therapy image | `https://static.wixstatic.com/media/11062b_cf764b96d65b470fbf6f9040085bb0bb~mv2.jpg` |
| Telehealth image | `https://static.wixstatic.com/media/11062b_5a1b24b4f65b4509bf2735768e8d34d7~mv2.jpg` |
| Woman using telehealth | `https://static.wixstatic.com/media/11062b_fed102f0c3a04f9b87857dc30a63d395~mv2.jpg` |
| Physician headshot | `https://static.wixstatic.com/media/5100b5_ae59fcb0816c4194a84db97801c9bba7~mv2.png` |
| Physician photograph | `https://static.wixstatic.com/media/5100b5_74fd0124c83b4a5c967ce3ccd20b0253~mv2.jpg` |
| Testimonial image | `https://static.wixstatic.com/media/c22c23_4eb250d14a68496b99cbd6b221e1e05d~mv2.jpg` |
| ADHD | `https://static.wixstatic.com/media/nsplsh_3664304a4d376972423251~mv2_d_4032_3024_s_4_2.jpg` |
| Anxiety | `https://static.wixstatic.com/media/11062b_ffa22446565b4e7b936882c7e0bcd9f6~mv2.jpg` |
| Depression | `https://static.wixstatic.com/media/23c6ed_831fc1cf38ae4b64a41398677691934f~mv2.jpg` |
| Bipolar disorders | `https://static.wixstatic.com/media/11062b_f898532e013b44648a96ec1be18e7b50~mv2.jpg` |
| Trauma | `https://static.wixstatic.com/media/11062b_c2251be052f7452f9b66c7d7100b46fe~mv2.jpg` |
| OCD | `https://static.wixstatic.com/media/11062b_ac80685d889b4b8bba5a0110e7f51f80~mv2.jpg` |
| Addiction | `https://static.wixstatic.com/media/4d59ca_e74ac0b55c5d4b8f803684be5bf42388~mv2.jpg` |
| Schizophrenia | `https://static.wixstatic.com/media/11062b_0ef788a422b049208bf4989c7173e338~mv2.jpg` |
| Brief psychotherapies | `https://static.wixstatic.com/media/11062b_491195a5776640d6896e42f3101a8406~mv2.jpg` |
| Academic coaching | `https://static.wixstatic.com/media/11062b_b9729b02ac4f45c89dd94e930444b32a~mv2.jpg` |
| Return Client Session | `https://static.wixstatic.com/media/11062b_99ca3d13b67c404cae55a2637906a739~mv2.jpg` |

No downloadable PDF or other first-party document was found in the sitemaps or visible page links.

## Proposed Laravel sitemap

| Page | Proposed path | Phase 1 state |
| --- | --- | --- |
| Home | `/` | Neutral placeholder |
| About | `/about` | Placeholder pending approved biography |
| Services | `/services` | Placeholder |
| Service detail | `/services/{service}` | Slug-constrained placeholder; no speculative service copy |
| Telepsychiatry | `/telepsychiatry` | Placeholder pending clinical/legal review |
| Patient Information | `/patient-information` | Placeholder pending policy approval |
| Appointments | `/appointments` | Placeholder; no live scheduler/payment connection |
| Patient Portal | `/patient-portal` | Placeholder; no live portal connection |
| Contact | `/contact` | Placeholder; no medical-data form |

## Open questions

1. What legal practice name and public brand name should appear?
2. Which physician name, degrees, licenses, board certifications, NPI details, affiliations, appointments, awards, and dates are approved and current?
3. Which service descriptions, populations, exclusions, treatment modalities, and clinical claims are approved?
4. Is care limited to adults, and are any age ranges excluded?
5. Which Alabama locations are active, and what is the correct ZIP for 3516 Vann Road?
6. Which phone, fax, and email addresses are current and appropriate for public use?
7. Which insurers and individual plans are currently accepted, and what verification disclaimer is required?
8. Which of the conflicting fee schedules is authoritative?
9. Are the membership plans and `$1` booking service test content that should be removed?
10. Is Tebra the approved booking and portal provider, and which practice-owned configuration should be used?
11. Should Stripe Payment Links remain, and has the practice approved their healthcare/compliance configuration?
12. What information may a public contact form collect, where will it be delivered, and what emergency/privacy warning is required?
13. Does the practice have a Notice of Privacy Practices and other approved downloadable documents?
14. Who owns each Wix-hosted image, and are stock licenses/model releases transferable?
15. Is the testimonial authentic, consented, compliant, and approved for migration?
16. Which publication entries and news links are approved? ResearchGate metadata is external and may be incomplete.
17. Who will review controlled-medication, telehealth, minor-confidentiality, cancellation, and dismissal language?
18. What emergency/crisis resources and geographic disclaimers are approved?
19. What accessibility, analytics, cookie, retention, and privacy requirements apply?
20. Which old URLs require redirects at launch?

## Phase 1 boundary

The Laravel application now contains only a minimal responsive-ready Blade/Tailwind/Alpine structure and placeholder routes. It does not reproduce the Wix visual design, publish disputed medical content, connect patient systems, accept payments, collect patient information, or add a CMS.
