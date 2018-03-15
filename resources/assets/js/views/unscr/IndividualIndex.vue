<template>
    <div class="animated fadeIn">
        <b-card>
            <b-table v-bind='tableOption'>
                <template slot="index" slot-scope="data" class="text-center">
                    {{ data.index+((currentPage-1)*perPage) + 1 }}
                </template>
                <template slot="name_alias" slot-scope="{item}" class="text-center">
                    <ul>
                        <li v-for='alias in item.name_alias' v-text='alias.toUpperCase()'></li>
                    </ul>
                </template>
                <template slot="nationality" slot-scope="{item}" class="text-center">
                    <ul>
                        <li v-for='nationality in item.nationality' v-text='nationality.toUpperCase()'></li>
                    </ul>
                </template>
            </b-table>
            <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" />
        </b-card>
    </div>
</template>

<script type="text/javascript">
export default {
    name: 'kasus-index',
    computed: {
        url() {
            return `${this.baseUrl}api/unscr/individu`;
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
                    key     : 'name',
                    sortable: true
                },
                {
                    key: 'name_alias'
                    // class: 'text-center'
                },
                'nationality',
                // A regular column
                'comments',
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
    },
    methods: {
        //
    }
}
</script>