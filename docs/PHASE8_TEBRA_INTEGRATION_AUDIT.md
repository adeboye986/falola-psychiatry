# Falola Psychiatry — Phase 8A Tebra Integration Audit

Audit date: 2026-11-06
Scope: Appointment scheduling and patient portal integration audit only. No application integration was implemented.

## Classification legend

- **Supported and verified:** Tebra documents the integration method and the relevant public endpoint or browser behavior was independently checked during this audit.
- **Requires provider confirmation:** The capability is documented, but Falola Psychiatry Practice must confirm account ownership, subscription/configuration, or a practice-generated value before implementation.
- **Unsupported or blocked:** No supported integration method was found, or current browser security controls prevent the proposed use.

## Executive conclusion

| Proposed integration | Classification | Conclusion |
| --- | --- | --- |
| Hosted Tebra scheduler link | **Supported and verified** | The existing public scheduler returned HTTP 200 and loaded at desktop and mobile widths. Keep it as the required fallback. |
| Scheduler iframe using the direct link | **Supported and verified** | Tebra explicitly documents the direct link as an iframe source. The current endpoint loaded cross-origin in a test iframe without horizontal overflow at 1440px or 390px. Production use still requires practice and privacy approval. |
| Tebra popup scheduling widget | **Requires provider confirmation** | Tebra documents a practice-generated embed script, but no Falola-specific script is present in the repository or legacy Wix markup. It must be copied from the authenticated Tebra Practice Settings area. |
| Tebra scheduling API | **Requires provider confirmation** | Tebra exposes SOAP appointment operations using login credentials and a customer key. It is unnecessary and disproportionate for the current marketing-site requirement. |
| External Tebra/Kareo patient portal link | **Supported and verified** | Tebra instructs patients to use `portal.kareo.com` in a browser. Secure external handoff is the appropriate integration boundary. |
| Embedded patient portal login/session | **Unsupported or blocked** | Tebra does not document a portal embed. The Cloudflare challenge response available during this audit used `X-Frame-Options: SAMEORIGIN`; no cross-origin portal embed authorization was found. |
| Locally recreated or proxied portal login | **Unsupported or blocked** | It would cross the authentication boundary and expose credentials and patient records to the Laravel application. |

**Recommended outcome:** create a centralized internal Appointments page in a later implementation phase, use a click-to-load Tebra iframe after provider confirmation, and always retain a prominent external hosted-scheduler fallback. Keep the patient portal as a clearly labeled external link only.

## 1. Current integration inventory

### Appointment scheduling

Current public destination:

`https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057`

Findings:

- The same URL appears in the legacy Wix site and throughout the Laravel views.
- The legacy site uses normal links with `target="_blank"` and `rel="noreferrer noopener"`; no Falola-specific Tebra iframe or popup script was found in the inspected homepage markup.
- The Laravel `button-link` component also applies `target="_blank"` and `rel="noopener noreferrer"` when its `external` option is used.
- The `practiceKey` is part of the public scheduling URL. It is an identifier, not an API credential, but Falola Psychiatry Practice must still confirm that it is the current production key.
- The Laravel application has an internal `/appointments` route, but it remains a Phase 1 placeholder. Current CTAs bypass it and link directly to Tebra.

Live endpoint observations on 2026-11-06:

- Scheduler document: HTTP 200 from Amazon S3 through CloudFront.
- No `X-Frame-Options` or `Content-Security-Policy` header was present on the inspected scheduler document response.
- The scheduler loaded directly and in an iframe at 1440px and 390px without horizontal document overflow.
- The page loaded public scheduling controls without website-held API credentials.
- The iframe test emitted a vendor-side console error involving a cross-origin `Cypress` property check. It did not prevent the scheduler frame or its initial controls from loading, but it should be included in production acceptance testing.
- Observed scheduler request origins included the scheduler CloudFront host, PatientPop/Tebra UI and availability services, Google Tag Manager, Datadog browser intake, JSDelivr, and AWS-hosted assets.
- The scheduler set a Datadog `_dd_s` cookie during the browser audit. This must be considered in privacy and consent review.

