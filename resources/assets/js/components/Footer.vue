<template>
    <footer class="app-footer">
        <span><a :href="baseUrl">GoTrack</a> &copy; 2018 PPATK.</span>
        <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
    </footer>
</template>
<script>
export default {
    computed: {
        baseUrl() {
            return document.getElementsByTagName('base')[0].href;
        }
    },
    name: 'c-footer'
}
</script>
