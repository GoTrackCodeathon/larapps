<template>
    <div class="animated fadeIn">
        <b-card>
            <div class="d-flex justify-content-end">
                <b-btn href='#graph'>Show Graph</b-btn>
            </div>
            <br>
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
import Graph from '../components/Graph.vue';

export default {
    components: {
        'graph': Graph
    },
    computed: {
        url() {
            return `${this.baseUrl}api/fiureport`;
        },
        nodeUrl() {
            return `${this.baseUrl}api/acc`;
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
        graphNodes() {
            return this.accNumbers.map((item) => {
                return {
                    id: item.account,
                    label: item.name
                }
            })
        },
        graphEdges() {
            return this.items.map((item) => {
                return {
                    from: item.acc_number,
                    to: item.destination_acc
                }
            })
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
                    key     : 'name',
                    sortable: true
                },
                {
                    key: 'acc_number',
                    class: 'text-center'
                },
                {
                    key: 'destination_acc',
                    class: 'text-center'
                },
                // A regular column
                'crime_indication',
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
        axios.get(this.nodeUrl).then(response => this.accNumbers = response.data);
        axios.get(this.url).then(response => this.items = response.data);
    },
    methods: {
        //
    }
}
</script>