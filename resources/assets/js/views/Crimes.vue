<template>
    <div class="animated fadeIn">
        <b-card>
            <b-table v-bind='tableOption'>
                <template slot="index" slot-scope="data" class="text-center">
                    {{ data.index+((currentPage-1)*perPage) + 1 }}
                </template>
                <template slot="action" slot-scope="data" class="text-center">
                    <b-button>Add to case</b-button>
                </template>
            </b-table>
            <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" />
        </b-card>
        <!-- the modal -->
        <b-card id='graph'>
            <graph :data-nodes='graphNodes' :data-edges='graphEdges'></graph>
        </b-card>
    </div>
</template>

<script type="text/javascript">
export default {
computed: {
        url() {
            return `${this.baseUrl}api/crimes`;
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
        },
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
                    key     : 'name',
                    sortable: true
                },
                'dob',
                {
                    key: 'nationality',
                },
                //
                'action'
            ],
            items: [],
            currentPage: 1,
            perPage: 5,
            pageOptions: [ 5, 10, 15 ],
            accNumbers: []
        }
    },
    mounted() {
        axios.get(this.url).then(response => this.items = response.data);
    },
    methods: {
        //
    }
}
</script>