<template>
    <div>
        <div class="animated slideInUp d-flex flex-row justify-content-center">
            <img :src="img" height="240px">
        </div>
        <div class="animated fadeIn">
            <b-card>
                <b-form class='d-flex flex-row'>
                    <b-form-input size="lg" type="text" placeholder="Enter a name" width="100%"></b-form-input>
                    <b-button size="lg" variant="primary">Explore</b-button>
                </b-form>
            </b-card>
        </div>
    </div>
</template>

<script>
export default {
    name: 'search',
    computed: {
        img() {
            return `${this.baseUrl}images/logo.png`;
        }
    },
    data: function () {
        return {

        }
    },
    methods: {

    }
}
</script>
