<template>
    <div>
        <div class="animated slideInUp d-flex flex-row justify-content-center">
            <img :src="img" height="240px">
        </div>
        <div class="animated fadeIn">
            <b-card>
                <b-form class='d-flex flex-row'>
                    <b-form-input size="lg" type="text" placeholder="Enter a name" width="100%" v-model='query'></b-form-input>
                    <b-button size="lg" variant="primary" @click='search'>Explore</b-button>
                </b-form>
            </b-card>

            <b-card v-for='(aNews, index) in news' :key='aNews.id'>
                {{ aNews.text }}
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
            query: '',
            news : []
        }
    },
    methods: {
        search() {
            axios.get(`${this.baseUrl}api/search/${this.query}`).then(response => {
                this.news = response.data;
            });
        }
    }
}
</script>