### Patient portal

Current Laravel and legacy destination:

`https://portal.kareo.com/pp-webapp/app/new/login`

Findings:

- The legacy website and Laravel Patient Information page use this same external destination.
- Tebra's current patient instructions refer patients to `portal.kareo.com` in a web browser.
- The Laravel Patient Information page has two external portal CTAs and explicitly states that credentials are not collected by the practice website.
- The Laravel application also has an internal `/patient-portal` placeholder route, but current portal CTAs bypass it.
- An automated request to the deep login URL received a Cloudflare HTTP 403 challenge response. This does not prove the URL is invalid for a normal patient browser, but the exact deep link should be manually confirmed in the practice account before implementation.
- The observed portal response included `X-Frame-Options: SAMEORIGIN`, `Referrer-Policy: same-origin`, restrictive `frame-src`/`child-src` directives, and Cloudflare anti-bot controls.

### Existing integration markup

| Location | Current behavior |
| --- | --- |
| Legacy Wix homepage | External scheduler and portal links; no Falola-specific Tebra embed script found. |
| `resources/views/components/site/navigation.blade.php` | Two responsive source definitions for the shared appointment CTA, both linking directly to the scheduler. |
| Page Blade views | Each view declares the same scheduler URL locally and passes it to the shared button component. |
| `resources/views/components/site/button-link.blade.php` | External links open a new tab with `noopener noreferrer`. |
| `/appointments` | Internal placeholder only; not used by current appointment CTAs. |
| `/patient-portal` | Internal placeholder only; not used by current portal CTAs. |
| Application layout/security configuration | No application Content Security Policy or integration-specific security-header middleware is currently configured. |

## 2. Scheduling embed feasibility

### Officially supported methods

Tebra's Scheduling Widget documentation describes the following supported methods:

1. Copy the practice's direct scheduling link and use it as a normal hyperlink.
2. Use that direct link as an iframe source.
3. Copy a generated embed script into the website body to display an icon that opens a scheduling popup.

Tebra also states that providers must have the applicable Engage or Patient Experience subscription and online appointment booking configured for inclusion in the practice-level scheduler. The practice must retrieve the direct link or popup code from **Practice Settings → Scheduling Widget**.

### Authentication and credentials

- A patient does not authenticate to the marketing website to open the public scheduler.
- The direct link and iframe do not require Laravel to hold Tebra API credentials.
- Administrative access to the practice's Tebra account is required to verify configuration and copy the official current link or popup script.
- SOAP API access is separate from the scheduling widget and requires login credentials plus a customer key. Those credentials must never be exposed in Blade, JavaScript, query strings, or source control.

### Iframe feasibility

**Classification: Supported and verified.**

Evidence:

- Tebra explicitly documents the direct URL as an iframe source.
- The current scheduler response did not advertise a framing prohibition.
- A normal HTTP-origin browser test successfully created the cross-origin frame at 1440px and 390px.
- The scheduler stayed within the available viewport width in both tests.

Limitations:

- Successful framing does not establish that every appointment type, validation path, confirmation screen, payment step, or error state works correctly.
- The host page cannot inspect or manipulate the iframe's internal DOM because of the browser same-origin policy. This is desirable isolation and must not be bypassed.
- The practice must confirm the active locations, providers, appointment types, patient eligibility, telehealth options, and availability shown by the public key.
- A responsive iframe needs a tested height strategy. A fixed height that works for the first step may create nested scrolling or clip later steps.

### Popup widget feasibility

**Classification: Requires provider confirmation.**

- Tebra officially supports a generated script placed in the website body.
- The practice-specific script is not present in this repository or in the inspected legacy markup.
- The authenticated Tebra account must generate the snippet; a snippet copied from another practice or reconstructed from public assets is not acceptable.
- This option introduces third-party JavaScript into the Laravel page and therefore has a larger Content Security Policy, privacy, availability, and regression surface than an isolated iframe.
- The popup's keyboard focus management, close control, screen-reader announcement, and mobile viewport behavior must be tested before approval.

