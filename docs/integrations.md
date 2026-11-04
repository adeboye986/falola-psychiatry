# External Integration Feasibility

Audit date: 2026-11-04

## Assessment principles

- Use only provider-documented links, widgets, embeds, or APIs.
- Never proxy, scrape, frame, or otherwise bypass `X-Frame-Options`, Content Security Policy, authentication, anti-bot controls, or patient-portal boundaries.
- Do not transmit protected health information (PHI), appointment reasons, diagnoses, or other medical data until the practice has approved the workflow, contracts, access controls, retention, and compliance obligations.
- Phase 1 records feasibility only. No production integration, credential, payment, or data collection is enabled.

## Decision summary

| Function | Current provider/destination | Supported options found | Phase 1 recommendation |
| --- | --- | --- | --- |
| Appointment scheduling | Tebra/Kareo scheduler on CloudFront | Direct link; Tebra-documented inline iframe URL; Tebra-documented popup widget script | Keep a placeholder. After account confirmation, prefer the official widget or a clearly labeled external link. |
| Patient portal | Tebra/Kareo Patient Portal | Secure external portal; no public cross-origin embed mechanism found | External link only. Do not iframe. |
| Initial/follow-up payment | Stripe Payment Links | Hosted link; provider-generated Buy Button; Payment Links API | Do not connect until fees and healthcare/payment workflow are approved. |
| Wix booking | Wix Bookings | Existing Wix service/calendar flow | Do not migrate the `$1` test/incomplete service. Retire through a planned cutover. |
| Publications | ResearchGate profile | External profile links | External link only; do not scrape/import or iframe. |
| News article | PsychiatryOnline DOI page | External article link | External link only. |
| Contact form | Wix Forms | Wix-managed form only; public data flow not discoverable | Do not recreate until a minimal, approved, secure form workflow is specified. |
| Insurance/payment claims | Static Wix content | No integration identified | Treat as approved content, not live verification. Confirm manually before publication. |

## Tebra appointment scheduling

### Existing first-party destination

`https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057`

The public endpoint responded during the audit. The practice key appears in the URL and is intended for the public scheduling experience, but account ownership and the active appointment configuration must be confirmed with the practice.

### Official support

Tebra's Scheduling Widget documentation describes three supported implementations:

1. A direct scheduling URL.
2. The direct scheduling URL used as an iframe source for an embedded scheduler.
3. Tebra's generated embed code for a button that opens the scheduler in a popup.

Official documentation: `https://helpme.tebra.com/Platform/Practice_Settings/Scheduling_Widget/Scheduling_Widget`

Tebra notes that availability depends on the applicable product/service configuration. The production account must generate the final code; copying code from another site is not sufficient validation.

### Feasibility decision

- **Feasible after approval:** official Tebra popup widget, documented inline iframe, or direct external link.
- **Preferred starting option:** official popup widget or external link, because either keeps the clinical scheduling interaction visibly within the vendor workflow and is simpler to isolate from the marketing site.
- **Required before connection:** verify practice key, account ownership, appointment types, fees, locations, insurance/self-pay language, consent, vendor contract/business-associate terms, analytics behavior, accessibility, and failure/fallback behavior.
- **Not permitted:** reverse proxying the scheduler, scripting its internal DOM, hiding the vendor origin, or working around future framing/security headers.

## Tebra patient portal

### Existing first-party destination

`https://portal.kareo.com/pp-webapp/app/new/login`

The legacy label says the portal is for existing patients only.

### Official support and observed controls

Tebra documents Patient Portal as a separate secure browser experience for patients. No official public embed/widget mechanism was found. The portal's live response presented anti-bot controls and `X-Frame-Options: SAMEORIGIN`, which prevents embedding it into this Laravel origin.

Official documentation: `https://helpme.tebra.com/Clinical/Patient_Management/Patient_Portal/Patient_Experience%3A_Patient_Portal`

### Feasibility decision

- **Supported:** a clearly labeled external link that opens the Tebra portal.
- **Not supported:** iframe embedding, credential capture on the Laravel site, single-sign-on assumptions, URL masking, or header bypass.
- **Required before connection:** confirm the exact portal URL and account, write approved enrollment/support copy, state that the link leaves the practice website, and include approved emergency guidance.

## Tebra APIs

Tebra documents SOAP-based APIs for practice-management integrations, including appointment and patient operations. Access uses customer/application credentials. The documentation states that webhooks are not available.

Official documentation: `https://helpme.tebra.com/Tebra_PM/12_API_and_Integration`

### Feasibility decision

- An API integration is technically possible but unnecessary for the Phase 1 marketing foundation.
- It would substantially increase security, privacy, operational, testing, and compliance scope because it may create or retrieve patient and appointment data.
- Do not add credentials, API calls, background synchronization, or a local patient-data store without a separately approved architecture and minimum-necessary data specification.

## Stripe Payment Links

