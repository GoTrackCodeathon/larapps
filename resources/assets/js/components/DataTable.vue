<template>
    <table class='table'>
        <thead>
            <tr>
                <th v-for='column in columns' v-text='column.title'></th>
            </tr>
        </thead>
    </table>
</template>

<script type="text/javascript">
import dt from 'datatables.net';
import dtbs from 'datatables.net-bs';

export default {
    data() {
        return {
            datatable: null,
            data     : []
        }
    },
    props: {
        columns: Array,
        url    : String,
    },
    mounted() {
        let vm = this;

        vm.datatable = $(this.$el).DataTable({
            jQueryUI : true,
            columns: vm.columns,
            data   : vm.data,
            order  : [[ 1, 'asc' ]],
            createdRow: function ( row, data, index ) {
                //
            }
        });

        axios.get(this.url)
            .then((response) => {
                console.log(response);
                // vm.data = response.data.ahu.map((item) => {
                //     return {
                //         NAME: item.NAME.toUpperCase(),
                //         COMPANYNAME: item.COMPANYNAME.toUpperCase(),
                //         POSITION: item.POSITION.toUpperCase(),
                //         POB: item.POB,
                //         DOB: item.DOB,
                //         NIK: item.NIK
                //     }
                // })
            }).then(() => {
                // this.isLoading = false
            })


    }
}
</script>