### API feasibility

**Classification: Requires provider confirmation; not recommended for this phase.**

Tebra's SOAP API can retrieve, create, update, and delete appointment-related records. It requires credentials and a customer key, and Tebra states that webhooks are not available. Building an API integration would make the Laravel application responsible for patient and appointment data, error reconciliation, retries, audit logging, access control, retention, and incident response. There is no demonstrated need for that scope when the official widget already supports the requested patient workflow.

## 3. Patient portal integration feasibility

### Supported external access

**Classification: Supported and verified.**

Tebra documents the portal as a separate authenticated experience where invited patients can access health records, documents, secure messages, payments, receipts, and account activity. The supported boundary is a normal browser handoff to Tebra.

Recommended behavior:

- Keep portal access external and clearly identify that the user is leaving the practice website.
- Use a normal HTTPS link with `target="_blank"` and `rel="noopener noreferrer"`, or use an informational internal handoff page with a final external link.
- Confirm whether the current deep URL or the documented `https://portal.kareo.com/` base URL is the authoritative destination for this practice.
- Preserve the statement that the Laravel website does not collect portal usernames or passwords.

### Portal embedding

**Classification: Unsupported or blocked.**

- No official Tebra documentation for embedding authenticated patient portal sessions was found.
- `X-Frame-Options: SAMEORIGIN` prevents a Tebra portal response from being framed by the Laravel origin.
- The observed Cloudflare challenge Content Security Policy permits child frames only from itself and Cloudflare. It does not provide authorization for the portal to be embedded by the Laravel origin.
- Cloudflare anti-bot controls and session cookies further reinforce that the portal is a vendor-managed security boundary.

The implementation must not recreate the login form, proxy portal traffic, collect or store credentials, inject scripts into the portal, mask the Tebra origin, or attempt to remove or bypass security headers.

## 4. Appointment CTA inventory

All current appointment CTAs resolve to the same external scheduler URL. There are 16 Blade source definitions: 14 page/template definitions and two responsive definitions in the shared navigation. The service-detail template renders on all ten service routes.

| Source page/component | CTA location(s) | Current destination | Type | Recommended future behavior |
| --- | --- | --- | --- | --- |
| Shared navigation | Desktop header; mobile menu | CloudFront Tebra scheduler | External | Point to the centralized internal `/appointments` route. The internal page owns embed/fallback behavior. |
| Home | Hero; final appointment CTA | Same scheduler | External | Point both to `/appointments`. |
| About | Hero; final appointment CTA | Same scheduler | External | Point both to `/appointments`. |
| Services overview | Hero; final appointment CTA | Same scheduler | External | Point both to `/appointments`. |
| Service detail template | Sidebar; final CTA | Same scheduler | External | Point both to `/appointments`; applies to ADHD, Anxiety, Depression, Bipolar Disorders, Trauma, OCD, Addiction, Schizophrenia, Brief Psychotherapies, and Academic Coaching. |
| Telepsychiatry | Hero; final appointment CTA | Same scheduler | External | Point both to `/appointments`; do not preselect a telehealth type unless Tebra provides and the practice approves a documented parameter. |
| Patient Information | Hero | Same scheduler | External | Point to `/appointments`. Keep portal CTA separate. |
| Office, Fees & Policies | Hero | Same scheduler | External | Point to `/appointments`. |
| Contact | Hero; final appointment CTA | Same scheduler | External | Point both to `/appointments`. |
| `/appointments` placeholder | Shared header CTA only | Same scheduler through navigation | External | Replace placeholder with the centralized scheduling handoff/embed page after approval. |
| `/patient-portal` placeholder | Shared header CTA only | Same scheduler through navigation | External | Keep appointment action separate from external portal access. |

Portal CTA inventory:

| Source | CTA | Current destination | Recommended future behavior |
| --- | --- | --- | --- |
| Patient Information hero | Access Patient Portal | `https://portal.kareo.com/pp-webapp/app/new/login` | Keep external after confirming the authoritative URL. |
| Patient Information portal section | Open Patient Portal | Same portal URL | Keep external after confirming the authoritative URL. |

## 5. Recommended architecture

### Preferred scheduling architecture

1. Use the existing named `/appointments` route as the single public integration entry point.
2. Store the verified scheduler URL in centralized Laravel configuration, not separately in each Blade view.
3. Update the shared navigation and all page CTAs to use `route('appointments')` after implementation approval.
4. Render explanatory scheduling copy and a **Load secure scheduler** action before inserting the iframe. Click-to-load avoids contacting Tebra and its analytics/monitoring services merely because a visitor opened a marketing page.
5. When activated, render an iframe with an accurate title and a tested responsive container.
6. Keep a clearly visible **Open scheduler in a new window** link using the same configured URL.
7. Keep the practice phone number visible as a non-digital fallback.
8. If the iframe fails, times out, or becomes blocked by future vendor headers, show the external link and phone fallback without attempting a workaround.

This approach isolates the vendor workflow to one route, reduces duplicated configuration, preserves graceful degradation, and avoids loading third-party scheduling code site-wide.

### Popup widget position

The popup widget is a valid official alternative but is not the preferred initial implementation. It would add vendor JavaScript and a global floating control to pages that already have appointment CTAs. Consider it only if the practice specifically prefers it and supplies the current generated snippet.

### Patient portal architecture

- Centralize the authoritative portal URL in Laravel configuration.
- Either link directly from Patient Information or convert `/patient-portal` into a brief informational handoff page.
- The handoff page must contain no login inputs and must not imitate the portal UI.
- Do not add server-side proxying, session exchange, credential storage, or portal API calls.

## 6. Required configuration and confirmations

The following proposed configuration names describe a future implementation; they were not added during this audit:

| Proposed setting | Purpose | Secret? |
| --- | --- | --- |
| `TEBRA_SCHEDULER_URL` | Verified practice-generated direct scheduling link | No, but configuration-controlled |
| `TEBRA_PORTAL_URL` | Verified patient portal destination | No, but configuration-controlled |
| `TEBRA_SCHEDULER_MODE` | `external` during rollout; optionally `iframe` after approval | No |
| `TEBRA_SCHEDULER_TIMEOUT_MS` | Client-side threshold before showing failure/fallback guidance | No |

Required practice/provider confirmation:

- Ownership and current status of practice key `k_1_110057`.
- Applicable Engage/Patient Experience subscription and online booking enablement.
- Current providers, locations, appointment types, visit reasons, telehealth options, patient-type rules, and availability.
- Whether the scheduler collects payment, insurance, reason-for-visit, or other sensitive information.
- Current Tebra contract, privacy/security review, and any required business associate terms.
- The official practice-generated popup script if popup mode is requested.
- The authoritative portal URL and patient enrollment/support process.
- Approved user-facing privacy notice and third-party/cookie disclosure.

No Tebra API key, username, password, customer key, patient token, or portal credential belongs in public configuration.

## 7. Security and privacy considerations

### Content Security Policy

For an iframe implementation, the Laravel site's policy would need a narrowly scoped `frame-src` allowance for:

`https://d2oe0ra32qx05a.cloudfront.net`

The iframe's own cross-origin subresources are governed by the framed application's security context. Do not add the observed PatientPop, Google Tag Manager, Datadog, JSDelivr, S3, or CloudFront origins to the Laravel site's global `script-src` or `connect-src` merely because they appeared inside the iframe.

If the popup script is selected, derive exact `script-src`, `connect-src`, `frame-src`, and image/style requirements from the current practice-generated snippet and browser testing. Do not use broad wildcards or `unsafe-inline` as a shortcut.

### Data exposure

