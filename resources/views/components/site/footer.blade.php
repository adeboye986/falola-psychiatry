<footer class="bg-brand-green-dark text-white">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
        <div class="grid gap-12 border-b border-white/40 pb-14 md:grid-cols-2 lg:grid-cols-[1.2fr_0.8fr_1fr_1.45fr] lg:gap-14">
            <div>
                <x-site.logo light />
                <p class="mt-6 max-w-sm text-base leading-7 text-white/85">
                    Comprehensive and compassionate mental health care with a focus on empathy and respect.
                </p>
            </div>

            <div>
                <h2 class="text-base font-semibold uppercase tracking-[0.12em] text-white">Quick Links</h2>
                <nav class="mt-5 flex flex-col gap-3 text-base text-white/85" aria-label="Footer navigation">
                    <a class="footer-link" href="{{ route('home') }}">Home</a>
                    <a class="footer-link" href="{{ route('about') }}">About</a>
                    <a class="footer-link" href="{{ route('services.index') }}">Services</a>
                    <a class="footer-link" href="{{ route('telepsychiatry') }}">Telepsychiatry</a>
                    <a class="footer-link" href="{{ route('contact') }}">Contact</a>
                </nav>
            </div>

            <div>
                <h2 class="text-base font-semibold uppercase tracking-[0.12em] text-white">Patient Information</h2>
                <nav class="mt-5 flex flex-col gap-3 text-base text-white/85" aria-label="Patient information">
                    <a class="footer-link" href="{{ route('patient-information') }}">Policies &amp; Information</a>
                    <a class="footer-link" href="{{ route('appointments') }}">Appointments</a>
                    <a class="footer-link" href="{{ route('patient-portal') }}">Patient Portal</a>
                </nav>
            </div>

            <div>
                <h2 class="text-base font-semibold uppercase tracking-[0.12em] text-white">Contact</h2>
                <address class="mt-5 flex flex-col gap-4 text-base not-italic leading-7 text-white/85">
                    <a class="footer-link inline-flex items-start gap-3" href="tel:+16593466314">
                        <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25A2.25 2.25 0 0 0 21.75 19.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        (659) 346-6314
                    </a>
                    <span class="inline-flex items-start gap-3">
                        <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3.75h10.5v16.5H6.75zM9 7.5h6m-6 3h6m-6 3h3" /></svg>
                        Fax: (949) 703-8754
                    </span>
                    <a class="footer-link inline-flex items-start gap-3 break-all" href="mailto:contact@falolapsychiatry.com">
                        <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 6.75 8.25 6 8.25-6M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v10.5a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V6.75a1.5 1.5 0 0 1 1.5-1.5Z" /></svg>
                        contact@falolapsychiatry.com
                    </a>
                    <span class="inline-flex items-start gap-3">
                        <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6-5.25 6-11.25a6 6 0 1 0-12 0C6 15.75 12 21 12 21Z" /><circle cx="12" cy="9.75" r="2.25" /></svg>
                        289 Glen Cross Dr, Trussville, AL 35173
                    </span>
                </address>
            </div>
        </div>

        <div class="flex flex-col gap-3 pt-8 text-sm text-white/75 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} Falola Psychiatry Practice. All rights reserved.</p>
            <p>No patient information is collected on this website.</p>
        </div>
    </div>
</footer>