### Existing first-party destinations

- Initial evaluation label (`$350`): `https://buy.stripe.com/14k3ew1Qa70432E9AB`
- Follow-up visit label (`$160`): `https://buy.stripe.com/dR6g1i1Qa98c5aMfZ0`

These amounts conflict with the office policy page (`$300` and `$175`).

### Official support

Stripe documents hosted Payment Link sharing, an embeddable Buy Button generated from a Payment Link, and Payment Links APIs.

- Sharing and Buy Button: `https://docs.stripe.com/payment-links/share`
- API overview: `https://docs.stripe.com/payment-links/api`
- Restricted-business guidance: `https://stripe.com/legal/restricted-businesses`

Stripe identifies telemedicine/telehealth among healthcare categories subject to additional review in its restricted-business guidance. Contract/account eligibility must be confirmed directly with Stripe; this audit does not determine it.

### Feasibility decision

- **Technically feasible after approval:** external hosted Payment Links or Stripe's generated Buy Button.
- **Do not implement yet:** prices conflict, and the purpose/timing of payment relative to scheduling is unclear.
- **Required before connection:** confirm merchant account ownership, accepted appointment types and prices, refund/cancellation policy, tax/receipt behavior, what metadata/custom fields are collected, and the practice's healthcare/privacy requirements.
- **Data minimization:** do not include diagnosis, medication, treatment reason, or other medical details in Payment Link parameters, descriptions, custom fields, or internal metadata without an approved compliance design.

## Wix Bookings and plans

### Existing destinations

- Service page: `https://www.falolapsychiatry.com/service-page/return-client-session`
- Calendar: `https://www.falolapsychiatry.com/booking-calendar/return-client-session`
- Plans: `https://www.falolapsychiatry.com/plans-pricing`

The service shows one hour, `$1`, `Location 1`, and no description. The pricing page shows `$169/month` Family and `$99/month` Individual plans with generic Wix placeholder benefits.

### Feasibility decision

- These pages appear incomplete or test-like and must not be treated as authoritative production integrations.
- Do not embed or reproduce them.
- Confirm whether any real bookings or memberships depend on Wix before retiring old URLs, then create a cutover/redirect plan that does not strand existing patients.

## ResearchGate publications

### Existing destination

`https://www.researchgate.net/profile/Michael-Falola`

The public profile was accessible to the audit crawler. No provider-supported profile widget or public API suitable for this website was identified, and the live site uses same-origin framing controls.

### Feasibility decision

- Link externally to an approved profile if desired.
- Do not iframe, scrape, periodically copy, or depend on mutable counts such as reads/citations.
- For an on-site publication list, obtain a physician-approved bibliography and store only the curated citation data needed for display, with stable DOI/publisher links.

## PsychiatryOnline news link

### Existing destination

`https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26`

The live destination returned an anti-bot response during direct checking and set same-origin framing controls. No supported embed or relevant public API was identified.

### Feasibility decision

- Use a normal external link only after confirming the article is the intended item and the title/description are accurate.
- Do not iframe, mirror, or bypass publisher protections.

## Contact form and communications

The legacy Wix form collects first name, last name, email, phone, and a free-text message. Public inspection could not establish its recipient, storage, retention, encryption, spam processing, deletion workflow, or contractual safeguards. The nearby copy asks visitors to leave or email a name and phone number, but does not display a warning against medical or emergency information.

### Feasibility decision

- No form is implemented in Phase 1.
- Before implementation, approve a narrowly defined purpose, minimal fields, recipient, encrypted transport, access controls, retention/deletion schedule, spam protection, consent/privacy notice, accessibility, audit behavior, and incident process.
- Display an approved warning not to submit emergencies or sensitive medical information if the form is not designed and contracted for that use.
- Do not send form submissions containing sensitive information through ordinary email by default.
- The website must never present a public contact form as a patient portal or emergency channel.

## Security and compliance gates

Before any production connection:

1. Confirm vendor/account ownership and authoritative production URLs.
2. Obtain practice approval of the exact data flow and minimum data collected.
3. Complete required vendor, privacy, security, and business-associate review.
4. Resolve fee, appointment-type, location, insurance, and policy conflicts.
5. Confirm authentication boundaries and prohibit local capture of portal credentials.
6. Define analytics/cookie behavior so sensitive query strings, page events, and form values are not disclosed.
7. Add accessible link/widget behavior, vendor-outage fallback, and support instructions.
8. Test security headers as delivered; if framing is refused, use an external link rather than a workaround.
9. Keep secrets only in environment configuration or a secrets manager, never in source control.
10. Document owner, review date, and retirement process for each integration.

## Phase 1 implementation status

- No scheduler, portal, payment, booking, publication feed, contact form, analytics, or patient-data API is connected.
- Placeholder pages make the proposed information architecture testable without suggesting that unapproved systems are live.
- Production integrations require explicit Phase 2 approval and the gates above.