- Loading the scheduler may disclose the visitor's IP address, browser/device information, referring origin, and interaction telemetry to Tebra and observed subprocessors.
- The public `practiceKey` must be the only scheduling identifier in the initial URL. Do not add diagnosis, medication, symptoms, appointment reason, patient identity, or campaign data to query parameters without an approved minimum-necessary design.
- The Laravel application should not read, mirror, or store iframe form contents.
- Marketing analytics must not receive scheduler field values, portal activity, sensitive URLs, or cross-domain identifiers.
- A click-to-load design reduces unsolicited third-party requests and provides a point for clear disclosure.

### Referrer behavior

- Current external buttons use `noreferrer`, which prevents the scheduler and portal from receiving the Laravel page URL through the normal link referrer.
- A future iframe should set an explicit conservative `referrerpolicy`, preferably `no-referrer` unless Tebra documents a legitimate origin requirement.
- Do not place patient or clinical information in the Laravel appointment page URL because URLs may appear in browser history, logs, monitoring, and referrer data.

### Iframe permissions and sandboxing

- The scheduling workflow does not currently require camera or microphone access merely to request an appointment.
- Do not grant broad iframe permissions by default.
- Do not impose an untested `sandbox` attribute that breaks Tebra's scripts, forms, navigation, storage, or confirmation workflow. If sandboxing is evaluated, start with the minimum required capabilities and complete end-to-end vendor testing.
- The host page must not attempt cross-origin DOM access or message interception unless Tebra publishes and documents a supported `postMessage` contract.

### Portal boundary

- Portal credentials and authenticated traffic must remain entirely on Tebra-controlled origins.
- Do not log portal query strings or tokens.
- Do not add session replay, marketing tags, or custom JavaScript to portal pages.
- HTTPS transport alone is not evidence of HIPAA compliance. Contractual, administrative, technical, and operational controls require separate review.

## 8. Mobile and accessibility behavior

### Mobile

- The hosted scheduler loaded at a 390px viewport with no horizontal document overflow during this audit.
- The iframe also loaded at 390px, but every scheduling step must be tested because later forms and confirmation states may be taller than the first step.
- Avoid a fixed height that clips content. Prefer a well-tested minimum height with clear internal scrolling and an always-visible external fallback.
- Test iOS Safari and Android Chrome with the production scheduler, virtual keyboard, zoom, orientation changes, and reduced network conditions.
- If the popup widget is considered, verify that it does not cover navigation, consent controls, urgent notices, or primary page content.

### Accessibility

- Give the iframe a specific title such as `Schedule an appointment with Falola Psychiatry Practice`.
- Announce when the third-party scheduler is loaded and when it fails.
- Keep keyboard focus visible and predictable before, within, and after the iframe.
- Provide a normal external link for users who cannot use or navigate the embedded interface.
- Test the complete workflow with keyboard-only navigation, screen readers, zoom to 200%, high contrast, and mobile assistive technology.
- For a popup, verify focus trapping, Escape/close behavior, focus return, accessible name, and no duplicate or unlabeled floating controls.

## 9. Loading and fallback strategy

Recommended behavior:

1. Render the appointment page and fallbacks without depending on Tebra JavaScript.
2. Let the visitor choose to load the embedded scheduler.
3. Show a loading status while the iframe initializes.
4. After a reasonable timeout, retain the iframe but display help text with the external scheduler link and office phone number.
5. Always show the external link outside the iframe so it remains available if the iframe is blocked.
6. Do not automatically retry indefinitely or collect the information the patient attempted to submit.
7. Monitor only coarse technical events such as load requested, iframe load event, or fallback selected. Do not record form contents or infer appointment outcomes without a documented vendor event contract and privacy approval.

If Tebra later adds `X-Frame-Options` or a restrictive `frame-ancestors` directive, immediately fall back to the hosted link. Do not proxy the scheduler or strip headers.

## 10. Implementation plan

### Gate 1 — Provider confirmation

- Confirm the production scheduler key, account ownership, subscription, schedule configuration, appointment types, locations, and portal URL.
- Obtain the generated popup snippet only if that option remains under consideration.
- Complete privacy, security, contractual, subprocessor, and analytics review.

