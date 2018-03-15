<template>
    <div class="animated fadeIn">
        <b-card>
            <b-table v-bind='tableOption'>
                <template slot="index" slot-scope="data" class="text-center">
                    {{data.index+((currentPage-1)*perPage) + 1}}
                </template>
            </b-table>
            <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" />
        </b-card>
    </div>
</template>

<script>
export default {
    name: 'kasus-index',
    computed: {
        url() {
            return `${this.baseUrl}api/kasus`;
        },
        totalRows() {
            return this.items.length;
        },
        tableOption() {
            return {
                fields     : this.fields,
                items      : this.items,
                perPage    : this.perPage,
                currentPage: this.currentPage,
                ...this.tableStyle
            }
        },
        tableStyle() {
            return {
                striped : true,
                bordered: true
            }
        }
    },
    data() {
        return {
            fields: [
                // A virtual column that doesn't exist in items
                {
                    key  :'index',
                    class: 'text-center'
                },
                // A column that needs custom formatting
                {
                    key     : 'title',
                    sortable: true
                },
                // A regular column
                'description',
                //
                'action'
            ],
            items: [],
            currentPage: 1,
            perPage: 5,
            pageOptions: [ 5, 10, 15 ]
        }
    },
    mounted() {
        axios.get(this.url).then(response => this.items = response.data);
    }
}
</script>
