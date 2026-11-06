import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('tebraScheduler', ({ schedulerUrl, timeoutMs }) => ({
    schedulerDelayed: false,
    schedulerLoaded: false,
    schedulerLoading: false,
    timeoutId: null,

    loadScheduler() {
        if (this.schedulerLoaded) {
            return;
        }

        this.schedulerDelayed = false;
        this.schedulerLoaded = true;
        this.schedulerLoading = true;

        this.$nextTick(() => {
            this.$refs.schedulerFrame?.focus();
        });

        this.timeoutId = window.setTimeout(() => {
            this.schedulerDelayed = true;
            this.schedulerLoading = false;
        }, timeoutMs);
    },

    markSchedulerLoaded() {
        window.clearTimeout(this.timeoutId);
        this.schedulerDelayed = false;
        this.schedulerLoading = false;
    },

    destroy() {
        window.clearTimeout(this.timeoutId);
    },

    schedulerUrl,
}));

Alpine.start();