### Gate 2 — Centralize configuration

- Add validated Tebra scheduler and portal settings to Laravel configuration.
- Keep deployment-specific values in environment configuration.
- Add configuration validation/fail-safe behavior so missing values show phone guidance rather than a broken link.

### Gate 3 — Build the appointment handoff

- Replace the `/appointments` placeholder with an accessible appointment page.
- Start with external mode, then enable click-to-load iframe mode after acceptance approval.
- Add an external scheduler fallback and office phone option.
- Keep the Laravel application out of the scheduler's patient-data flow.

### Gate 4 — Consolidate CTAs

- Update all 16 source definitions to use the named internal appointment route.
- Remove duplicated scheduler URL declarations from individual views.
- Centralize portal URL usage without embedding or proxying the portal.

### Gate 5 — Security headers and privacy

- Add the minimum page-specific CSP `frame-src` requirement for iframe mode.
- Set the iframe referrer policy and minimal permissions.
- Update the privacy/cookie disclosure for the observed vendor services and confirm whether consent is required before loading.
- Ensure application logs and analytics do not capture sensitive scheduler or portal information.

### Gate 6 — Acceptance testing

- Test new/existing patient choices, providers, locations, appointment types, telehealth, no-availability, validation errors, confirmation, cancellation/back navigation, and vendor outage behavior.
- Test 1440px, 768px, and 390px widths plus iOS Safari and Android Chrome.
- Test keyboard and screen-reader behavior.
- Verify external fallback and phone access with JavaScript disabled and when Tebra is unreachable.
- Recheck live response headers immediately before release.

## 11. Open decisions

1. Is `k_1_110057` the current production practice key owned by Falola Psychiatry Practice?
2. Does the account have the required Engage or Patient Experience scheduling subscription?
3. Which providers, locations, appointment types, patient types, and telehealth options should be public?
4. Does the scheduler collect payment, insurance details, or reason-for-visit information for this practice?
5. Has the practice approved the observed Tebra/PatientPop, Google Tag Manager, Datadog, AWS, and JSDelivr data flows?
6. Should the iframe load only after a visitor action, as recommended, or immediately on the appointment page?
7. Is `https://portal.kareo.com/pp-webapp/app/new/login` still the preferred portal destination, or should the implementation use `https://portal.kareo.com/`?
8. Who owns vendor outage monitoring and periodic revalidation of headers, URLs, accessibility, and mobile behavior?

## 12. Sources and evidence

### Local project sources

- `docs/integrations.md`
- `docs/website-audit.md`
- `docs/content-inventory.md`
- `routes/web.php`
- `resources/views/components/site/navigation.blade.php`
- `resources/views/components/site/button-link.blade.php`
- `resources/views/home.blade.php`
- `resources/views/about.blade.php`
- `resources/views/services.blade.php`
- `resources/views/services/show.blade.php`
- `resources/views/telepsychiatry.blade.php`
- `resources/views/patient-information.blade.php`
- `resources/views/office-fees-policies.blade.php`
- `resources/views/contact.blade.php`
- `resources/views/pages/placeholder.blade.php`

### Provider and live sources

- Tebra Scheduling Widget: `https://helpme.tebra.com/Platform/Practice_Settings/Scheduling_Widget/Scheduling_Widget`
- Tebra Patient Experience — Patient Portal: `https://helpme.tebra.com/Clinical/Patient_Management/Patient_Portal/Patient_Experience%3A_Patient_Portal`
- Tebra SOAP API: `https://helpme.tebra.com/Tebra_PM/12_API_and_Integration`
- Current scheduler: `https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057`
- Current portal deep link: `https://portal.kareo.com/pp-webapp/app/new/login`
- Legacy website: `https://www.falolapsychiatry.com/`

Live response headers, public markup, network origins, and non-submitting desktop/mobile browser behavior were checked on 2026-11-06. These observations are point-in-time evidence and must be revalidated before implementation and release.
